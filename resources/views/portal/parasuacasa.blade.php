@extends('portal.app')

@section('content')

<section class='parasuacasa-banner'>

</section>
<section class="parasuacasa-contact" style='padding-top:60px; padding-bottom:60px;'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center">
                <h2 style='font-weight: 100;padding-top: 19px;'>COMO PODEMOS LHE AJUDAR?</h2>
            </div>
            <div class="col-md-4">
                <button class="btn"
                    style='background: #ece8e9;font-size: 21px;border-radius: 38px;padding: 6px 40px;margin-top: 14px;color: #0a8793;'><img
                        src="{{ asset('themes/img/whatsapp-icon-red.png') }}" alt="" style='width:27px;'> FALE
                    CONOSCO!</button>
            </div>
        </div>
    </div>
</section>
<!-- ======= About Section ======= -->
<section class="about section-bg">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <!-- <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('themes_lord/img/about.jpg') }}" class="img-fluid" alt="">
          </div> -->
            <div class="col-lg-7 pt-4 mt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"
                data-aos-delay="100">
                <div class="row d-flex justify-content-center mb-4">
                    <h3 class=''>SUPORTE DE TI SEM SAIR DO CONFORTO DE SUA CASA.</h3>
                    <p class="text-justify" style='font-weight: 100;'>
                        Oferecemos suporte em sua residência, lhe dando mais conforto e comodidade de não precisar levar
                        o seu equipamento em nenhuma loja e expor os seus arquivos particulares à pessoas desconhecidas
                        e ainda você pode contar com um ótimo padrão de atendimento.
                    </p>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100 text-center pb-3">
                            <img src="{{ asset('themes/img/icons/parasuacasa1.png') }}" alt=""
                                style='width: 100px;margin: 12px;'>
                            <p style='font-weight: 100;'>FORMATAÇÃO DE DESKTOPS E NOTEBOOKS</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100 text-center pb-3">
                            <img src="{{ asset('themes/img/icons/parasuacasa2.png') }}" alt=""
                                style='width: 100px;margin: 12px;'>
                            <p style='font-weight: 100;'>INSTALAÇÃO DE SISTEMAS OPERACIONAIS</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100 text-center pb-3">
                            <img src="{{ asset('themes/img/icons/parasuacasa3.png') }}" alt=""
                                style='width: 100px;margin: 12px;'>
                            <p style='font-weight: 100;'>CONSULTORIA DE TI PARA SUA CASA</p>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100 text-center pb-3">
                            <img src="{{ asset('themes/img/icons/parasuacasa4.png') }}" alt=""
                                style='width: 100px;margin: 12px;'>
                            <p style='font-weight: 100;'>CONFIGURAÇÃO DE ROTEADORES E IMPRESSORAS</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100 text-center pb-3">
                            <img src="{{ asset('themes/img/icons/parasuacasa5.png') }}" alt=""
                                style='width: 100px;margin: 12px;'>
                            <p style='font-weight: 100;'>LIMPEZA E REMOÇÃO DE VÍRUS</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100 text-center pb-3">
                            <img src="{{ asset('themes/img/icons/parasuacasa6.png') }}" alt=""
                                style='width: 100px;margin: 12px;'>
                            <p style='font-weight: 100;'>INSTALAÇÃO E MANUTENÇÃO DE HARDWARE E SOFTWARE</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 pt-4">
                <img src="{{ asset('themes/img/parasuacasa-contact.png') }}" alt="" class="w-100">
            </div>
        </div>

    </div>
</section><!-- End About Section -->
<section class='parasuacasa-adquira'>
</section>
<section class='parasuacasa-adquira-after'>
    <div class="container">
        <div class="col-md-12">
        <div class="section-title">
            
            <h3 class=''>PLANOS PESSOA FISICA.</h3>
            
        </div>
            <div class="row plans">
            @foreach ($plans as $plan)
                @if($plan->id <= 3)
                    <div class="parasuacasa-plan">
                        <h4>{{ $plan->name }}</h4>
                        <h5>R$ {{ $plan->price_br }}</h5>
                        <ul class='parasuacasa-pay'>
                        @foreach ($plan->features as $feature)
                            <li>{{ $feature->name }}</li>
                            <br>
                        @endforeach
                        </ul>
                        <a href="{{ route('choice.plan', $plan->url) }}" class="btn btn-danger">Assinar Agora Mesmo</a>
                    </div>
                @endif
            @endforeach                
            </div>
        </div>
        <div class="col-md-12">
        <div class="section-title">
            <h3 class=''>PLANOS PESSOA JURIDICA.</h3>
        </div>
            <div class="row plans">
            @foreach ($plans as $plan)
                @if($plan->id > 3)
                    <div class="parasuacasa-plan">
                        <h4>{{ $plan->name }}</h4>
                        <h5>R$ {{ $plan->price_br }}</h5>
                        <ul class='parasuacasa-pay'>
                        @foreach ($plan->features as $feature)
                            <li>{{ $feature->name }}</li>
                            <br>
                        @endforeach
                        </ul>
                        <a href="{{ route('choice.plan', $plan->url) }}" class="btn btn-danger">Assinar Agora Mesmo</a>
                    </div>
                @endif
            @endforeach                
            </div>
        </div>
    </div>
</section>

@endsection