<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfis') }}
        </h2>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-12 mt-4 text-right">
            <a href="{{route('roles.create')}}" class="btn btn-success" title="Adicionar perfil"> <i class="fas fa-fw fa-plus"></i> Adicionar</a>
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
            @forelse($roles as $key => $role)
                <tr>
                    <td>{{$role->name}}: <span class="badge badge-danger">{{$role->role}}</span></td>
                    <td>{{$role->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <div class="btn-group">
                            @if($role->isEditable())
                                <a href="{{route('roles.edit', $role->id)}}" type="button" class="btn btn-sm btn-outline-primary mr-1"> <i class="fas fa-fw fa-edit"></i>EDITAR</a>
                                
                                <a href="#" class="btn btn-sm btn-outline-danger mr-1"
                                    onclick="event.preventDefault(); 
                                    if(confirm('Deseja realmente remover o perfil {{$role->name}}?')){
                                        return document.querySelector('form#role-rm{{$key}}').submit();
                                    }"> <i class="fas fa-fw fa-eraser"></i> 
                                    Remover
                                </a>
                                
                                <form action="{{route('roles.destroy', $role->id)}}" id="role-rm{{$key}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                </form>
                            @endif
                            <a href="{{route('roles.resources', $role->id)}}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-fw fa-list"></i> Atribuir permissões
                            </a>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum papel cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>