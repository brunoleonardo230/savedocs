<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ DB, Hash };
use App\Http\Requests\Admin\TicketRequest;

use App\Models\{ Priority,Type,Service,Ticket,Status, Comment,User};    

class TicketController extends Controller
{
    private $ticket;

	public function __construct(Ticket $ticket)
	{
		$this->ticket = $ticket;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        $statuses = Status::all('id', 'name');//->whereNotIn('name',$ticket->status->name);
        
        return view('admin.tickets.ticket-index', compact('tickets','statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = Priority::all('id', 'name');
        $types = Type::all('id', 'name');
        $services = Service::orderBy('name', 'asc')->get();
        $user = auth()->user();
        $users = User::where('role_id',3)->orderBy('id', 'desc')->get();
        $all_users = User::all('id','Name');

        return view('admin.tickets.create', compact('priorities','types','services','user','users','all_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $ticket_code = 'TICKET';
        $ticket_code .= $request->type_id;
        $ticket_code .= sprintf("%03s", $request->service_id);
        $ticket_code .= time();

       //$user_id = auth()->user()->id;   
        
        $user = User::find($request->assigned_to_user_id);
        $services = Service::find($request->service_id);

        if(isset($services->priority_id)){
            $priority_id = $services->priority_id;
        }else{
            $priority_id = 3;
        }
            
        $request->request->add(['priority_id' => $priority_id, 'ticket_code' => $ticket_code, 'status_id' => 1,'assigned_to_user_id' => $request->assigned_to_user_id,'author_name' => $user->name]);
        
        try {
			$this->ticket->create($request->all());

			return redirect()
					->route('tickets.ticketsopen')
					->with('success', 'Ticket criado com sucesso!');

		} catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao criar ticket...';

			//flash($message)->error();
			return redirect()->back()->with('danger', $message);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = $this->ticket->find($id);
        $statuses = Status::all('id', 'name')->whereNotIn('name',$ticket->status->name);
        //dd($ticket->equipaments);
        $comments = Comment::all()->where('ticket_id',$id)->sortByDesc('created_at');

        $equipaments = $ticket->equipaments;
        //dd($comments);

	    return view('admin.tickets.edit', compact('ticket','statuses','comments','equipaments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ticketsOpen()
    {
        //dd($tickets);
        $ticketsopen = Ticket::all()->whereIn('status_id',1)->whereIn('assigned_to_user_id',auth()->user()->id);
        
        $ticketsinprogress = Ticket::all()->whereNotIn('status_id',[3,1])->whereIn('assigned_to_user_id',auth()->user()->id);
        $statuses = Status::all('id', 'name');//->whereNotIn('name',$ticket->status->name);
        
        return view('admin.tickets.ticket-open', compact('ticketsopen','ticketsinprogress','statuses'));
    }
}
