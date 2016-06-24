@extends('layouts.master')

@section('content')
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Novo Material
      </div>
      <div class="panel-body">
          <div class="row">
            {!! Form::model(new App\Material, ['route' => ['materials.store'], 'files' => true]) !!}
              @include('materials/partials/_form', ['submit_text' => 'Criar Material'])
            {!! Form::close() !!}
          </div>

      </div>

  </div>

</div>

@endsection
