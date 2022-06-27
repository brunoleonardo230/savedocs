<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$ticket->ticket_code}} - <font color="{{$ticket->status->color}}">{{$ticket->status->name}}</font>
        </h2>        
    </x-slot>

    <div class="card">                            
        <div class="card-body">
            <h5 class="card-title">
                <p>
                    <strong> {{$ticket->assigned_to_user->name}} </strong>                    
                </p>
            </h5>
            
            <p> <strong> Data Criação:</strong> <small> {{$ticket->created_at->format('d/m/Y H:i:s')}} </small></p>
            <p> <strong> Serviço:</strong> <small> {{$ticket->service->name}} </small></p>
            <p> <strong> Email:</strong> <small> {{$ticket->author_email}} </small></p>
            <p> <strong> Prioridade:</strong> <small> {{$ticket->priority->name}} </small></p>

            <p class="card-text">
                <a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-outline-success">
                    Atender Ticket
                </a>
                <a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-outline-danger">
                    Fechar Ticket
                </a>
            </p>

        </div>
    </div>
</x-app-layout>