<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

    @if (auth()->user()->isAdmin() || auth()->user()->isTechnician())
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">
                                Usuários PF
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                <small>total:</small>
                                {{$countUsersPF}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-success text-uppercase mb-1">
                                Usuários PJ
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <small>total:</small>
                                {{$countUsersPJ}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-info text-uppercase mb-1">
                                Chamados
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <small>total:</small>
                                {{$countCalled}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-headset fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-danger text-uppercase mb-1">
                                Chamados <small>FINALIZADOS</small>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <small>total:</small>
                                {{$countCalledFinalized}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-headset fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Últimos usuários cadastros</h5>
                </div>
                <div class="card-body">
                    <table class="table data-table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nome</th>
                                <th>Tipo conta</th>
                                <th>Perfil</th>
                                <th>Status</th>
                                <th>Criado Em</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $key => $user)
                                <?php $name = $user->name ? $user->name : $user->fantasy_name; ?>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        {{ mb_convert_case($name , MB_CASE_UPPER, "UTF-8") }}    
                                    </td>
                                    <td>
                                        @if($user->type_user_id == 1)
                                            PESSOA FÍSICA 
                                        @else
                                            PESSOA JURÍDICA
                                        @endif
                                    </td>
                                    <td>
                                        @if( $user->role()->count()) 
                                            {{ mb_convert_case( $user->role->name , MB_CASE_UPPER, "UTF-8") }}
                                        @else
                                            <span class="badge badge-warning">  Sem perfil associado </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->is_active == 1)
                                            ATIVO
                                        @else
                                            INATIVO
                                        @endif
                                    </td>
                                    <td>{{$user->created_at->format('d/m/Y H:i')}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Nenhum usuário cadastrado!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="row">
            
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold text-info text-uppercase mb-1">
                                        Chamados no Mês
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <small>total:</small>
                                        {{$countCalledUser}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fw fa-headset fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold text-danger text-uppercase mb-1">
                                        Restam
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <small>total:</small>
                                        {{$ticketUser-$countCalledUser}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fw fa-headset fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            

            <!-- DataTales Example -->
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Solicitações') }}
                        </h2>
                        @if($ticketUser-$countCalledUser > 0)
                            <div class="col-md-12 mt-4 text-right">
                                <a href="{{route('tickets.create')}}" class="btn btn-success" title="Criar ticket"> <i class="fas fa-fw fa-plus"></i> Criar Solicitação</a>
                            </div>
                        @endif
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
                                @forelse($ticketsopen as $key => $ticket)
                                    <tr class="text-center">
                                        <td> {{$ticket->id}} </td>
                                        <td> {{$ticket->ticket_code}} </td>
                                        <td>
                                            <a href="{{route('tickets.edit', $ticket->id)}}" data-toggle="modal" data-target="#{{$ticket->ticket_code}}" type="button" class="btn btn-sm btn-outline-primary mr-1">
                                                <font color="{{$ticket->status->color}}"> <strong>{{$ticket->status->name}}<strong></font>
                                            </a>                            
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="{{$ticket->ticket_code}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Alterar Status</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('comments.store')}}"  method="post" id="mail_form{{$ticket->ticket_code}}">
                                                        @csrf
                                                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                                            <div class="row form-group">            
                                                                <div class="col-md-12">
                                                                    <label>Status: <span class="text-danger">*</span> </label>
                                                                    <select name="status_id" class="form-control" required>
                                                                        <option value=""> -- Selecione -- </option>
                                                                        @foreach($statuses as $status)
                                                                            <@if($status->id <> 1)
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
                                                        <a href="#" onClick="document.getElementById('mail_form{{$ticket->ticket_code}}').submit();" class="btn btn-outline-success">
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
            </div>
            <!-- </div> -->            
        </div>
    @endif
</x-app-layout>

