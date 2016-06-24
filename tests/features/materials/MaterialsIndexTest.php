<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaterialsIndexTest extends TestCase
{
  public function testListingMaterials() {
    $material = factory(App\Material::class)->create();
    $author1 = factory(App\Author::class)->create();
    $author2 = factory(App\Author::class)->create();
    $material->authors()->sync([$author1->id, $author2->id]);

    $this->visit('/materials')
      ->see($material->type->name)
      ->see($material->title)
      ->see($material->subtitle)
      ->see($material->authors->implode('name', ', '));
  }

  public function testRemovingMaterial() {
    $material = factory(App\Material::class)->create();
    $this->visit('/materials')
      ->press('Excluir');
    $this->see('Material removido');
  }
}
