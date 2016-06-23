@extends('layouts.master')

@section('content')
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar Autor
      </div>
      <div class="panel-body">
          <div class="row">
            {!! Form::model($author, ['method' => 'PATCH', 'route' => ['authors.update', $author->id]]) !!}
              @include('authors/partials/_form', ['submit_text' => 'Editar Autor'])
            {!! Form::close() !!}
          </div>

      </div>

  </div>

</div>

@endsection
