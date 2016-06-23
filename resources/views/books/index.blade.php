@extends('layouts.master')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        Livros
      </h1>
    </div>
    <div class="col-xs-6">
      <a href="{{ route('books.create') }}" class="btn  btn-primary pull-right" >Novo Livro</a>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">

      @if ( !$books->count() )
          Sem livros cadastrados
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Imagem</th>
              <th>Título</th>
              <th>Subtítulo</th>
              <th>Autores</th>
              <th>ISBN</th>
              <th>Número de Páginas</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $books as $book )
              <tr>
                <td>
                  @if ($book->image != "")
                    <img class="img-responsive" src="/images/{{ $book->image }}" >
                  @endif
                </td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->subtitle }}</td>
                <td>{{ $book->authors->implode('name', ', ') }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->number_of_pages }}</td>
                <td>
                  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('books.destroy', $book))) !!}
                      {!! link_to_route('books.show', 'Visualizar', array($book->id), array('class' => 'btn btn-warning')) !!}
                      {!! link_to_route('books.edit', 'Editar', array($book->id), array('class' => 'btn btn-info')) !!}
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
