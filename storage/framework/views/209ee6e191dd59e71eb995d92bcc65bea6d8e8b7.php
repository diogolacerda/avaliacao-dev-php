<?php $__env->startSection('content'); ?>

<div class="container">

  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        Dicionários
      </h1>
    </div>
    <div class="col-xs-6">
      <a href="<?php echo e(route('dictionaries.create')); ?>" class="btn  btn-primary pull-right" >Novo Dicionário</a>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">

      <?php if( !$dictionaries->count() ): ?>
          Sem dicionários cadastrados
      <?php else: ?>
        <table class="table">
          <thead>
            <tr>
              <th>Imagem</th>
              <th>Título</th>
              <th>Subtítulo</th>
              <th>Autores</th>
              <th>Edição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $dictionaries as $dictionary ): ?>
              <tr>
                <td>
                  <?php if($dictionary->image != ""): ?>
                    <img class="img-responsive" src="/images/<?php echo e($dictionary->image); ?>" >
                  <?php endif; ?>
                </td>
                <td><?php echo e($dictionary->title); ?></td>
                <td><?php echo e($dictionary->subtitle); ?></td>
                <td><?php echo e($dictionary->authors->implode('name', ', ')); ?></td>
                <td><?php echo e($dictionary->edition); ?></td>
                <td>
                  <?php echo Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('dictionaries.destroy', $dictionary))); ?>

                      <?php echo link_to_route('dictionaries.show', 'Visualizar', array($dictionary->id), array('class' => 'btn btn-warning')); ?>

                      <?php echo link_to_route('dictionaries.edit', 'Editar', array($dictionary->id), array('class' => 'btn btn-info')); ?>

                      <?php echo Form::submit('Excluir', array('class' => 'btn btn-danger')); ?>


                  <?php echo Form::close(); ?>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>