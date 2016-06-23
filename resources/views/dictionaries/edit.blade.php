@extends('layouts.master')

@section('content')
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar Dicionário
      </div>
      <div class="panel-body">
          <div class="row">
            {!! Form::model($dictionary, ['method' => 'PATCH', 'route' => ['dictionaries.update', $dictionary->id], 'files' => true]) !!}
              @include('dictionaries/partials/_form', ['submit_text' => 'Editar Dicionário'])
            {!! Form::close() !!}
          </div>

      </div>

  </div>

</div>

@endsection
