<x-app-layout>
        <x-slot name="header">
            
        </x-slot>
        
<!-- <div class="container-fluid"> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Solicitações') }}
            </h2>
            <div class="col-md-12 mt-4 text-right">
                <a href="{{route('tickets.create')}}" class="btn btn-success" title="Criar ticket"> <i class="fas fa-fw fa-plus"></i> Criar Ticket</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Solicitação</th>                        
                            <th>Status</th>
                            <th>Técnico</th>
                            <th>Criado</th>
                            <th>Serviço</th>
                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Priorodade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>                    
                    <tbody>
                    @forelse($tickets as $key => $ticket)
                        <tr class="text-center">
                            <td> {{$ticket->id}} </td>
                            <td> {{$ticket->ticket_code}} </td>
                            <td>
                                <a href="{{route('tickets.edit', $ticket->id)}}" data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-sm btn-outline-primary mr-1">
                                    <font color="{{$ticket->status->color}}"> <strong>{{$ticket->status->name}}<strong></font>
                                </a>                            
                            </td>
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
                                            <!-- <button class="btn btn-success"> Confirmar </button> -->
                                            <a href="#" onClick="document.getElementById('mail_form').submit();" class="btn btn-outline-success">
                                                Confirmar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Modal -->
                            <td><strong>{{$ticket->tecnico_name}}<strong></td>
                            <td> {{$ticket->created_at->format('d/m/Y H:i:s')}} </td>                            
                            <td> {{$ticket->service->name}} </td>
                            <td> {{$ticket->author_name}} </td>
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
            </div>
        </div>
    </div>
<!-- </div> -->

</x-app-layout>