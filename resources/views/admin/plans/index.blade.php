<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planos') }}
        </h2>
    </x-slot>

    <hr>

    <div class="row mb-4">
        <!-- <div class="col-md-12 mt-4 text-right">
            <a href="{{route('plans.create')}}" class="btn btn-success" title="Adicionar plano"> <i class="fas fa-fw fa-plus"></i> Adicionar</a>
        </div> -->
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
                            
                            <!-- <a href="#" class="btn btn-sm btn-outline-danger mr-1"
                                onclick="event.preventDefault(); 
                                if(confirm('Deseja realmente remover o perfil {{$plan->name}}?')){
                                    return document.querySelector('form#plan-rm{{$key}}').submit();
                                }"> <i class="fas fa-fw fa-eraser"></i> 
                                Remover
                            </a> -->
                            
                            <!-- <form action="{{route('plans.destroy', $plan->id)}}" id="plan-rm{{$key}}" method="post">
                                @csrf 
                                @method('DELETE')
                            </form> -->
                            
                            <a href="{{route('plans.features', $plan->id)}}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-fw fa-list"></i> Atribuir serviços
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