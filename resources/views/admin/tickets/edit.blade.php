<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$ticket->ticket_code}} - <font color="{{$ticket->status->color}}">{{$ticket->status->name}}</font>
        </h2>        
    </x-slot>
    <div class="row">
        <div class="col-md-8">
            <div class="card">                            
                <div class="card-body">
                    <h5 class="card-title">
                        <p>
                            <strong> {{$ticket->assigned_to_user->name}} </strong>                    
                        </p>
                    </h5>
                    
                    <p> <strong> Data Criação:</strong> <small> {{$ticket->created_at->format('d/m/Y H:i:s')}} </small><br>
                    <strong> Serviço:</strong> <small> {{$ticket->service->name}} </small><br>
                    <strong> Email:</strong> <small> {{$ticket->author_email}} </small><br>
                    <strong> Prioridade:</strong> <small> {{$ticket->priority->name}} </small><br>
                    <strong> Título:</strong> <small> {{$ticket->title}} </small><br>
                    <strong> Descrição:</strong> <small> {{$ticket->commet}} </small><br></p>
                    <p>
                    @foreach($equipaments as $equipament)                        
                        <strong> Equipamento:</strong> {{$equipament->name}} 
                        <strong> Codigo:</strong> {{$equipament->identification_code}} <br>                 
                    @endforeach
                    </p>                               
                </div>      
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Alterar Status
                </button>          
                <!-- <button type="button" class="btn btn-outline-success" onclick="Mudarestado('minhaDiv')">Alterar Status</button> -->
            </div>
        </div>
    </div>
    <br>
    @forelse($comments as $key => $comment)                                   
        <div class="row">
            <div class="col-md-8">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-8 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{$comment->user->name}}: {{$comment->status->name}} - {{$comment->created_at->format('d/m/Y H:i:s')}}
                                    </div>                                    
                                    <p>{{$comment->comment_text}}</p>                                    
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('comments.store')}}"  method="post" id="mail_form">
                    @csrf
                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                        <div class="row form-group">            
                            <div class="col-md-12">
                                <label>Status: <span class="text-danger">*</span> </label>
                                <select name="status_id" class="form-control" required>
                                    <option value=""> -- Selecione -- </option>
                                    @foreach($statuses as $status)
                                        @if($status->id <> 1)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label>Comentário: <span class="text-danger">*</span> </label>
                                <textarea id="comment_text" name="comment_text" class="form-control ">{{ old('comment_text', isset($commet) ? $commet->comment_text : '') }}</textarea>
                            </div>
                        </div>                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <!-- <button class="btn btn-success"> Confirmar </button> -->
                    <a href="#" onClick="document.getElementById('mail_form').submit();" class="btn btn-outline-success">
                        Confirmar
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>

