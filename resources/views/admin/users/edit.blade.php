<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualizar usuário') }}
        </h2>
    </x-slot>

    <hr>

    <form action="{{route('users.update', $user->id)}}"  method="POST">
        @csrf
        @method('PUT')
        <div class="row form-group">
            <div class="col-md-12">
                <label>Nome completo: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                <label>E-mail: <span class="text-danger">*</span> </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label>Perfil: <span class="text-danger">*</span> </label>
                <select name="role_id" class="form-control" required>
                    <option value=""> -- Selecione -- </option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}"
                            @if($user->role()->count() && $user->role->id == $role->id) selected @endif
                        >{{$role->name}}
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group text-right">
            <a href="{{route('users.index')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success"> Atualizar </button>
        </div>

        <hr>
    </form>

</x-app-layout>
