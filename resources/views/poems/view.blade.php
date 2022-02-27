@extends('layout.main')

@section('title', 'Poems')

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