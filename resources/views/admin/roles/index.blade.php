<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PERFIS') }}
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
                    <th>Criado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($roles as $role)
                <tr>
                    <td>{{$role->name}}: <span class="badge badge-danger">{{$role->role}}</span></td>
                    <td>{{$role->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        {{-- <div class="btn-group">
                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-sm btn-primary">EDITAR</a>
                            <form action="{{route('roles.destroy', $role->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">REMOVER</button>
                            </form>
                            <a href="{{route('roles.resources', $role->id)}}" class="btn btn-sm btn-dark">Adicionar Recursos</a>
                        </div> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum papel cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{-- {{$roles->links()}} --}}
    </div>
</x-app-layout>