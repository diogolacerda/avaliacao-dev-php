<div class="col-xs-6">
  <div class="form-group">
    <?php echo Form::label('name', 'Nome:'); ?>

    <?php echo Form::text('name', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('notation', 'Notação:'); ?>

    <?php echo Form::text('notation', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::submit($submit_text, ['class'=>'btn btn-primary']); ?>

  </div>

</div>
