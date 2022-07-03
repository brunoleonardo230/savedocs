<x-app-layout>
        <x-slot name="header">
            
        </x-slot>
        
<!-- <div class="container-fluid"> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tickets') }}
            </h2>
            <div class="col-md-12 mt-4 text-right">
                <a href="{{route('tickets.create')}}" class="btn btn-success" title="Criar ticket"> <i class="fas fa-fw fa-plus"></i> Criar Ticket</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ticket</th>                        
                            <th>Status</th>
                            <th>Criado</th>
                            <th>Serviço</th>
                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Priorodade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Ticket</th>                        
                            <th>Status</th>
                            <th>Criado</th>
                            <th>Serviço</th>
                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Priorodade</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @forelse($tickets as $key => $ticket)
                        <tr class="text-center">
                            <td> {{$ticket->id}} </td>
                            <td> {{$ticket->ticket_code}} </td>
                            <td><font color="{{$ticket->status->color}}"> <strong>{{$ticket->status->name}}<strong></font></td>
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