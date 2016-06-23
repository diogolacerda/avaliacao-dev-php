@extends('layouts.master')

@section('content')
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Novo Livro
      </div>
      <div class="panel-body">
          <div class="row">
            {!! Form::model(new App\Book, ['route' => ['books.store'], 'files' => true]) !!}
              @include('books/partials/_form', ['submit_text' => 'Criar Livro'])
            {!! Form::close() !!}
          </div>

      </div>

  </div>

</div>

@endsection
