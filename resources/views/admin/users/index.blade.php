<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="card mb-3">
        <div class="card-body">
            <div class="text-right">
                <a href="{{ route('users.create') }}" type="button" class="btn btn-success" title="Adicione usuários"> <i class="fas fa-fw fa-plus"></i> Adicionar </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="col-md-12">

                <table class="table data-table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo conta</th>
                            <th>Perfil</th>
                            <th>Status</th>
                            <th>Criado Em</th>
                            <th width="15%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $key => $user)
                            <tr>
                                <td>
                                    {{ mb_convert_case($user->name ? $user->name : $user->fantasy_name , MB_CASE_UPPER, "UTF-8") }}    
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
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('users.edit', $user->id)}}" type="button" class="btn btn-sm btn-outline-primary mr-1" title="Atualize os dados de: {{$user->name}}"> 
                                            <i class="fas fa-fw fa-edit"></i> <br>
                                            Editar
                                        </a>
                                        
                                        <a href="#" class="btn btn-sm btn-outline-danger"
                                            onclick="event.preventDefault(); 
                                            if(confirm('Deseja realmente remover {{$user->name}}?')){
                                                return document.querySelector('form#user-rm{{$key}}').submit();
                                            }"> <i class="fas fa-fw fa-eraser"></i> <br>
                                            Remover
                                        </a>
                                        <form action="{{route('users.destroy', $user->id)}}" id="user-rm{{$key}}" method="post">
                                            @csrf 
                                            @method('DELETE')
                                        </form>
                                        @if (count($user->equipaments))
                                            <button type="button" class="btn btn-sm btn-outline-dark ml-1" data-toggle="modal" data-target="#m-equipaments-{{$user->id}}">
                                                <i class="fas fa-fw fa-desktop"></i> <br>
                                                Equipamentos
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                @if (count($user->equipaments))
                                    <?php
                                        $userId = $user->id;
                                        $userName = $user->name ? $user->name : $user->fantasy_name;
                                        $equipaments = $user->equipaments;
                                    ?>
                                    @include('components.modal-equipaments', compact('userId', 'userName', 'equipaments'))
                                @endif
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

    @section('scripts')


    @endsection
    

</x-app-layout>
