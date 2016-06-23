<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DictionaryEditTest extends TestCase
{

    public function testEditDictionaryWithSuccess() {
      $dictionary = factory(App\Dictionary::class)->create();
      $author = factory(App\Author::class)->create();
      $dictionary->authors()->sync([$author->id]);
      $edit_dictionary = factory(App\Dictionary::class)->make();

      $this->visit('/dictionaries/'.$dictionary->id.'/edit')
           ->type($edit_dictionary->title, 'title')
           ->type($edit_dictionary->subtitle, 'subtitle')
           ->type($edit_dictionary->edition, 'edition')
           ->type($edit_dictionary->classification, 'classification')
           ->press('Editar Dicionário');
      $this->see('Dicionário atualizado');

      $this->notSeeInDatabase('dictionaries', [
        'title' => $dictionary->title,
        'subtitle' => $dictionary->subtitle,
        'edition' => $dictionary->edition,
        'classification' => $dictionary->classification
      ]);

      $this->seeInDatabase('dictionaries', [
        'title' => $edit_dictionary->title,
        'subtitle' => $edit_dictionary->subtitle,
        'edition' => $edit_dictionary->edition,
        'classification' => $edit_dictionary->classification
      ]);
    }

    public function testEditDictionaryInvalidWithoutRequiredFields() {
      $dictionary = factory(App\Dictionary::class)->create();

      $this->visit('/dictionaries/'.$dictionary->id.'/edit')
        ->type('', 'title')
        ->type('', 'edition')
        ->type('', 'classification')
        ->press('Editar Dicionário');

      $this->see('Título é obrigatório');
      $this->see('Edição é obrigatório');
      $this->see('Autor é obrigatório');
    }
}

