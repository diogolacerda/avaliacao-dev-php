<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaterialCreateTest extends TestCase
{
  public function testCreateBookWithSuccess() {

    $material = factory(App\Material::class)->make();
    $author = factory(App\Author::class)->create();
    $book_type = 1;

    $this->notSeeInDatabase('materials', ['title' => $material->title, 'subtitle' => $material->subtitle, 'type_id' => $book_type]);

    $this->visit('materials/create');
    $input = [
      'type_id' => $book_type,
      'title' => $material->title,
      'subtitle' => $material->subtitle,
      'author' => [$author->id],
      'isbn' => $material->isbn,
      'number_of_pages' => $material->number_of_pages,
      'resume' => $material->resume
    ];
    $this->submitForm('Criar Material', $input);

    $this->see('Material criado');

    $this->seeInDatabase(
      'materials',
      [
        'type_id' => $book_type,
        'title' => $material->title,
        'subtitle' => $material->subtitle,
        'isbn' => $material->isbn,
        'number_of_pages' => $material->number_of_pages,
        'resume' => $material->resume
      ]);

    $this->seeInDatabase(
      'author_material',
      [
        'author_id' => $author->id, 'material_id' => App\Material::first()->id
      ]);
  }

  public function testCreateAnyMaterialInvalidWithoutRequiredFields() {
    $this->visit('materials/create');

    $this->submitForm('Criar Material', []);

    $this->see('Tipo é obrigatório');
    $this->see('Título é obrigatório');
    $this->see('Autor é obrigatório');
  }

  public function testCreateBookInvalidWithoutRequiredFields() {
    $book_type = factory(App\Type::class)->create(['id' => 1, 'name' => 'Livro']);
    $this->visit('materials/create');

    $this->select($book_type->name, 'type_id');
    $this->submitForm('Criar Material', []);


    $this->see('Título é obrigatório');
    $this->see('Autor é obrigatório');
    $this->see('isbn é obrigatório');
    $this->see('Número de Páginas é obrigatório');
    $this->dontSee('Edição é obrigatório');
  }

  public function testCreateDictionaryWithSuccess() {

    $material = factory(App\Material::class)->make();
    $author = factory(App\Author::class)->create();
    $book_type = factory(App\Type::class)->create(['name' => 'Livro']);
    $dictionary_type = 2;

    $this->notSeeInDatabase('materials', ['title' => $material->title, 'subtitle' => $material->subtitle, 'type_id' => $dictionary_type]);

    $this->visit('materials/create');
    $input = [
      'type_id' => $dictionary_type,
      'title' => $material->title,
      'subtitle' => $material->subtitle,
      'author' => [$author->id],
      'edition' => $material->edition,
      'classification' => $material->classification
    ];
    $this->submitForm('Criar Material', $input);

    $this->see('Material criado');

    $this->seeInDatabase(
      'materials',
      [
        'type_id' => $dictionary_type,
        'title' => $material->title,
        'subtitle' => $material->subtitle,
        'edition' => $material->edition,
        'classification' => $material->classification
      ]);

    $this->seeInDatabase(
      'author_material',
      [
        'author_id' => $author->id, 'material_id' => App\Material::first()->id
      ]);
  }

  public function testCreateDictionaryInvalidWithoutRequiredFields() {
    $dictionary_type = factory(App\Type::class)->create(['id' => 2, 'name' => 'Dicionário']);
    $this->visit('materials/create');

    $this->select($dictionary_type->name, 'type_id');
    $this->submitForm('Criar Material', []);


    $this->see('Título é obrigatório');
    $this->see('Autor é obrigatório');
    $this->see('Edição é obrigatório');
    $this->dontSee('isbn é obrigatório');
    $this->dontSee('Número de Páginas é obrigatório');

  }


}
