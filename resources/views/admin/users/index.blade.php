<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <hr>

    <div class="row mb-4">
        <div class="col-md-12 mt-4 text-right">
            <a href="{{ route('users.create') }}" type="button" class="btn btn-success" title="Adicione usuários"> <i class="fas fa-fw fa-plus"></i> Adicionar </a>
        </div>
    </div>
    
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Perfil</th>
                    <th>Criado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>
                            @if( $user->role()->count()) 
                                {{ $user->role->name }}
                            @else
                                <span class="badge badge-warning">  Sem perfil associado </span>
                            @endif
                        </td>
                        <td>{{$user->created_at->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('users.edit', $user->id)}}" type="button" class="btn btn-sm btn-outline-primary mr-1" title="Atualize os dados de: {{$user->name}}"> <i class="fas fa-fw fa-edit"></i> Editar</a>
                                <a href="#" type="button" class="btn btn-sm btn-outline-danger" title="Remova os dados de: {{$user->name}}"> <i class="fas fa-fw fa-eraser"></i> Remover</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum usuário cadastrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- {{$users->links()}} --}}
    </div>

</x-app-layout>
