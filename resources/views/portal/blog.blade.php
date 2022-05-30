@extends('portal.app')

@section('content')

<section>
    <div class="container">
        @if($estilo == 1)
            <div class="row blog-pc">
                <div class="col-md-12">
                    <h2>{{ $blog->title }}</h2>
                    <div>{!! $blog->subtitle !!}</div>
                    <div>{{ 'Publicado em '.date('d.m.Y',strtotime($blog->created_at)) }}</div>
                </div>
            </div>
            <div class="row blog-pc">
                <div class="col-md-12">
                    @if($blog->img)
                        <img src="{{ asset('storage/img/'.$blog->img) }}" style='float:left; width:100%;'>
                    @else
                        <img src="{{ asset('src_portal/semfoto.jpg') }}" style='float:left; width:100%;'>
                    @endif
                </div>
                <div class="col-md-12">
                    <a href="https://www.facebook.com/sharer.php?u=http://clinicabelaexpress.com.br/portal/{{ $blog->url }}/post" target='other_'><img src="{{ asset('images/icon-face.jpg') }}" alt="" style='width:40px; float:left; padding:5px;'></a>
                    <a href="https://twitter.com/intent/tweet?text={{ $blog->url }}&url=http://clinicabelaexpress.com.br/portal/{{ $blog->id }}/post" target='other_'><img src="{{ asset('images/icon-twi.jpg') }}" alt="" style='width:40px; float:left; padding:5px;'></a>
                    <a href="https://api.whatsapp.com/send?text={{ $blog->url }}+http://clinicabelaexpress.com.br/portal/{{ $blog->id }}/post" target='other_'><img src="{{ asset('images/icon-whats.jpg') }}" alt="" style='width:40px; float:left; padding:5px;'></a>
                </div>
                <div class="col-md-12">            
                    {!! $blog->description !!}
                </div>
            </div>

        @else
            {{-- <div class="card-deck"> --}}

                @foreach($blog as $blog)

                    <div class="card" style="width: 18rem; margin:1%; float:left;">
                        <a href="{{ url('post/'.$blog->url) }}">
                            @if($blog->img)
                                <img src="{{ asset('storage/img/'.$blog->img) }}"class="card-img-top" style='height:160px;' src="..." alt="Card image cap">
                            @else
                                <img src="{{ asset('src_portal/semfoto.jpg') }}"class="card-img-top" style='height:160px;' src="..." alt="Card image cap">
                            @endif
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{!! $blog->title !!}</h5>
                            <h6 class="card-title">{{ (is_null($blog->subtitle))?'-':strip_tags($blog->subtitle) }}</h6>
                        {{-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                        </div>
                    </div>

                @endforeach
                <div class="clearfix"></div>
            {{-- </div> --}}
        @endif
    </div>
</section>

@endsection
