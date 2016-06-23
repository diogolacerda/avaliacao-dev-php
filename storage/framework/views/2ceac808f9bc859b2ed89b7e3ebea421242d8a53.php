<?php $__env->startSection('content'); ?>
<div class="col-xs-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar Autor
      </div>
      <div class="panel-body">
          <div class="row">
            <?php echo Form::model($author, ['method' => 'PATCH', 'route' => ['authors.update', $author->id]]); ?>

              <?php echo $__env->make('authors/partials/_form', ['submit_text' => 'Editar Autor'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>

          </div>

      </div>

  </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>