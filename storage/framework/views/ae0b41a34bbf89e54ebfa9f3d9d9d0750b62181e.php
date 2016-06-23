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
    <?php echo Form::label('isbn', 'ISBN:'); ?>

    <?php echo Form::text('isbn', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('number_of_pages', 'Número de Páginas:'); ?>

    <?php echo Form::text('number_of_pages', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::label('resume', 'Resumo:'); ?>

    <?php echo Form::text('resume', null, array('class' => 'form-control')); ?>

  </div>

  <div class="form-group">
    <?php echo Form::submit($submit_text, ['class'=>'btn btn-primary']); ?>

  </div>

</div>
