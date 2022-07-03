<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Serviço') }}
        </h2>
    </x-slot>

    <hr>

    <form action="{{route('services.store')}}"  method="post">
        @csrf

        <div class="row form-group">
            <div class="col-md-6">
                <label>Nome Recurso: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome" value="{{old('name')}}">
    
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>            
        </div>

        <div class="form-group text-right">
            <a href="{{route('plans.index')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success"> Adicionar </button>
        </div>

        <hr>
    </form>

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Recursos</th>                    
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($services as $key => $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->name}}</td>                    
                    <td>
                        <div class="btn-group">
                            <a href="{{route('services.edit', $service->id)}}" class="btn btn-sm btn-outline-primary mr-1"> <i class="fas fa-fw fa-edit"></i> EDITAR</a>

                            <a href="#" class="btn btn-sm btn-outline-danger"
                                onclick="event.preventDefault(); 
                                if(confirm('Deseja realmente remover este Recurso ?')){
                                    return document.querySelector('form#service-rm{{$key}}').submit();
                                }"> <i class="fas fa-fw fa-eraser"></i> 
                                Remover
                            </a>
                            
                            <form action="{{route('services.destroy', $service->id)}}" id="service-rm{{$key}}" method="post">
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