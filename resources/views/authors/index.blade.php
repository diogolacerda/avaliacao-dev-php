@extends('layouts.master')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        Autores
      </h1>
    </div>
    <div class="col-xs-6">
      <a href="{{ route('authors.create') }}" class="btn  btn-primary pull-right" >Novo Autor</a>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">

      @if ( !$authors->count() )
          Sem autores cadastrados
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Notação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $authors as $author )
              <tr>
                <td>{{ $author->name }}</td>
                <td>{{ $author->notation }}</td>
                <td>
                  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('authors.destroy', $author))) !!}
                      {!! link_to_route('authors.show', 'Visualizar', array($author->id), array('class' => 'btn btn-warning')) !!}
                      {!! link_to_route('authors.edit', 'Editar', array($author->id), array('class' => 'btn btn-info')) !!}
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
