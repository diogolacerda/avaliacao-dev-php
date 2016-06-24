@extends('layouts.master')

@section('content')
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar Material
      </div>
      <div class="panel-body">
          <div class="row">
            {!! Form::model($material, ['method' => 'PATCH', 'route' => ['materials.update', $material->id], 'files' => true]) !!}
              @include('materials/partials/_form', ['submit_text' => 'Editar Material'])
            {!! Form::close() !!}
          </div>

      </div>

  </div>

</div>

@endsection
