<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minha conta') }}
        </h2>
    </x-slot>

    <x-slot name="button">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-data-update-for-access" data-whatever="@mdo"> <i class="fas fa-fw fa-key"></i> Atualizar dados para acesso </button>
    </x-slot>
    @if (count($user->equipaments))
        <x-slot name="button_2">
            <button type="button" class="btn btn-dark ml-1" data-toggle="modal" data-target="#m-equipaments-{{$user->id}}">
                <i class="fas fa-fw fa-desktop"></i>
                Meus equipamentos
            </button>
        </x-slot>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('accounts.update', $user->id)}}"  method="POST">
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

                <div id="div_address" class="{{ !isset($user->address) ? 'isInvisible' : '' }}">

                <div class="row form-group">
                        <div class="col-md-9">
                            <label>Logradouro: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('addressArray.address') is-invalid @enderror" name="addressArray[address]" id="address" value="@if(isset($user->address)){{ $user->address->address }} @endif" readonly required placeholder="Ex: Avenida Beira Mar">
                            @error('addressArray.addressArray[address]')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror 
                        </div>
    
                        <div class="col-md-3">
                            <label>Número: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('addressArray.number') is-invalid @enderror" name="addressArray[number]" id="number" value="@if(isset($user->address)){{ $user->address->number }} @endif" required placeholder="Ex: 1000">
                            @error('addressArray.addressArray.number')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Complemento: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('addressArray.complement') is-invalid @enderror" name="addressArray[complement]" id="complement" value="@if(isset($user->address)){{ $user->address->complement }} @endif" required placeholder="Ex: Quadra 01...">
                            @error('addressArray.complement')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label>Bairro: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('addressArray.neighborhood') is-invalid @enderror" name="addressArray[neighborhood]" id="neighborhood" value="@if(isset($user->address)){{ $user->address->neighborhood }} @endif" readonly required placeholder="Ex: Centro">
                            @error('addressArray.neighborhood')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="col-md-4">
                            <label>Cidade: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('addressArray.city') is-invalid @enderror" name="addressArray[city]" id="city" value="@if(isset($user->address)){{ $user->address->city }} @endif" readonly required placeholder="Ex: São Luís">
                            @error('addressArray.city')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="col-md-4">
                            <label>UF: <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('addressArray.state') is-invalid @enderror" name="addressArray[state]" id="state" value="@if(isset($user->address)){{ $user->address->state }} @endif" readonly required placeholder="Ex: MA" >
                            @error('addressArray.state')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    {{-- <div class="row form-group">
                        <div class="col-md-12">
                            <label>Observação: </label>
                            <input type="text" class="form-control @error('addressArray.note') is-invalid @enderror" name="addressArray[note]" value="@if(isset($user->address)){{ $user->address->note }}">
                            @error('addressArray.note')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>  
                    </div> --}}

                </div>

                <div class="form-group text-right mt-5">
                    <a href="{{ route('dashboard')}}" class="btn btn-danger"> Cancelar </a>
                    <button type="button" class="btn btn-success" onclick="validateRequiredInputs(this);"> Atualizar </button>
                </div>
                
            </form>
        </div>
        
        @include('components.modal-data-update-for-access')
        @if (count($user->equipaments))
            <?php
                $userId = $user->id;
                $userName = $user->name ? $user->name : $user->fantasy_name;
                $equipaments = $user->equipaments;
            ?>
            @include('components.modal-equipaments', compact('userId', 'userName', 'equipaments'))
        @endif

    </div>


    @section('scripts')
        <script>
            $(document).ready( function () {
                @if($user->type_user_id == App\Models\TypeUser::PHYSICAL_PERSON)
                    showPhysicalPersonForm();
                @endif

                @if($user->type_user_id == App\Models\TypeUser::LEGAL_PERSON)
                    showLegalPersonForm();
                @endif

                @if(old('addressArray.*'))
                    showAddressForm();
                @endif

                @if(!isset($user->address) && !is_null($user->address))
                    clearAddressForm();
                @endif
            });
        </script>
    @endsection

</x-app-layout>
