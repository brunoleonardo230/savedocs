<x-guest-layout>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center d-none d-lg-block p-0">
                                        <img src="{{ asset('themes/img/logo.png') }}" alt="Logo SaveDocs">
                                    </div>
                                
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />

                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-4">Crie a sua conta aqui!</h1>
                                    </div>

                                    <hr>

                                    <form class="user" method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row form-group">
                                            <div class="col-md-12 text-center">
                                                <label> A conta é para pessoa: </label> <br>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="physical_person" name="type_user_id" class="form-control @error('type_user_id') is-invalid @enderror" value="1" checked>
                                                    <label class="custom-control-label" for="physical_person">Física</label>
                                                </div>
                                
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="legal_person" name="type_user_id" class="form-control @error('type_user_id') is-invalid @enderror" value="2" >
                                                    <label class="custom-control-label" for="legal_person">Jurídica</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Name -->
                                        <div>
                                            <x-input id="name" class="form-control form-control-user" type="text" name="name" :value="old('name')" required autofocus placeholder="Informe seu nome completo" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" required placeholder="Informe seu melhor e-mail"  />
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <!-- Password -->
                                                <div class="mt-4">
                                                    <x-input id="password" class="form-control form-control-user"
                                                                    type="password"
                                                                    name="password"
                                                                    required autocomplete="new-password" placeholder="Informe sua senha"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- Confirm Password -->
                                                <div class="mt-4">
                                                    <x-input id="password_confirmation" class="form-control form-control-user"
                                                                    type="password"
                                                                    name="password_confirmation" required placeholder="Confirme sua senha"/>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="submit" value="Criar conta" class="btn btn-primary btn-user btn-block"> 
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">Esqueceu sua senha ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Já tem uma conta? Acesse!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
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
            border-right: solid 3px blue;
            border-bottom: solid 3px blue;
            transform: rotate(45deg);
        }

        .isVisible {
            display: block;
        }

        .isInvisible {
            display: none;
        }

    </style>
    
</x-guest-layout>