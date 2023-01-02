<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar equipamento') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">

            <form action="{{route('equipaments.store')}}"  method="post">
                @csrf

                <div class="row form-group">
                    <div class="col-md-6">
                        <label>Nome: <span class="text-danger">*</span> <small>(Equipamento)</small></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$equipament->name}}" required>
                        <small class="form-text text-muted"> Referência para o equipamento que facilite a identificação </small>
            
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Nome: <span class="text-danger">*</span> <small>(Proprietário)</small></label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                            <option value=""> -- selecione -- </option>
                            @foreach($users as $user)
                            <?php $name = $user->name ? $user->name : $user->fantasy_name; ?>
                            <option value="{{ $user->id}}" @if($user->id == $equipament->user_id) selected @endif>{{$name}}</option>
                            @endforeach
                        </select>
            
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <label>Código de identificação: <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control @error('identification_code') is-invalid @enderror" name="identification_code" value="{{$equipament->identification_code}}" required>
            
                        @error('identification_code')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label> Tipo de equipamento: <span class="text-danger">*</span> </label> 
                        <select name="equipment_type" class="form-control @error('equipment_type') is-invalid @enderror" required>
                            <option value=""> -- selecione -- </option>
                            @foreach($equipamentType as $key => $type)
                            <option value="{{$key}}" @if($key == $equipament->equipment_type) selected @endif> {{$type['name']}} </option>
                            @endforeach
                        </select>
                        
                        @error('equipment_type')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                </div>

                <div class="row form-group mt-3">
                    <div class="col-md-12">
                        <label>Observação:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="" cols="">{{$equipament->description}}</textarea>
                        <small class="form-text text-muted"> Esta informação é opcional </small>
            
                        @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-right mt-5">
                    <a href="{{route('equipaments.index')}}" class="btn btn-danger"> Cancelar </a>
                    <button class="btn btn-success"> Adicionar </button>
                </div>

            </form>
        </div>
    </div>

    @section('scripts')
        <!-- <script>
            $(document).ready( function () {
               
            });
        </script> -->
    @endsection

</x-app-layout>