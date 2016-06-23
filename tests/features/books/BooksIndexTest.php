<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BooksIndexTest extends TestCase
{
  public function testListingBooks() {
    $book = factory(App\Book::class)->create();
    $author1 = factory(App\Author::class)->create();
    $author2 = factory(App\Author::class)->create();
    $book->authors()->sync([$author1->id, $author2->id]);

    $this->visit('/books')
      ->see($book->title)
      ->see($book->subtitle)
      ->see($book->authors->implode('name', ', '))
      ->see($book->isbn)
      ->see($book->number_of_pages);
  }

  public function testRemovingBook() {
    $book = factory(App\Book::class)->create();
    $this->visit('/books')
      ->press('Excluir');
    $this->see('Livro removido');
  }
}
