<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;

class ProductTest extends TestCase
{
    /**
     * Тестирование пагинатора товаров.
     *
     * @return void
     */
    public function testProduct()
    {
        $limit = 1;
        $offset = 4;
        $response = $this->json('GET','api/v1/product', ['limit' => $limit, 'offset' => $offset]);
        $response->assertDontSee('404');
    }
}
