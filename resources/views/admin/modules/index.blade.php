<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Módulos') }}
        </h2>
    </x-slot>

    <hr>

    <div class="row mb-4">
        <div class="col-md-12 mt-4 text-right">
            <a href="{{route('modules.create')}}" class="btn btn-success" title="Adicione módulos"> <i class="fas fa-fw fa-plus"></i> Adicionar</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Permissões Vinculadas</th>
                    <th>Criado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($modules as $key => $module)
                <tr>
                    <td>{{$module->id}}</td>
                    <td>{{$module->name}}</td>
                    <td>{{$module->resources->count()}}</td>
                    <td>{{$module->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <div class="btn-group">

                            <a href="{{route('modules.edit', $module->id)}}" class="btn btn-sm btn-outline-primary mr-1">EDITAR</a>
                            
                            <a href="#" class="btn btn-sm btn-outline-danger mr-1"
                                onclick="event.preventDefault(); 
                                if(confirm('Deseja realmente remover este módulo ?')){
                                    return document.querySelector('form#module-rm{{$key}}').submit();
                                }"> <i class="fas fa-fw fa-eraser"></i> 
                                Remover
                            </a>
                            
                            <form action="{{route('modules.destroy', $module->id)}}" id="module-rm{{$key}}" method="post">
                                @csrf 
                                @method('DELETE')
                            </form>
                            
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum módulo cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
       
    </div>

</x-app-layout>