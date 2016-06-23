<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookCreateTest extends TestCase
{
  public function testCreateBookWithSuccess() {
    $book = factory(App\Book::class)->make();
    $author = factory(App\Author::class)->create();

    $this->notSeeInDatabase('books', ['name' => $book->title, 'subtitle' => $book->subtitle]);

    $this->visit('/books/create');
    $input = [
      'title' => $book->title,
      'subtitle' => $book->subtitle,
      'author' => [$author->id],
      'isbn' => $book->isbn,
      'number_of_pages' => $book->number_of_pages,
      'resume' => $book->resume
    ];
    $this->submitForm('Criar Livro', $input);

    $this->see('Livro criado');

    $this->seeInDatabase(
      'books',
      [
        'title' => $book->title,
        'subtitle' => $book->subtitle,
        'isbn' => $book->isbn,
        'number_of_pages' => $book->number_of_pages,
        'resume' => $book->resume
      ]);

    $this->seeInDatabase(
      'author_book',
      [
        'author_id' => $author->id, 'book_id' => App\Book::first()->id
      ]);
  }

  public function testCreateBookInvalidWithoutRequiredFields() {
    $this->visit('/books/create');

    $this->submitForm('Criar Livro', []);

    $this->see('Título é obrigatório');
    $this->see('Isbn é obrigatório');
    $this->see('Número de Páginas é obrigatório');
    $this->see('Autor é obrigatório');
  }

}
