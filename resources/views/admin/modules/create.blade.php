<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar módulo') }}
        </h2>
    </x-slot>

    <hr>

    <form action="{{route('modules.store')}}" method="post">
        @csrf

        <div class="row form-group">
            <div class="col-md-8">
                <label>Nome do Módulo: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Atividades" value="{{old('name')}}" required>
    
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label>Ícone: </label>
                <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="Ex.: fas fa-fw fa-chart-line" value="{{old('icon')}}">
    
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="form-group text-right mt-5">
            <a href="{{route('modules.index')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success"> Adicionar </button>
        </div>
        
        <hr>
    </form>

</x-app-layout>