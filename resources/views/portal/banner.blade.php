@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            
            {!! Form::model($banner, ['route' => ['banner.update', 1], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        
            <div class="card-header">Galeria 1</div>
            <div class="card-body">
                <div class="row">
                    <input type="hidden" name='id' value='1'>
                    <div class="form-group col-md-3">
                        <label for="">Arquivo</label>
                        <input type="file" name='img' class='form-control'>
                        <small><i>Tamanho padrão: 1519x330pixels</i></small>
                    </div>
                    <div class="form-group col-md-1"><br>
                        <input type="submit" class='btn btn-danger' value='Salvar'>
                    </div>
                    <div class="form-group col-md-1"><br>
                        @if(!is_null($banner[0]->img))
                            <a href="{{ asset('storage/img/'.$banner[0]->img) }}" target='other_'>Imagem</a>
                        @endif
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection