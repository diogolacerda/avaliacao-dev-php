<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        <?php echo e($author->name); ?>

      </h1>
    </div>
    <div class="col-xs-6">

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>