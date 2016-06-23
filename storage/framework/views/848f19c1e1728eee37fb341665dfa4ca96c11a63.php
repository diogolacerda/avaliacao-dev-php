<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">
        <?php echo e($book->title); ?> <small><?php echo e($book->subtitle); ?> - <?php echo e($book->isbn); ?> </small>
      </h1>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <?php if($book->image != ""): ?>
          <img class="img-responsive" src="/images/<?php echo e($book->image); ?>" >
        <?php endif; ?>
      </div>

      <div class="form-group">
        <?php echo e($book->authors->implode('name', ', ')); ?>

      </div>

      <div class="form-group">
        <?php echo e($book->number_of_pages); ?> páginas
      </div>

      <div class="form-group">
        <?php echo e($book->resume); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>