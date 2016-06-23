<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DictionaryIndexTest extends TestCase
{
  public function testListingDictionaries() {
    $dictionary = factory(App\Dictionary::class)->create();
    $author1 = factory(App\Author::class)->create();
    $author2 = factory(App\Author::class)->create();
    $dictionary->authors()->sync([$author1->id, $author2->id]);

    $this->visit('/dictionaries')
      ->see($dictionary->title)
      ->see($dictionary->subtitle)
      ->see($dictionary->authors->implode('name', ', '))
      ->see($dictionary->edition);
  }

  public function testRemovingDictionary() {
    $dictionary = factory(App\Dictionary::class)->create();
    $this->visit('/dictionaries')
      ->press('Excluir');
    $this->see('Dicionário removido');
  }
}
