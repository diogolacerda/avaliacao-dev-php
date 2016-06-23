<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">
        <?php echo e($dictionary->title); ?> <small><?php echo e($dictionary->subtitle); ?> </small>
      </h1>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <?php if($dictionary->image != ""): ?>
          <img class="img-responsive" src="/images/<?php echo e($dictionary->image); ?>" >
        <?php endif; ?>
      </div>

      <div class="form-group">
        <?php echo e($dictionary->authors->implode('name', ', ')); ?>

      </div>

      <div class="form-group">
        <?php echo e($dictionary->edition); ?>

      </div>

      <div class="form-group">
        <?php echo e($dictionary->classification); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>