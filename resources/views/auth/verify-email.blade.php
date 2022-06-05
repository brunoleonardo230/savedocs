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

                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Obrigado por inscrever-se! Antes de começar, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Se você não recebeu o e-mail, teremos o prazer de lhe enviar outro.') }}
                                    </div>

                                    @if (session('status') == 'verification-link-sent')
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ __('Um novo link de verificação foi enviado para o endereço de e-mail fornecido durante o registro.') }}
                                        </div>
                                    @endif

                                    <div class="mt-4 flex items-center justify-between">
                                        <form class="user" method="POST" action="{{ route('verification.send') }}">
                                            @csrf

                                            <div>
                                                <input type="submit" value="'Reenviar email de verificação" class="btn btn-primary btn-user btn-block"> 
                                            </div>
                                        </form>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                                {{ __('Sair') }}
                                            </button>
                                        </form>
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
