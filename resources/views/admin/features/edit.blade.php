<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualiza Recurso') }}
        </h2>
    </x-slot>

    <hr>
   
    <form action="{{route('features.update', $feature->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="row form-group">
            <div class="col-md-6">
                <label>Nome Recurso: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome" value="{{$feature->name}}" required>
        
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>            
        </div>

        <div class="form-group text-right">
            <a href="{{route('features.create')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success"> Atualizar </button>
        </div>

        <hr>
    </form>


</x-app-layout>