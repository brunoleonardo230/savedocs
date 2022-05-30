<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Save Docs - Soluções Tecnológicas</title>
  <meta content="Soluções Tecnológicas para Empresas de todos os portes e segmentos e profissionais liberais que produzem, armazenam, movimentam, compartilham e tratam uma infinidade de informações e dados nas suas rotinas de trabalho. O fluxo é contínuo e as interrupções podem gerar transtornos e perdas financeiras significativas." name="description">
  <meta content="Suporte de TI Empresarial, Firewall, Backup, Monitoramento de Ativos, Desenvolvimento Web e Mobile, Consultoria em TI, LGPD, Infraestrutura de Redes, Servidores Windows e Linux" name="keywords">

  <!-- Favicons -->
  <!-- <link href="{{ asset('themes/img/favicon.ico') }}" rel="icon"> -->
  <link href="{{ asset('themes/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

 
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('themes/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('themes/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v3.3.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center color-option1 ">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
      <!-- <i class="bi bi-whatsapp ms-2"> <span>(98) 98149-4419</span> </i> | <i class="bi bi-envelope ms-2"> <span>contato@savedocs.com.br</span> </i> -->
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://www.facebook.com/savedocsma" class="facebook" target='_other:w
        '><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/savedocs/" class="instagram" target='_other'><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/company/savedocs/?viewAsMember=true" class="linkedin" target='_other'><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo"><img src="{{ asset('themes/img/logo.png') }}" alt=""></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ url('/') }}">Página Inicial</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/about') }}">Sobre</a></li>
          <li><a class="nav-link scrollto {{ Request::is('solucoes*') ? 'active' : '' }}" href="{{ url('/#services') }}">Soluções</a></li>
          <li><a class="nav-link scrollto {{ Request::is('parasuacasa*') ? 'active' : '' }}" href="{{ url('/parasuacasa') }}">Para sua casa<span style="
    color: red;
    font-size: 11px;
    margin-top: -12px;
">NOVO</span></a></li>
          <!-- <li><a class="nav-link scrollto" href="{{ url('/#terceirize') }}">Terceirize sua TI</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="{{ url('/#faq') }}">LGPD</a></li> -->
          <li><a class="nav-link scrollto" href="{{ url('/#contact') }}">Fale Conosco</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/login') }}">Entrar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="zoom-in">

    <div class="footer-top">
      <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
                <img src="{{ asset('themes/img/logo.png') }}" alt="" style='width:80%;'>
            </div>
            <div class="col-lg-4 col-md-6 footer-contact">

            <h3>Save Docs - Soluções Tecnológicas<span></span></h3>
              <p>
              Rua Josué Montello, No. 1, Bairro - Renascença II, São Luís - MA, 65075-120 <br>Universidade Ceuma<br>
              <br>
              <!-- <strong>Telefone:</strong><br> -->
              <strong>Whatsapp:</strong> <img src="{{ asset('themes/img/whatsapp-icon.png') }}" alt="" style='width:20px;'> (98) 98149-4419<br>
              <strong>E-mail:</strong> contato@savedocs.com.br
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Mapa do Site</h4>
            <ul>
              
              
              <li><i class="bx bx-chevron-right"></i><a href="{{ url('/') }}">Página Inicial</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="{{ url('/about') }}">Sobre</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="{{ url('/#services') }}">Soluções</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i><a href="{{ url('/#terceirize') }}">Terceirize sua TI</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="{{ url('/#faq') }}">LGPD</a></li> -->
              <li><i class="bx bx-chevron-right"></i><a href="{{ url('/#contact') }}">Fale Conosco</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="{{ url('/login') }}">Entrar</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nossas Redes Sociais</h4>
            <div class="social-links mt-3">
              <!-- <a href="#" class="twitter" target='_other'><i class="bx bxl-twitter"></i></a> -->
              <a href="https://www.facebook.com/savedocsma" class="facebook" target='_other'><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/savedocs/" class="instagram" target='_other'><i class="bx bxl-instagram"></i></a>
              <a href="https://www.linkedin.com/company/savedocs/?viewAsMember=true" class="linkedin" target='_other'><i class="bx bxl-linkedin"></i></a>
              <!-- <a href="#" class="google-plus" target='_other'><i class="bx bxl-skype"></i></a>
               -->
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        2021 &copy; Copyright. <strong><span>SaveDocs - Soluções Tecnológicas</span></strong>. Todos os direitos reservados
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href='https://api.whatsapp.com/send?phone=5598981494419' target='_other'><img src="{{ asset('themes/img/whatsapp.png') }}" alt="" style='
    width: 90px;
    /* height: 50px; */
    position: fixed;
    bottom: 10px;
    right: 0px;
    z-index: 9999;
'></a>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Vendor JS Files -->
  <script src="{{ asset('themes/vendor/aos/aos.js') }}"></script>
  <!-- <script src="{{ asset('themes/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
  <script src="{{ asset('themes/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('themes/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('themes/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('themes/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('themes/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('themes/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('themes/js/main.js') }}"></script>
  <!-- Template Main JS File -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <script src="{{ asset('themes/js/index.js') }}"></script>

</body>

</html>
