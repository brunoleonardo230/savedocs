<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('USUÁRIOS') }}
        </h2>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-12 mt-4 d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-success">Adicionar</a>
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
                            <a href="#" class="btn btn-sm btn-primary">EDITAR</a>
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
