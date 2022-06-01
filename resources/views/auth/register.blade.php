<x-guest-layout>
    
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block text-center" style="margin-top: 11%;">
                        <img src="{{ asset('themes/img/logo.png') }}" alt="Logo SaveDocs">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie a sua conta aqui!</h1>
                            </div>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />

                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-user" id="exampleInputName"
                                        placeholder="Nome" value="{{ old('name') }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Senha" value="{{ old('password') }}" required autocomplete="new-password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation "class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Confirme senha" value="{{ old('password_confirmation') }}" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Criar conta
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Esqueceu a senha?</a>
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
</x-guest-layout>