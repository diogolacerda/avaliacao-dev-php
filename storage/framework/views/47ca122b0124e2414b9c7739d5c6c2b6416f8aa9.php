<!DOCTYPE html>
<html>
  <head>
    <title>Avaliação Praxis</title>

      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">


      <?php echo $__env->yieldContent('css'); ?>


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
                <a href="<?php echo e(route('authors.index')); ?>">Autores</a>
              </li>
              <li>
                <a href="<?php echo e(route('books.index')); ?>">Livros</a>
              </li>
              <li>
                <a href="<?php echo e(route('dictionaries.index')); ?>">Dicionários</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main role="main">
      <?php if(Session::has('message')): ?>
        <div class="flash alert-info">
          <p><?php echo e(Session::get('message')); ?></p>
        </div>
      <?php endif; ?>

      <?php if($errors->any()): ?>
        <div class='flash alert-danger'>
          <?php foreach( $errors->all() as $error ): ?>
            <p><?php echo e($error); ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


    <?php echo $__env->yieldContent('scripts'); ?>

   </body>
</html>
