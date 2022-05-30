@extends('portal.app')

@section('content')

<section class="container">
    <h2 class='text-center pt-4 pb-4'>{{ $servicos->name }}</h2>
    <p class='text-center' style='line-height: 1.8;'>
      {!! $servicos->description !!}<br>
      <!-- <a href="" class="btn btn-success" style='background-image: linear-gradient(182deg,#27c145 0,#3cc127 50%,#379f26 60%,#4aaa3b 100%);padding: 6px 26px;margin-top: 28px;'>Solicite uma cotação <i class="bi bi-arrow-right-short"></i></a> -->
    </p>
    
</section>

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <h3>Ainda ficou com dúvida?<span></span></h3>
          {{-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> --}}
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <ul class="faq-list">

              @foreach($faqs as $key => $faq)
                <li>
                  <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{ $key }}">{{ $faq->title }}<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq{{ $key }}" class="collapse" data-bs-parent=".faq-list">
                    <p>
                    {{ $faq->description }}
                    </p>
                  </div>
                </li>
              @endforeach

            

            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

@endsection
