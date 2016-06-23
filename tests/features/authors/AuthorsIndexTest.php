<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorsIndexTest extends TestCase
{

    public function testListingAuthors() {
      $author = factory(App\Author::class)->create();

      $this->visit('/authors')
           ->see($author->name)
           ->see($author->notation);
    }

    public function testRemovingAuthor() {
      $author = factory(App\Author::class)->create();

      $this->visit('/authors')
        ->press('Excluir');
      $this->see('Autor Removido');
    }
}

