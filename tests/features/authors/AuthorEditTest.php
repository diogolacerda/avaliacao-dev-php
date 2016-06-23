<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorEditTest extends TestCase
{

    public function testEditAuthorWithSuccess() {
      $author = factory(App\Author::class)->create();
      $edit_author = factory(App\Author::class)->make();

      $this->visit('/authors/'.$author->id.'/edit')
           ->type($edit_author->name, 'name')
           ->type($edit_author->notation, 'notation')
           ->press('Editar Autor');
      $this->see('Autor atualizado');
      $this->notSeeInDatabase('authors', ['name' => $author->name, 'notation' => $author->notation]);
      $this->seeInDatabase('authors', ['name' => $edit_author->name, 'notation' => $edit_author->notation]);
    }

    public function testEditAuthorInvalidWithoutName() {

      $author = factory(App\Author::class)->create();
      $this->visit('/authors/'.$author->id.'/edit')
                 ->type('', 'name')
                 ->press('Editar Autor');
      $this->see('Nome é obrigatório');
    }
}

