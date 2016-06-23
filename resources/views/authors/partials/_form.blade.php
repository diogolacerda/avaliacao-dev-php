<div class="col-xs-6">
  <div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, array('class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('notation', 'Notação:') !!}
    {!! Form::text('notation', null, array('class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
  </div>

</div>
