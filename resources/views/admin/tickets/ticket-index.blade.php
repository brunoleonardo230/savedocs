<x-app-layout>

    <div class="card">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tickets') }}
            </h2>
        </x-slot>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-12 mt-4 text-right">
                    <a href="{{route('tickets.create')}}" class="btn btn-success" title="Criar ticket"> <i class="fas fa-fw fa-plus"></i> Criar Ticket</a>
                </div>
            </div>
            <p class="card-text">
                <table class="table table-striped">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ticket</th>                        
                        <th scope="col">Status</th>
                        <th scope="col">Criado</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Email</th>
                        <th scope="col">Priorodade</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($tickets as $key => $ticket)
                        <tr class="text-center">
                            <td> {{$ticket->id}} </td>
                            <td> {{$ticket->ticket_code}} </td>
                            <td><font color="{{$ticket->status->color}}"> <strong>{{$ticket->status->name}}<strong></font></td>
                            <td> {{$ticket->created_at->format('d/m/Y H:i:s')}} </td>                            
                            <td> {{$ticket->service->name}} </td>
                            <td> {{$ticket->assigned_to_user->name}} </td>
                            <td> {{$ticket->author_email}} </td>
                            <td> {{$ticket->priority->name}} </td>
                            <td>
                                <a href="{{route('tickets.edit', $ticket->id)}}" type="button" class="btn btn-sm btn-outline-primary mr-1"> <i class="fas fa-fw fa-file"></i>VER</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">Nenhum módulo cadastrado!</td>
                        </tr>
                    @endforelse 
                    </tbody>
                </table>
            </p>
        </div>
    </div>

</x-app-layout>