<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar usuário') }}
        </h2>
    </x-slot>

    <form action="{{route('users.store')}}"  method="POST">
        @csrf

        <div class="card">
            <div class="card-body">

                <div class="row form-group">
                    <div class="col-md-12">
                        <label> Conta para pessoa:  <span class="text-danger">*</span> </label> <br>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="physical_person" name="type_user_id" class="form-control @error('type_user_id') is-invalid @enderror" value="1">
                            <label class="custom-control-label" for="physical_person">Física</label>
                        </div>
        
                        <div class="form-check form-check-inline">
                            <input type="radio" id="legal_person" name="type_user_id" class="form-control @error('type_user_id') is-invalid @enderror" value="2" >
                            <label class="custom-control-label" for="legal_person">Jurídica</label>
                        </div>
                    </div>
                </div>

                <hr class="mt-4">

                <div id="div_physical_person" class="mt-3 isVisible">
                    
                    @include('admin.users.includes.create-physical-person')

                </div>

                <div id="div_legal_person" class="mt-3 isInvisible">

                    @include('admin.users.includes.create-legal-person')
            
                </div>

                <hr class="mt-4">

                <div class="row form-group mt-3">
                    <div class="col-md-6">
                        <label>Perfil: <span class="text-danger">*</span> </label>
                        <select name="role_id" class="form-control" required>
                            <option value=""> -- Selecione -- </option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label> Este usuário está ativo:  <span class="text-danger">*</span> </label> <br>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="active_user" name="is_active" class="form-control @error('is_active') is-invalid @enderror" value="1" checked>
                            <label class="custom-control-label" for="active_user">Sim</label>
                        </div>
        
                        <div class="form-check form-check-inline">
                            <input type="radio" id="inactive_user" name="is_active" class="form-control @error('is_active') is-invalid @enderror" value="0">
                            <label class="custom-control-label" for="inactive_user">Não</label>
                        </div>
                    </div>
                </div>


                <hr class="mt-4">

                <strong> Dados complementares </strong>
                <small class="form-text text-muted">Em caso de atendimento presencial, o endereço será obrigatório.</small>
        
                <div class="row form-group mt-2">
                    <div class="col-md-3">
                        <label>CEP: </label>
                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="addressArray[zip_code]" id="zip_code" value="{{ old('addressArray[zip_code]') }}">
                        <div class="mt-2" id="errorZipCodeMessage"> </div>
                        @error('zip_code')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-2 mt-2"> <br>
                        <button type="button" class="btn btn-info" id="btnSearchZipCode" onclick="searchZipCode(false);"> <i class="fas fa-fw fa-search"></i> Consultar </button>
                    </div>
                </div>

                <div id="div_address" class="isInvisible">

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Logradouro: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="addressArray[address]" id="address" value="{{ old('addressArray[address]') }}" readonly required placeholder="Ex: Avenida Beira Mar">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="col-md-3">
                            <label>Número: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror" name="addressArray[number]" id="number" value="{{ old('addressArray[number]') }}" readonly required placeholder="Ex: 1000">
                            @error('number')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Complemento: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('complement') is-invalid @enderror" name="addressArray[complement]" id="complement" value="{{ old('addressArray[complement]') }}" readonly required placeholder="Ex: Quadra 01...">
                            @error('complement')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label>Bairro: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('neighborhood') is-invalid @enderror" name="addressArray[neighborhood]" id="neighborhood" value="{{ old('addressArray[neighborhood]') }}" readonly required placeholder="Ex: Centro">
                            @error('neighborhood')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="col-md-4">
                            <label>Cidade: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="addressArray[city]" id="city" value="{{ old('addressArray[city]') }}" readonly required placeholder="Ex: São Luís">
                            @error('city')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="col-md-4">
                            <label>UF: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" name="addressArray[state]" id="state" value="{{ old('addressArray[state]') }}" readonly required placeholder="Ex: MA" >
                            @error('state')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    {{-- <div class="row form-group">
                        <div class="col-md-12">
                            <label>Observação: </label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror" name="addressArray[note]" value="{{ old('addressArray[note]') }}">
                            @error('note')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div> --}}

                </div>
        
                <div class="form-group text-right mt-5">
                    <a href="{{route('users.index')}}" class="btn btn-danger"> Cancelar </a>
                    <button type="button" class="btn btn-success" onclick="validateRequiredInputs(this);"> Adicionar </button>
                </div>
            </div>
        </div>

    </form>

    @section('scripts')
        <script>
            $(document).ready( function () {
                @if(!old('type_user_id'))
                    $("#physical_person").prop('checked',true);
                @endif

                @if(old('type_user_id') == App\Models\TypeUser::PHYSICAL_PERSON)
                    showPhysicalPersonForm();
                @endif

                @if(old('type_user_id') == App\Models\TypeUser::LEGAL_PERSON)
                    showLegalPersonForm();
                @endif
            });
        </script>
    @endsection


</x-app-layout>