<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minha conta') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('users.update', $user->id)}}"  method="POST">
                @csrf
                @method('PUT')

                <div class="row form-group">
                    <div class="col-md-3">
                        <label> Tipo de conta:</label>
                        <input type="text" class="form-control" disabled value="{{ $user->type_user_id == App\Models\TypeUser::PHYSICAL_PERSON ? 'Pessoa física' : 'Pessoa jurídica' }}" >
                    </div>

                    <div class="col-md-3">
                        <label>Tipo de acesso: </label>
                        <input type="text" class="form-control" disabled value="{{ $user->role->name }}" >
                    </div>

                    <div class="col-md-3">
                        <label> Situação:</label>
                        <input type="text" class="form-control" disabled value="{{ $user->is_active ? 'Ativo' : 'Inativo' }}" >
                    </div>

                    <div class="col-md-3">
                        <label> Criado em:</label>
                        <input type="text" class="form-control" disabled value="{{ $user->created_at->format('d/m/Y') }}" >
                    </div>
                </div>

                <hr class="mt-4">

                <div id="div_physical_person" class="mt-3 isVisible">
                    
                    @include('admin.users.includes.edit-physical-person')

                </div>

                <div id="div_legal_person" class="mt-3 isInvisible">

                    @include('admin.users.includes.edit-legal-person')
            
                </div>

                <hr class="mt-4">

                <strong> Dados complementares </strong>
                <small class="form-text text-muted">Em caso de atendimento presencial, o endereço será obrigatório.</small>
        
                <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label>CEP: </label>
                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="addressArray[zip_code]" id="zip_code" value="@if(isset($user->address)){{ $user->address->zip_code }} @endif">
                        @error('zip_code')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-2 mt-2"> <br>
                        <button type="button" class="btn btn-info" id="btnSearchZipCode" onclick="searchZipCode(true);"> <i class="fas fa-fw fa-search"></i> Consultar </button>
                    </div>
                </div>

                <div id="div_address" @if(!isset($user->address)) style="display:none;" @endif>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Logradouro: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="addressArray[address]" id="address" value="@if(isset($user->address)){{ $user->address->address }} @endif" readonly required placeholder="Ex: Avenida Beira Mar">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror 
                        </div>
    
                        <div class="col-md-3">
                            <label>Número: <span class="text-danger">*</span> </label>
                            <input type="number" class="form-control @error('number') is-invalid @enderror" name="addressArray[number]" id="number" value="@if(isset($user->address)){{ $user->address->number }} @endif" required placeholder="Ex: 1000">
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
                            <input type="text" class="form-control @error('complement') is-invalid @enderror" name="addressArray[complement]" id="complement" value="@if(isset($user->address)){{ $user->address->complement }} @endif" required placeholder="Ex: Quadra 01...">
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
                            <input type="text" class="form-control @error('neighborhood') is-invalid @enderror" name="addressArray[neighborhood]" id="neighborhood" value="@if(isset($user->address)){{ $user->address->neighborhood }} @endif" readonly required placeholder="Ex: Centro">
                            @error('neighborhood')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="col-md-4">
                            <label>Cidade: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="addressArray[city]" id="city" value="@if(isset($user->address)){{ $user->address->city }} @endif" readonly required placeholder="Ex: São Luís">
                            @error('city')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="col-md-4">
                            <label>UF: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" name="addressArray[state]" id="state" value="@if(isset($user->address)){{ $user->address->state }} @endif" readonly required placeholder="Ex: MA" >
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
                            <input type="text" class="form-control @error('note') is-invalid @enderror" name="addressArray[note]" value="@if(isset($user->address)){{ $user->address->note }}">
                            @error('note')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div> --}}

                </div>

                <div class="form-group text-right mt-5">
                    <a href="{{ route('dashboard')}}" class="btn btn-danger"> Cancelar </a>
                    <button class="btn btn-success"> Atualizar </button>
                </div>
                
            </form>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready( function () {
                
                addMaskInputs();

                @if(!isset($user->address))
                    clearAddressForm();
                @endif

                @if($user->type_user_id == App\Models\TypeUser::PHYSICAL_PERSON)
                    $("#div_legal_person").removeClass('isVisible').addClass('isInvisible');
                    $("#div_physical_person").removeClass('isInvisible').addClass('isVisible');
                @else
                    $("#div_physical_person").removeClass('isVisible').addClass('isInvisible');
                    $("#div_legal_person").removeClass('isInvisible').addClass('isVisible');
                @endif

            });

            $("#physical_person" ).click(function() {

                $("#div_legal_person").removeClass('isVisible').addClass('isInvisible');
                $("#div_physical_person").removeClass('isInvisible').addClass('isVisible');
            });

            $("#legal_person" ).click(function() {

                $("#div_physical_person").removeClass('isVisible').addClass('isInvisible');
                $("#div_legal_person").removeClass('isInvisible').addClass('isVisible');
            });
        </script>
    @endsection

</x-app-layout>