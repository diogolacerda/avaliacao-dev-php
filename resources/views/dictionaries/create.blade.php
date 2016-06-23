@extends('layouts.master')

@section('content')
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Novo Dicionário
      </div>
      <div class="panel-body">
          <div class="row">
            {!! Form::model(new App\Dictionary, ['route' => ['dictionaries.store'], 'files' => true]) !!}
              @include('dictionaries/partials/_form', ['submit_text' => 'Criar Dicionário'])
            {!! Form::close() !!}
          </div>

      </div>

  </div>

</div>

@endsection
