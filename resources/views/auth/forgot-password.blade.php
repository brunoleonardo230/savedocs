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
                                    <div class="text-center d-none d-lg-block">
                                        <img src="{{ asset('themes/img/logo.png') }}" alt="Logo SaveDocs">
                                    </div>

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Esqueceu sua senha?</h1>
                                        <span> Nós entendemos, coisas acontecem. Basta digitar seu endereço de e-mail abaixo 
                                            e enviaremos um link para redefinir sua senha! 
                                        </span>
                                    </div>

                                    <br>

                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />

                                    <form class="user" method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Email" value="{{ old('email') }}" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Redefinir senha
                                        </button>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Crie sua conta! </a>
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
</x-guest-layout>