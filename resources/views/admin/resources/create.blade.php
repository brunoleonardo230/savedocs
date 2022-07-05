<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar permissão') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">

            <form action="{{route('resources.store')}}"  method="post">
                @csrf
        
                <div class="row form-group mt-3">
                    <div class="col-md-6">
                        <label> Nome permissão: <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Listar usuários" required>
            
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
        
                    <div class="col-md-6">
                        <label>Recurso (controller.function): <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="resource" placeholder="Ex.: users.index" required>
                       
                        @error('resource')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-md-6">
                        <label>Módulo: <span class="text-danger">*</span> </label>
                        <select name="module_id" class="form-control" required>
                            <option value=""> -- Selecione -- </option>
                            @foreach($modules as $module)
                                <option value="{{$module->id}}">{{$module->name}}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="col-md-3">
                        <label>Ícone: </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="icon" placeholder="Ex.: fas fa-fw fa-users">
                       
                        @error('resource')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
        
                    <div class="col-md-3">
                        <label> Exibir este item em menu ? <span class="text-danger">*</span> </label> <br>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="isMenu1" name="is_menu" class="form-control @error('is_menu') is-invalid @enderror" value="1">
                            <label class="custom-control-label" for="isMenu1">Sim</label>
                        </div>
        
                        <div class="form-check form-check-inline">
                            <input type="radio" id="isMenu2" name="is_menu" class="form-control @error('is_menu') is-invalid @enderror" value="0" checked>
                            <label class="custom-control-label" for="isMenu2">Não</label>
                        </div>
                    </div>
                </div>
        
                
                <div class="form-group text-right mt-5">
                    <a href="{{route('resources.index')}}" class="btn btn-danger"> Cancelar </a>
                    <button class="btn btn-success"> Adicionar </button>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>