@extends('portal.app')

@section('content')
<!-- ======= Hero Section ======= -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="load-carousel">
            <div class="lord-carousel-bar"></div>
        </div>
        <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol> -->
        <div class="carousel-inner" data-aos="fade-up">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('themes/img/testimonials-bg.jpg') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="col-md-4 p-3" style='text-align:left;'>
                        <h2 style='padding-bottom: 40px;' class='text-dark'><b
                                style='color:#187c92;'>SUPORTE</b><br>CORPORATIVO.
                        </h2>
                        <div class="" style='width:50px; height:3px; background:#187c92;'></div>
                        <p class='mt-2 text-dark'>
                        Atendimento presencial e acesso remoto com organização e agilidade que seu negócio precisa.
                        </p>

                        <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'>
                            <button class="btn rounded" style='background:#007dc6;color:#fff;'>SAIBA MAIS</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('themes/img/testimonials-bg2.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="col-md-4 p-3" style='text-align:left;'>
                        <h2 style='padding-bottom: 40px;' class='text-dark'><b style='color:#187c92;'>DESENVOLVIMENTO</b><br>WEB E MOBILE
                        </h2>
                        <div class="" style='width:50px; height:3px; background:#187c92;'></div>
                        <p class='mt-2 text-dark'>
                        Construímos seu site sob medida, com o melhor custo benefício para você.
                        </p>

                        <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'>
                            <button class="btn rounded" style='background:#007dc6;color:#fff;'>SAIBA MAIS</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('themes/img/testimonials-bg3.jpg') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="col-md-4 p-3" style='text-align:left;'>
                        <h2 style='padding-bottom: 40px;' class='text-dark'><b
                                style='color:#187c92;'>CONSULTORIA</b><br>EM TI.
                        </h2>
                        <div class="" style='width:50px; height:3px; background:#187c92;'></div>
                        <p class='mt-2 text-dark'>
                        Oferecemos soluções de TI para empresas, ajustando as opções tecnológicas disponíveis no mercado às necessidades do seu negócio, seja para softwares, servidores ou computadores.
                        </p>

                        <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'>
                            <button class="btn rounded" style='background:#007dc6;color:#fff;'>SAIBA MAIS</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
    </div>

<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services" style='padding:80px 0px; background:#f8f8f8;'>
        <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>SOLUÇÕES AVANÇADAS</h2>
                    <h3>Soluções<span></span></h3>
                </div>
                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-3 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100 text-center pb-3">
                                
                                <img src="{{ asset('themes/img/icons/icon1.png') }}" alt=""
                                    style='width: 50px;margin: 12px;'>
                                <h5 class='mt-1'>Suporte Doméstico</h5>
                                <p>Oferecemos suporte em sua residência, lhe dando mais conforto e comodidade de não precisar levar o seu equipamento em nenhuma loja.</p>
                                <a href="{{ url('/parasuacasa') }}" target='_other'><button class="btn bt-danger">Saiba mais</button></a>    
                            </div>
                        </div>
                        <div class="col-lg-3 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                                data-aos-delay="100">
                            <div class="icon-box w-100 text-center pb-3">
                                    
                                    <img src="{{ asset('themes/img/icons/icon8.png') }}" alt=""
                                        style='width: 50px;margin: 12px;'>
                                    <h5 class='mt-1'>Suporte Corporativo</h5>
                                    <p>Atendimento presencial e acesso remoto com organização e agilidade que seu negócio precisa.</p>
                                    <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'><button class="btn bt-danger">Saiba mais</button></a>    
                            </div>
                        </div>

                        <div class="col-lg-3 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                            data-aos-delay="200">
                            <div class="icon-box w-100 text-center pb-3">
                                
                                <img src="{{ asset('themes/img/icons/icon2.png') }}" alt=""
                                    style='width: 50px;margin: 12px;'>
                                <h5 class='mt-1'>Servidores e Firewall</h5>
                                <p>Instalamos e configuramos servidores e/ou firewall de acordo com a necessidade. O objetivo é manter a segurança, integridade e a disponibilidade de sua empresa.</p>    
                                <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'><button class="btn bt-danger">Saiba mais</button></a>    
                        </div>
                        </div>

                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-3 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                            data-aos-delay="300">
                            <div class="icon-box w-100 text-center pb-3">
                                
                                <img src="{{ asset('themes/img/icons/icon4.png') }}" alt=""
                                    style='width: 50px;margin: 12px;'>
                                <h5 class='mt-1'>Consultoria em TI
                                    </h5>
                                    <p>Oferecemos soluções de TI para empresas, ajustando as opções tecnológicas disponíveis no mercado às necessidades do seu negócio, seja para softwares, servidores ou computadores</p>
                                <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'><button class="btn bt-danger">Saiba mais</button></a>    
                            </div>
                        </div>

                        <div class="col-lg-3 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                            data-aos-delay="300">
                            <div class="icon-box w-100 text-center pb-3">
                                
                                <img src="{{ asset('themes/img/icons/icon5.png') }}" alt=""
                                    style='width: 50px;margin: 12px;'>
                                <h5 class='mt-1'>Desenvolvimento Web e Mobile
                                    </h5>
                                    <p>Construímos seu site sob medida, com o melhor custo benefício para você.</p>
                                <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'><button class="btn bt-danger">Saiba mais</button></a>    
                            </div>
                        </div>

                        <div class="col-lg-3 mt-2 mb-2 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                            <div class="icon-box w-100 text-center pb-3">
                                
                                <img src="{{ asset('themes/img/icons/icon6.png') }}" alt=""
                                    style='width: 50px;margin: 12px;'>
                                <h5 class='mt-1'>Backup
                                </h5>
                                <p>Implantamos e monitoramos as rotinas de backup em recursos locais ou na nuvem disponíveis no negócio.</p>
                                <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'><button class="btn bt-danger">Saiba mais</button></a>    
                        </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-3 mt-2 mb-2 col-md-6 d-flex align-items-stretch " data-aos="zoom-in"
                            data-aos-delay="200">
                            <div class="icon-box w-100 text-center pb-3">
                                
                                <img src="{{ asset('themes/img/icons/icon7.png') }}" alt=""
                                    style='width: 50px;margin: 12px;'>
                                <h5 class='mt-1'>GED</h5>
                                <p>Facilite o Controle de Documentos Digitais com segurança e eficiência com o GED.</p>
                                <a href="https://api.whatsapp.com/send?phone=5598981494419" target='_other'><button class="btn bt-danger">Saiba mais</button></a>    
                            </div>
                        </div>
                    </div>

        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>CONTATO</h2>
                <h3>Fale Conosco<span></span></h3>
                {{-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> --}}
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4" style='box-shadow:none;'>
                        <i class="bx bx-map"></i>
                        <h3>Nosso Endereço</h3>
                        <p>Rua Josué Montello, No. 1, Bairro - Renascença II, São Luís - MA, 65075-120
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4" style='box-shadow:none;'>
                        <i class="bx bx-envelope"></i>
                        <h3>E-mail</h3>
                        <p>marcus@savedocs.com.br</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4" style='box-shadow:none;'>
                        <i class="bx bx-phone-call"></i>
                        <h3>Telefone</h3>
                        <p>(98) 98149-4419</p>
                    </div>
                </div>

            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2986.127272716635!2d-44.28603017781671!3d-2.506350521005674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7f68d900f12e4fb%3A0x90d84ae668094ada!2sUniversidade%20Ceuma!5e0!3m2!1spt-BR!2sbr!4v1631800832580!5m2!1spt-BR!2sbr"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>

                </div>

                <div class="col-lg-6">
                    <form action="{{ url('/cotacao') }}" method="post" role="form" class="php-email-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Nome Completo" required>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto"
                                required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Mensagem"
                                required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Carregando</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Obrigado pelo seu contato. Em breve entraremos em contato!</div>
                        </div>
                        <div class="text-center"><button type="submit">Enviar</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

@endsection