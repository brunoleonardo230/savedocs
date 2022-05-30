@extends('portal.app')

@section('content')

<section class='container'>
    <div class="row justify-content-md-center">
        <div class="col-md-6 text-center">
            <img src="{{ asset('themes/img/ok.jpg') }}" alt="" class='w-25'>
            <h3>Pedido realizado com sucesso!</h3>
            <p>Seu pedido foi concluído, assim que o pagamento for confirmado um e-mail será disparado para a sua conta com as devidas instruções.</p>
        </div>
    </div>
</section>

@endsection