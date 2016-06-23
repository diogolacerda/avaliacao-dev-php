@extends('layouts.master')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">
        {{ $book->title }} <small>{{ $book->subtitle }} - {{ $book->isbn }} </small>
      </h1>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        @if ($book->image != "")
          <img class="img-responsive" src="/images/{{ $book->image }}" >
        @endif
      </div>

      <div class="form-group">
        {{ $book->authors->implode('name', ', ') }}
      </div>

      <div class="form-group">
        {{ $book->number_of_pages }} páginas
      </div>

      <div class="form-group">
        {{ $book->resume }}
      </div>
    </div>
  </div>
</div>

@endsection
