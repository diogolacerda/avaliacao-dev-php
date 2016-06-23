@extends('layouts.master')

@section('content')
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Novo Autor
      </div>
      <div class="panel-body">
          <div class="row">
            {!! Form::model(new App\Author, ['route' => ['authors.store']]) !!}
              @include('authors/partials/_form', ['submit_text' => 'Criar Autor'])
            {!! Form::close() !!}
          </div>

      </div>

  </div>

</div>

@endsection
