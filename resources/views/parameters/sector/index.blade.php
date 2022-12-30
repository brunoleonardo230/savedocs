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
                        <th class="w-50">Nome</th>
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