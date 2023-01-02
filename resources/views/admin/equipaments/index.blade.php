<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <div class="card mb-3">
        <div class="card-body">
            <div class="text-right">
                <a href="{{route('equipaments.create')}}" class="btn btn-success" title="Adicionar perfil"> <i class="fas fa-fw fa-plus"></i> Adicionar</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table data-table table-striped">
                <thead>
                    <tr>
                        <th class="w-50">Apelido <small>equipamento</small></th>
                        <th>Nome <small>proprietário</small></th>
                        <th>Criado Em</th>
                        <th class="w-5">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($equipaments as $key => $equipament)
                    <tr>
                        <td>{{$equipament->name}}</td>
                        <td>{{$equipament->user->name}}</td>
                        <td>{{$equipament->created_at->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('equipaments.edit', $equipament->id)}}" class="btn btn-sm btn-outline-primary mr-1">EDITAR</a>
                                
                                <a href="#" class="btn btn-sm btn-outline-danger mr-1"
                                    onclick="event.preventDefault(); 
                                    if(confirm('Deseja realmente remover o setor: {{$equipament->name}} ?')){
                                        return document.querySelector('form#module-rm{{$key}}').submit();
                                    }"> <i class="fas fa-fw fa-eraser"></i> 
                                    Remover
                                </a>
                                
                                <form action="{{route('equipaments.destroy', $equipament->id)}}" id="module-rm{{$key}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum equipamento cadastrado!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>