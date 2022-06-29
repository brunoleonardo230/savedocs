<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$ticket->ticket_code}} - <font color="{{$ticket->status->color}}">{{$ticket->status->name}}</font>
        </h2>        
    </x-slot>
    <div class="row">
        <div class="col-md-6">
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
                <button type="button" class="btn btn-outline-success" onclick="Mudarestado('minhaDiv')">Alterar Status</button>
            </div>
        </div>
    </div>
    <div class="row" id="minhaDiv" style="display: none;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <p>
                            <strong> Alterar Status </strong>                    
                        </p>
                    </h5>
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
                            <p class="card-text">
                                <a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-outline-success">
                                    Confirmar
                                </a>                               
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }
</script>