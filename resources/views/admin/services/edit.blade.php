<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualiza Serviço') }}
        </h2>
    </x-slot>

    <hr>
   
    <form action="{{route('services.update', $service->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="row form-group">
            <div class="col-md-6">
                <label>Nome Recurso: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome" value="{{$service->name}}" required>
        
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Prioridade: <span class="text-danger">*</span> </label>
                <select name="priority_id" class="form-control" required>
                    <option value=""> -- Selecione -- </option>
                    @foreach($priorities as $priority)
                        <option value="{{$priority->id}}"
                                    @if($service->priority_id == $priority->id) selected @endif
                                > {{$priority->name}}
                        </option>
                    @endforeach
                </select>
            </div>         
        </div>

        <div class="form-group text-right">
            <a href="{{route('services.create')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success"> Atualizar </button>
        </div>

        <hr>
    </form>


</x-app-layout>