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
                    <h3> Administração de Poemas</h3>
                </div>
            </div>
            <div class="create-btn">
                <a href="{{ action('PoemController@create') }}"><button type="button" class="btn btn-success">Criar</button></a>
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

            <table class="table table-bordered table-striped table-hover">
                @forelse($poems as $key => $dados)
                <tr>
                    <th>{{ Str::limit($dados->titulo, 35) ?? 'Não Encontrado' }}</th>
                    <td>{!! Str::limit($dados->conteudo, 35) ?? 'Não Encontrado' !!}</td>
                    <td>
                        <a href="{{ action('PoemController@edit', $dados->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="{{ action('PoemController@show', $dados->id) }}" class="btn btn-sm btn-primary">Visualizar</a>
                        <form class="float-right" style="display: inline" action="{{ action('PoemController@destroy', $dados->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <input class="btn btn-sm btn-danger float-right" name="deletar" type="submit" value="Delete" onclick="return confirm('Tem certeza que deseja deletar este poema?')">
                        </form>
                    </td>
                </tr>
                @empty
                @endforelse
            </table>


            <!-- <div class="card flex-box" style="flex-wrap: wrap;">
                @forelse($poems as $key => $dados)
                <div class="card-body" style="width: 100%;">
                    <div class="card  flex-box" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dados->titulo ?? 'Não Encontrado' }}</h5>
                            <p class="card-text">{!! Str::limit($dados->conteudo, 50) !!}</p>
                            <a href="{{ action('PoemController@edit', $dados->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="{{ action('PoemController@show', $dados->id) }}" class="btn btn-sm btn-primary">Visualizar</a>
                            <form class="float-right" style="display: inline" action="{{ action('PoemController@destroy', $dados->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <input class="btn btn-sm btn-danger float-right" name="deletar" type="submit" value="Delete" onclick="return confirm('Tem certeza que deseja deletar este poema?')">
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div> -->
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection