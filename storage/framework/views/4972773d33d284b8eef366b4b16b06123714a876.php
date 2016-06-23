<?php $__env->startSection('content'); ?>

<div class="container">

  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        Livros
      </h1>
    </div>
    <div class="col-xs-6">
      <a href="<?php echo e(route('books.create')); ?>" class="btn  btn-primary pull-right" >Novo Livro</a>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">

      <?php if( !$books->count() ): ?>
          Sem livros cadastrados
      <?php else: ?>
        <table class="table">
          <thead>
            <tr>
              <th>Imagem</th>
              <th>Título</th>
              <th>Subtítulo</th>
              <th>Autores</th>
              <th>ISBN</th>
              <th>Número de Páginas</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $books as $book ): ?>
              <tr>
                <td>
                  <?php if($book->image != ""): ?>
                    <img class="img-responsive" src="/images/<?php echo e($book->image); ?>" >
                  <?php endif; ?>
                </td>
                <td><?php echo e($book->title); ?></td>
                <td><?php echo e($book->subtitle); ?></td>
                <td><?php echo e($book->authors->implode('name', ', ')); ?></td>
                <td><?php echo e($book->isbn); ?></td>
                <td><?php echo e($book->number_of_pages); ?></td>
                <td>
                  <?php echo Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('books.destroy', $book))); ?>

                      <?php echo link_to_route('books.show', 'Visualizar', array($book->id), array('class' => 'btn btn-warning')); ?>

                      <?php echo link_to_route('books.edit', 'Editar', array($book->id), array('class' => 'btn btn-info')); ?>

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