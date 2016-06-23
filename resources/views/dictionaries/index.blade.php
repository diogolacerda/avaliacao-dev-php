@extends('layouts.master')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        Dicionários
      </h1>
    </div>
    <div class="col-xs-6">
      <a href="{{ route('dictionaries.create') }}" class="btn  btn-primary pull-right" >Novo Dicionário</a>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">

      @if ( !$dictionaries->count() )
          Sem dicionários cadastrados
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Imagem</th>
              <th>Título</th>
              <th>Subtítulo</th>
              <th>Autores</th>
              <th>Edição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $dictionaries as $dictionary )
              <tr>
                <td>
                  @if ($dictionary->image != "")
                    <img class="img-responsive" src="/images/{{ $dictionary->image }}" >
                  @endif
                </td>
                <td>{{ $dictionary->title }}</td>
                <td>{{ $dictionary->subtitle }}</td>
                <td>{{ $dictionary->authors->implode('name', ', ') }}</td>
                <td>{{ $dictionary->edition }}</td>
                <td>
                  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('dictionaries.destroy', $dictionary))) !!}
                      {!! link_to_route('dictionaries.show', 'Visualizar', array($dictionary->id), array('class' => 'btn btn-warning')) !!}
                      {!! link_to_route('dictionaries.edit', 'Editar', array($dictionary->id), array('class' => 'btn btn-info')) !!}
                      {!! Form::submit('Excluir', array('class' => 'btn btn-danger')) !!}

                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
</div>

@endsection
