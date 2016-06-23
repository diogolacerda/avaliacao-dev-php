@extends('layouts.master')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">
        {{ $dictionary->title }} <small>{{ $dictionary->subtitle }} </small>
      </h1>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        @if ($dictionary->image != "")
          <img class="img-responsive" src="/images/{{ $dictionary->image }}" >
        @endif
      </div>

      <div class="form-group">
        {{ $dictionary->authors->implode('name', ', ') }}
      </div>

      <div class="form-group">
        {{ $dictionary->edition }}
      </div>

      <div class="form-group">
        {{ $dictionary->classification }}
      </div>
    </div>
  </div>
</div>

@endsection
