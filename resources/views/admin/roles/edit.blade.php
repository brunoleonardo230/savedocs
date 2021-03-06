<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualize perfil') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">

            <form action="{{route('roles.update', $role->id)}}" method="post">
                @csrf
                @method('PUT')
        
                <div class="row form-group mt-3">
                    <div class="col-md-6">
                        <label>Nome perfil: <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Administrador" value="{{$role->name}}" required>
                
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
        
                    <div class="col-md-6">
                        <label>Perfil (ROLE_*): <span class="text-danger">*</span> </label> 
                        <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" placeholder="Ex.: ROLE_ADMIN" value="{{$role->role}}" required>
                        {{-- <small class="form-text text-muted"> Mantenha o padrão deste campo, mudanças poderão impactar na aplicação.</small> --}}
                        
                        @error('role')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group text-right mt-5">
                    <a href="{{route('roles.index')}}" class="btn btn-danger"> Cancelar </a>
                    <button class="btn btn-success"> Atualizar </button>
                </div>
        
            </form>

        </div>
    </div>

</x-app-layout>