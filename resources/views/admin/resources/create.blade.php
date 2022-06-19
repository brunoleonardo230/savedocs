<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar permissão') }}
        </h2>
    </x-slot>

    <hr>

    <form action="{{route('resources.store')}}"  method="post">
        @csrf

        <div class="row form-group">
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
            <div class="col-md-4">
                <label>Módulo: <span class="text-danger">*</span> </label>
                <select name="module_id" class="form-control" required>
                    <option value=""> -- Selecione -- </option>
                    @foreach($modules as $module)
                        <option value="{{$module->id}}">{{$module->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label>Ícone: </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="icon" placeholder="Ex.: fas fa-fw fa-users">
               
                @error('resource')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
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
        
        <hr>
    </form>

    <style>
        input[type='radio'] {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }
    
        input[type='radio'] + label {
            position: relative;
            cursor: pointer;
            padding-left: 30px;
        }
    
        input[type='radio'] + label::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            left: 0;
            bottom: 0;
            border: solid 2px;
            vertical-align: bottom;
        }
        input[type='radio']:checked + label::after {
            content: '';
            position: absolute;
            left: 10px;
            bottom: 10px;
            width: 10px;
            height: 20px;
            border-right: solid 3px green;
            border-bottom: solid 3px green;
            transform: rotate(45deg);
        }
    </style>

</x-app-layout>