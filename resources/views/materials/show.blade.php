@extends('layouts.master')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">
        {{ $material->title }} <small>{{ $material->subtitle }} - {{ $material->type->name }} </small>
      </h1>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        @if ($material->image != "")
          <img class="img-responsive" src="/images/{{ $material->image }}" >
        @endif
      </div>

      <div class="form-group">
        {{ $material->authors->implode('name', ', ') }}
      </div>
      @if ( $material->type_id == 1 )
        <div class="form-group">
          {{ $material->isbn }}
        </div>

        <div class="form-group">
          {{ $material->number_of_pages }} páginas
        </div>

        <div class="form-group">
          {{ $material->resume }}
        </div>
      @else
        <div class="form-group">
          {{ $material->edition }}
        </div>

        <div class="form-group">
          {{ $material->classification }}
        </div>
      @endif

    </div>
  </div>
</div>

@endsection
