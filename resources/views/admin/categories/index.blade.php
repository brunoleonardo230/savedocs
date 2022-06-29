<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias de Serviços') }}
        </h2>
    </x-slot>

    <hr>

    <div class="row mb-4">
        <div class="col-md-12 mt-4 text-right">
            <a href="{{route('categories.create')}}" class="btn btn-success" title="Adicionar categoria"> <i class="fas fa-fw fa-plus"></i> Adicionar Serviço</a>
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
            @forelse($categories as $key => $category)
                <tr>
                    <td>{{$category->name}} <span class="badge badge-danger">{{$category->category}}</span></td>
                    <td>{{$category->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <div class="btn-group">
                            
                            <a href="{{route('categories.edit', $category->id)}}" type="button" class="btn btn-sm btn-outline-primary mr-1"> <i class="fas fa-fw fa-edit"></i>EDITAR</a>                                                        
                            
                            <!-- <a href="{{route('categories.services', $category->id)}}" class="btn btn-sm btn-outline-secondary mr-1">
                                <i class="fas fa-fw fa-list"></i> Atribuir serviço a categoria
                            </a> -->

                            <a href="#" class="btn btn-sm btn-outline-danger mr-1"
                                onclick="event.preventDefault(); 
                                if(confirm('Deseja realmente remover a categoria {{$category->name}}?')){
                                    return document.querySelector('form#category-rm{{$key}}').submit();
                                }"> <i class="fas fa-fw fa-eraser"></i> 
                                Remover
                            </a> 
                            
                            <form action="{{route('categories.destroy', $category->id)}}" id="category-rm{{$key}}" method="post">
                                @csrf 
                                @method('DELETE')
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhuma categoria cadastrada!</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>