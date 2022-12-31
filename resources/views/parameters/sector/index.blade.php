<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setor') }}
        </h2>
    </x-slot>

    <div class="card mb-3">
        <div class="card-body">
            <div class="text-right">
                <a href="{{route('sector.create')}}" class="btn btn-success" title="Adicionar perfil"> <i class="fas fa-fw fa-plus"></i> Adicionar</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table data-table table-striped">
                <thead>
                    <tr>
                        <th class="w-75">Nome</th>
                        <th>Criado Em</th>
                        <th class="w-5">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($sectors as $key => $sector)
                    <tr>
                        <td>{{$sector->name}}</td>
                        <td>{{$sector->created_at->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('sector.edit', $sector->id)}}" class="btn btn-sm btn-outline-primary mr-1">EDITAR</a>
                                
                                <a href="#" class="btn btn-sm btn-outline-danger mr-1"
                                    onclick="event.preventDefault(); 
                                    if(confirm('Deseja realmente remover o setor: {{$sector->name}} ?')){
                                        return document.querySelector('form#module-rm{{$key}}').submit();
                                    }"> <i class="fas fa-fw fa-eraser"></i> 
                                    Remover
                                </a>
                                
                                <form action="{{route('sector.destroy', $sector->id)}}" id="module-rm{{$key}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum setor cadastrado!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>