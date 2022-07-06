<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualizar módulo') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">

            <form action="{{route('modules.update', $module->id)}}" method="post">
                @csrf
                @method('PUT')
        
                <div class="row form-group mt-3">
                    <div class="col-md-8">
                        <label>Nome do Módulo: <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Atividades" value="{{$module->name}}" required>
            
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
        
                    <div class="col-md-4">
                        <label>Ícone: </label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="Ex.: fas fa-fw fa-chart-line" value="{{$module->icon}}">
            
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group text-right mt-5">
                    <a href="{{route('modules.index')}}" class="btn btn-danger"> Cancelar </a>
                    <button class="btn btn-success"> Atualizar </button>
                </div>
              
            </form>

        </div>
    </div>

    
</x-app-layout>