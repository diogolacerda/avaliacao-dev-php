<?php $__env->startSection('content'); ?>

<div class="container">

  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        Autores
      </h1>
    </div>
    <div class="col-xs-6">
      <a href="<?php echo e(route('authors.create')); ?>" class="btn  btn-primary pull-right" >Novo Autor</a>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">

      <?php if( !$authors->count() ): ?>
          Sem autores cadastrados
      <?php else: ?>
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Notação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $authors as $author ): ?>
              <tr>
                <td><?php echo e($author->name); ?></td>
                <td><?php echo e($author->notation); ?></td>
                <td>
                  <?php echo Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('authors.destroy', $author))); ?>

                      <?php echo link_to_route('authors.show', 'Visualizar', array($author->id), array('class' => 'btn btn-warning')); ?>

                      <?php echo link_to_route('authors.edit', 'Editar', array($author->id), array('class' => 'btn btn-info')); ?>

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