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

                                    <div class="text-center d-sm-block d-md-none d-md-block d-lg-none">
                                        <img src="{{ asset('themes/img/logo.png') }}" alt="Logo SaveDocs" width="250px;">
                                    </div>

                                   

                                     <!-- Session Status -->
                                    <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />
                                    
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />

                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="text" name="user_login" class="form-control form-control-user"
                                                id="exampleInputuserLogin" aria-describedby="userLoginHelp"
                                                placeholder="Login">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Senha">
                                        </div>

                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> --}}

                                        <button class="btn btn-primary btn-user btn-block">
                                            Entrar
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">Esqueceu sua senha ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}"> Crie sua conta </a>
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
