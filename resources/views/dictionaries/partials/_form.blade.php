<div class="col-xs-6">
  <div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, array('class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('subtitle', 'Subtítulo:') !!}
    {!! Form::text('subtitle', null, array('class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('image', 'Imagem de Capa:') !!}
    {!! Form::file('image') !!}
  </div>

  <div class="form-group">
    {!! Form::label('authors[]', 'Autores:') !!}
    {{ Form::select('author[]', $authors, $authors_selected, ['multiple' => 'multiple', 'class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {!! Form::label('edition', 'Edição:') !!}
    {!! Form::text('edition', null, array('class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('classification', 'Classificação:') !!}
    {!! Form::text('classification', null, array('class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
  </div>

</div>
