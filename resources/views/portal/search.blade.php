@extends('portal.app')

@section('content')

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!-- <h2>F.A.Q</h2> -->
          <h3>
              @if(count($perguntas) == 0)
              Não encontramos nenhum resultado!
              @else
              Encontramos {{ count($perguntas) }} resultado(s)!
              @endif
          </h3>
          {{-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> --}}
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <ul class="faq-list">

              @foreach($perguntas as $key => $pergunta)
                <li>
                  <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{ $key }}">{{ $pergunta->title }}<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq{{ $key }}" class="collapse" data-bs-parent=".faq-list">
                    <p>
                    {{ $pergunta->description }}
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
