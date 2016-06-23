<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookEditTest extends TestCase
{

    public function testEditBookWithSuccess() {
      $book = factory(App\Book::class)->create();
      $author = factory(App\Author::class)->create();
      $book->authors()->sync([$author->id]);
      $edit_book = factory(App\Book::class)->make();

      $this->visit('/books/'.$book->id.'/edit')
           ->type($edit_book->title, 'title')
           ->type($edit_book->subtitle, 'subtitle')
           ->type($edit_book->isbn, 'isbn')
           ->type($edit_book->number_of_pages, 'number_of_pages')
           ->type($edit_book->resume, 'resume')
           ->press('Editar Livro');
      $this->see('Livro atualizado');

      $this->notSeeInDatabase('books', [
        'title' => $book->title,
        'subtitle' => $book->subtitle,
        'isbn' => $book->isbn,
        'number_of_pages' => $book->number_of_pages,
        'resume' => $book->resume
      ]);

      $this->seeInDatabase('books', [
        'title' => $edit_book->title,
        'subtitle' => $edit_book->subtitle,
        'isbn' => $edit_book->isbn,
        'number_of_pages' => $edit_book->number_of_pages,
        'resume' => $edit_book->resume
      ]);
    }

    public function testEditBookInvalidWithoutRequiredFields() {
      $book = factory(App\Book::class)->create();

      $this->visit('/books/'.$book->id.'/edit')
        ->type('', 'title')
        ->type('', 'isbn')
        ->type('', 'number_of_pages')
        ->press('Editar Livro');

      $this->see('Título é obrigatório');
      $this->see('Isbn é obrigatório');
      $this->see('Número de Páginas é obrigatório');
      $this->see('Autor é obrigatório');
    }
}

