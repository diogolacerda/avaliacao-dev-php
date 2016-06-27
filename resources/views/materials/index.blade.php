@extends('layouts.master')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-xs-6">
      <h1 class="page-header">
        Materials
      </h1>
    </div>
    <div class="col-xs-6">
      <a href="{{ route('materials.create') }}" class="btn  btn-primary pull-right" >Novo Material</a>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">

      @if ( !$materials->count() )
          Sem materiais cadastrados
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Imagem</th>
              <th>Tipo</th>
              <th>Título</th>
              <th>Subtítulo</th>
              <th>Autores</th>
              <th>ISBN</th>
              <th>Número de Páginas</th>
              <th>Resumo</th>
              <th>Edição</th>
              <th>Classificação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $materials as $material )
              <tr>
                <td>
                  @if ($material->image != "")
                    <img class="img-responsive" src="/images/{{ $material->image }}" >
                  @endif
                </td>
                <td>{{ $material->type->name }}</td>
                <td>{{ $material->title }}</td>
                <td>{{ $material->subtitle }}</td>
                <td>{{ $material->authors->implode('name', ', ') }}</td>
                <td>{{ $material->isbn }}</td>
                <td>{{ $material->number_of_pages }}</td>
                <td>{{ $material->resume }}</td>
                <td>{{ $material->edition }}</td>
                <td>{{ $material->classification }}</td>
                <td>
                  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('materials.destroy', $material))) !!}
                      {!! link_to_route('materials.show', 'Visualizar', array($material->id), array('class' => 'btn btn-warning')) !!}
                      {!! link_to_route('materials.edit', 'Editar', array($material->id), array('class' => 'btn btn-info')) !!}
                      {!! Form::submit('Excluir', array('class' => 'btn btn-danger')) !!}

                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
</div>

@endsection
