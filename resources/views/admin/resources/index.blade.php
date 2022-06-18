<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissões') }}
        </h2>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-12 mt-4 text-right">
            <a href="{{route('resources.create')}}" class="btn btn-success" title="Adicione permissões"> <i class="fas fa-fw fa-plus"></i> Adicionar</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Permissão</th>
                    <th>URL</th>
                    <th>Criado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($resources as $key => $resource)
                <tr>
                    <td>{{$resource->id}}</td>
                    <td>{{$resource->name}}</td>
                    <td><span class="badge badge-primary">{{$resource->resource}}</span></td>
                    <td>{{$resource->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('resources.edit', $resource->id)}}" class="btn btn-sm btn-outline-primary mr-1"> <i class="fas fa-fw fa-edit"></i> EDITAR</a>

                            <a href="#" class="btn btn-sm btn-outline-danger"
                                onclick="event.preventDefault(); 
                                if(confirm('Deseja realmente remover esta permissão ?')){
                                    return document.querySelector('form#resource-rm{{$key}}').submit();
                                }"> <i class="fas fa-fw fa-eraser"></i> 
                                Remover
                            </a>
                            
                            <form action="{{route('resources.destroy', $resource->id)}}" id="resource-rm{{$key}}" method="post">
                                @csrf 
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum recurso cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>


</x-app-layout>
