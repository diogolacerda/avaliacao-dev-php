<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorCreateTest extends TestCase
{

    public function testCreateAuthorWithSuccess() {
      $author = factory(App\Author::class)->make();

      $this->notSeeInDatabase('authors', ['name' => $author->name, 'notation' => $author->notation]);
      $this->visit('/authors/create')
           ->type($author->name, 'name')
           ->type($author->notation, 'notation')
           ->press('Criar Autor');
      $this->see('Autor criado');
      $this->seeInDatabase('authors', ['name' => $author->name, 'notation' => $author->notation]);
    }

    public function testCreateAuthorInvalidWithoutName() {

      $this->visit('/authors/create')
           ->press('Criar Autor');
      $this->see('Nome é obrigatório');
    }
}

