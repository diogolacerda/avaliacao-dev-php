<div class="col-xs-6">
  <div class="form-group">
    <?php echo Form::label('title', 'Título:'); ?>

    <?php echo Form::text('title', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('subtitle', 'Subtítulo:'); ?>

    <?php echo Form::text('subtitle', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('image', 'Imagem de Capa:'); ?>

    <?php echo Form::file('image'); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('authors[]', 'Autores:'); ?>

    <?php echo e(Form::select('author[]', $authors, $authors_selected, ['multiple' => 'multiple', 'class' => 'form-control'])); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('edition', 'Edição:'); ?>

    <?php echo Form::text('edition', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('classification', 'Classificação:'); ?>

    <?php echo Form::text('classification', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::submit($submit_text, ['class'=>'btn btn-primary']); ?>

  </div>

</div>
