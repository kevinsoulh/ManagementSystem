@extends('layout.main')

@section('title', 'Poems')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('trumbowyg/dist/ui/trumbowyg.min.css') }}">
<link rel="stylesheet" href="{{ asset('trumbowyg/dist/ui/icons.svg') }}">
<link rel="stylesheet" href="{{ asset('trumbowyg/dist/plugins/emoji/ui/trumbowyg.emoji.min.css') }}">
@endsection

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Detalhes do Poema #{{ $poems->id }}</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card flex-box">
                            <div class="card-body">
                                <h3 class="card-title pb-2" style="text-align: center;">{{ $poems->titulo ?? 'Não Encontrado'}}</h3>
                                <p class="card-text">{!! $poems->conteudo ?? 'Não Encontrado' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="{{ url()->previous() }}"><button class="btn btn-primary float-right m-2">Voltar</button></a>
            </div>
        </div>
    </div>
</body>
@endsection
@section('script')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="/js/script.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="{{ asset('trumbowyg/dist/trumbowyg.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('trumbowyg/dist/langs/pt_br.min.js') }}"></script>
<script src="{{ asset('trumbowyg/dist/plugins/emoji/trumbowyg.emoji.min.js') }}"></script>
@endsection