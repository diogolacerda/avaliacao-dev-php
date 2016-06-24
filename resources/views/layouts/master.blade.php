<!DOCTYPE html>
<html>
  <head>
    <title>Avaliação Praxis</title>

      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

      @yield('css')

  </head>
  <body style="padding-top: 60px;">

    <header>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand">Avaliação Praxis</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav">
              <li>
                <a href="{{ route('authors.index') }}">Autores</a>
              </li>
              <li>
                <a href="{{ route('materials.index') }}">Materiais</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main role="main">
      @if (Session::has('message'))
        <div class="flash alert-info">
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif

      @if ($errors->any())
        <div class='flash alert-danger'>
          @foreach ( $errors->all() as $error )
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      @yield('content')
    </main>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


    @yield('scripts')
    <script type="text/javascript" src="{!! asset('js/material_form.js') !!}"></script>

   </body>
</html>
