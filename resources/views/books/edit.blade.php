@extends('layouts.master')

@section('content')
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar Livro
      </div>
      <div class="panel-body">
          <div class="row">
            {!! Form::model($book, ['method' => 'PATCH', 'route' => ['books.update', $book->id], 'files' => true]) !!}
              @include('books/partials/_form', ['submit_text' => 'Editar Livro'])
            {!! Form::close() !!}
          </div>

      </div>

  </div>

</div>

@endsection
