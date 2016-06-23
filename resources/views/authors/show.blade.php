@extends('layouts.master')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        {{ $author->name }} - <small>{{ $author->notation }}</small>
      </h1>
    </div>
    <div class="col-xs-6">

    </div>
  </div>
</div>

@endsection
