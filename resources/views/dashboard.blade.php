<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

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
</x-app-layout>

