<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planos') }}
        </h2>
    </x-slot>

    <hr>

    <div class="row mb-4">
        <div class="col-md-12 mt-4 text-right">
            <a href="{{route('features.create')}}" class="btn btn-success" title="Adicionar plano"> <i class="fas fa-fw fa-plus"></i>Recursos Plano - Site</a>
        
            <a href="{{route('services.create')}}" class="btn btn-success" title="Adicionar plano"> <i class="fas fa-fw fa-plus"></i>Serviços Plano</a>
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
            @forelse($plans as $key => $plan)
                <tr>
                    <td>{{$plan->name}}: <span class="badge badge-danger">{{$plan->plan}}</span></td>
                    <td>{{$plan->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <div class="btn-group">
                            
                            <a href="{{route('plans.edit', $plan->id)}}" type="button" class="btn btn-sm btn-outline-primary mr-1"> <i class="fas fa-fw fa-edit"></i>EDITAR</a>                                                        
                            
                            <a href="{{route('plans.features', $plan->id)}}" class="btn btn-sm btn-outline-secondary mr-1">
                                <i class="fas fa-fw fa-list"></i> Atribuir recursos ao plano Site
                            </a>

                            <a href="{{route('plans.services', $plan->id)}}" class="btn btn-sm btn-outline-secondary mr-1">
                                <i class="fas fa-fw fa-list"></i> Atribuir serviço a categoria
                            </a>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum plano cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>