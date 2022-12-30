<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar setor') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">

            <form action="{{route('sector.store')}}"  method="post">
                @csrf

                <div class="row form-group">
                    <div class="col-md-8">
                        <label>Nome: <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Administrativo" value="{{old('name')}}" required>
            
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Status: <span class="text-danger">*</span> </label> 
                        <select name="is_active" class="form-control @error('is_active') is-invalid @enderror" required>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                        
                        @error('is_active')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                </div>

                <div class="row form-group mt-3">
                    <div class="col-md-12">
                        <label>Descrição:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="" cols=""></textarea>
                        <small class="form-text text-muted"> Esta informação é opcional </small>
            
                        @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-right mt-5">
                    <a href="{{route('sector.index')}}" class="btn btn-danger"> Cancelar </a>
                    <button class="btn btn-success"> Adicionar </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>