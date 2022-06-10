<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PERMISSÕES') }}
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
                    <th>#</th>
                    <th>Permissão</th>
                    <th>URL</th>
                    <th>Criado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($resources as $resource)
                <tr>
                    <td>{{$resource->id}}</td>
                    <td>{{$resource->name}}</td>
                    <td><span class="badge badge-primary">{{$resource->resource}}</span></td>
                    <td>{{$resource->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        {{-- <div class="btn-group">
                            <a href="{{route('resources.edit', $resource->id)}}" class="btn btn-sm btn-primary">EDITAR</a>
                            <form action="{{route('resources.destroy', $resource->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">REMOVER</button>
                            </form>
                        </div> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum recurso cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{-- {{$resources->links()}} --}}
    </div>


</x-app-layout>
