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
                @forelse($users as $key => $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>
                            @if( $user->role()->count()) 
                                {{ $user->role->name }}
                            @else
                                <span class="badge badge-warning">  Sem perfil associado </span>
                            @endif
                        </td>
                        <td>{{$user->created_at->format('d/m/Y H:i')}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('users.edit', $user->id)}}" type="button" class="btn btn-sm btn-outline-primary mr-1" title="Atualize os dados de: {{$user->name}}"> <i class="fas fa-fw fa-edit"></i> Editar</a>
                                
                                <a href="#" class="btn btn-sm btn-outline-danger"
                                    onclick="event.preventDefault(); 
                                    if(confirm('Deseja realmente remover {{$user->name}}?')){
                                        return document.querySelector('form#user-rm{{$key}}').submit();
                                    }"> <i class="fas fa-fw fa-eraser"></i> 
                                    Remover
                                </a>
                                
                                <form action="{{route('users.destroy', $user->id)}}" id="user-rm{{$key}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                </form>
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
        
    </div>

</x-app-layout>
