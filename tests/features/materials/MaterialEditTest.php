<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaterialEditTest extends TestCase
{

    public function testEditBookWithSuccess() {
      $material = factory(App\Material::class)->create();
      $author = factory(App\Author::class)->create();
      $material->authors()->sync([$author->id]);
      $edit_material = factory(App\Material::class)->make();

      $this->visit('/materials/'.$material->id.'/edit')
           ->type($edit_material->title, 'title')
           ->type($edit_material->subtitle, 'subtitle')
           ->type($edit_material->isbn, 'isbn')
           ->type($edit_material->number_of_pages, 'number_of_pages')
           ->type($edit_material->resume, 'resume')
           ->press('Editar Material');
      $this->see('Material atualizado');

      $this->notSeeInDatabase('materials', [
        'title' => $material->title,
        'subtitle' => $material->subtitle,
        'isbn' => $material->isbn,
        'number_of_pages' => $material->number_of_pages,
        'resume' => $material->resume
      ]);

      $this->seeInDatabase('materials', [
        'title' => $edit_material->title,
        'subtitle' => $edit_material->subtitle,
        'isbn' => $edit_material->isbn,
        'number_of_pages' => $edit_material->number_of_pages,
        'resume' => $edit_material->resume
      ]);
    }

    public function testEditDictionaryWithSuccess() {
      $material = factory(App\Material::class)->create();
      $author = factory(App\Author::class)->create();
      $material->authors()->sync([$author->id]);
      $edit_material = factory(App\Material::class)->make();

      $this->visit('/materials/'.$material->id.'/edit')
           ->type($edit_material->title, 'title')
           ->type($edit_material->subtitle, 'subtitle')
           ->type($edit_material->edition, 'edition')
           ->type($edit_material->classification, 'classification')
           ->press('Editar Material');
      $this->see('Material atualizado');

      $this->notSeeInDatabase('materials', [
        'title' => $material->title,
        'subtitle' => $material->subtitle,
        'edition' => $material->edition,
        'classification' => $material->classification
      ]);

      $this->seeInDatabase('materials', [
        'title' => $edit_material->title,
        'subtitle' => $edit_material->subtitle,
        'edition' => $edit_material->edition,
        'classification' => $edit_material->classification
      ]);
    }

    public function testEditBookInvalidWithoutRequiredFields() {
      $book_type = factory(App\Type::class)->create(['id' => 1, 'name' => 'Livro']);
      $material = factory(App\Material::class)->create();

      $this->visit('/materials/'.$material->id.'/edit')
        ->select($book_type->id, 'type_id')
        ->type('', 'title')
        ->type('', 'isbn')
        ->type('', 'number_of_pages')
        ->press('Editar Material');

      $this->see('Título é obrigatório');
      $this->see('Isbn é obrigatório');
      $this->see('Número de Páginas é obrigatório');
      $this->see('Autor é obrigatório');
    }

    public function testEditDictionaryInvalidWithoutRequiredFields() {
      $dictionary_type = factory(App\Type::class)->create(['id' => 2, 'name' => 'Dicionário']);
      $material = factory(App\Material::class)->create();

      $this->visit('/materials/'.$material->id.'/edit')
        ->select($dictionary_type->id, 'type_id')
        ->type('', 'title')
        ->type('', 'edition')
        ->press('Editar Material');

      $this->see('Título é obrigatório');
      $this->see('Edição é obrigatório');
      $this->see('Autor é obrigatório');
    }
}

