@extends('layout.main')

@section('title', 'Poems')

@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">   
            <div class="card">
                <div class="card-header">
                    <h3>Cadastro de Poemas</h3>
                </div>

                 @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Aviso!</strong>
                    {{ Session::get('message') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="row">
                    <div class="offset-sm-3 col-sm-6">
                        <div class="alert alert-danger alert-dismissible " role="alert">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> -->
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <div class="card-body">
                    <form method="post" action="{{ action('PoemController@store') }}" id="poem_form">
                        @method('post')
                        @CSRF
                        <div class="form-group">
                            <label for="titulo" style="margin-top: 15px;">Título</label>
                            <input type="text" name="titulo" class="form-control" id="titulo">
                        </div>
                        <div class="form-group" id="row">
                            <label for="estrofe">Conteúdo</label>
                            <textarea class="form-control" name="conteudo" id="trumbowyg-editor" rows="5"></textarea>
                        </div>
                            <button type="submit" class="btn btn-success float-left" style="margin-bottom: 10px;">Salvar</button>
                    </form>
                </div>
            </div>
            <a href="{{ action('PoemController@index') }}"><button class="btn btn-primary float-right mr-2 mt-2">Cancelar</button></a>
            <a href="{{ url()->previous() }}"><button class="btn btn-primary float-right m-2">Voltar</button></a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('#trumbowyg-editor').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['insertImage'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ],
        autogrow: true
    });
</script>
@endsection