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

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />

                                    <form class="user" method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" form-control form-control-user value="{{ $request->route('token') }}">

                                        <!-- Email Address -->
                                        <div>
                                            <x-input id="email" class="block mt-1 w-full form-control form-control-user" type="email" name="email" :value="old('email', $request->email)" required autofocus readonly />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input id="password" class="block mt-1 w-full form-control form-control-user" type="password" name="password" required placeholder="Informe sua nova senha" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-input id="password_confirmation" class="block mt-1 w-full form-control form-control-user"
                                                                type="password"
                                                                name="password_confirmation" required placeholder="Confirme sua nova senha" />
                                        </div>

                                        
                                        <div class="flex items-center justify-end mt-4">
                                            <input type="submit" value="Redefinir senha" class="btn btn-primary btn-user btn-block"> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
