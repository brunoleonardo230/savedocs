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
                    
                    <p> <strong> Data Criação:</strong> <small> {{$ticket->created_at->format('d/m/Y H:i:s')}} </small></p>
                    <p> <strong> Serviço:</strong> <small> {{$ticket->service->name}} </small></p>
                    <p> <strong> Email:</strong> <small> {{$ticket->author_email}} </small></p>
                    <p> <strong> Prioridade:</strong> <small> {{$ticket->priority->name}} </small></p>                   

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
    <div class="row">
        <div class="col-md-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-8 col-md-8 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    LUCROS (MENSAIS)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
                    <form action="{{route('services.store')}}"  method="post">
                    @csrf
                        <div class="row form-group">            
                            <div class="col-md-12">
                                <label>Status: <span class="text-danger">*</span> </label>
                                <select name="status_id" class="form-control" required>
                                    <option value=""> -- Selecione -- </option>
                                    @foreach($statuses as $status)
                                        <option value="{{$status->id}}">{{$status->name}}</option>
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
                    <a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-outline-success">
                        Confirmar
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>

