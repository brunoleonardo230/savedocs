<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ DB, Hash };
use App\Http\Requests\Admin\CommentRequest;

use App\Models\{Comment,Ticket,User};

class CommentController extends Controller
{
    private $comment;

	public function __construct(Comment $comment)
	{
		$this->comment = $comment;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $user = auth()->user();
        $users = User::find($user->id);
        //dd(auth()->user()->role_id);
        if(auth()->user()->role_id == 2 || auth()->user()->role_id == 1){
            $tecnico_name = $users->name;
            
            $request->request->add(['tecnico_name' => $users->name]);
            $ticket = Ticket::find($request->ticket_id);
            $ticket->tecnico_name = $tecnico_name;
            //dd($ticket->tecnico_name);
		    $ticket->save();
            
        }    

        $request->request->add(['user_id' => $user->id]);

        //dd( $request->request);

        if($request->status_id <> 4){
            $ticket = Ticket::find($request->ticket_id);
            $ticket->status_id = $request->status_id;
		    $ticket->save();
        }        
        try {
			$this->comment->create($request->all());

			return redirect()
                    ->back()
					->with('success', 'Alteração Confirmada!');

		} catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro na alteração...';

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
        //
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
}
