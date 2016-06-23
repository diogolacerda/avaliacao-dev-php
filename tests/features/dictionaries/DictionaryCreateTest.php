<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DictionaryCreateTest extends TestCase
{
  public function testCreateDictionaryWithSuccess() {
    $dictionary = factory(App\Dictionary::class)->make();
    $author = factory(App\Author::class)->create();

    $this->notSeeInDatabase('dictionaries', ['name' => $dictionary->title, 'subtitle' => $dictionary->subtitle]);

    $this->visit('/dictionaries/create');
    $input = [
      'title' => $dictionary->title,
      'subtitle' => $dictionary->subtitle,
      'author' => [$author->id],
      'edition' => $dictionary->edition,
      'classification' => $dictionary->classification
    ];
    $this->submitForm('Criar Dicionário', $input);

    $this->see('Dicionário criado');

    $this->seeInDatabase(
      'dictionaries',
      [
        'title' => $dictionary->title,
        'subtitle' => $dictionary->subtitle,
        'edition' => $dictionary->edition,
        'classification' => $dictionary->classification
      ]);

    $this->seeInDatabase(
      'author_dictionary',
      [
        'author_id' => $author->id, 'dictionary_id' => App\Dictionary::first()->id
      ]);
  }

  public function testCreateDictionaryInvalidWithoutRequiredFields() {
    $this->visit('/dictionaries/create');

    $this->submitForm('Criar Dicionário', []);

    $this->see('Título é obrigatório');
    $this->see('Edição é obrigatório');
    $this->see('Autor é obrigatório');
  }

}
