<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreProduct()
    {
        $data = [
            "name" => "a",
            "price" => 122,
            "images" => "http://example.com/image.jpg",
            "description" => "a"
        ];

        $response = $this->postJson('/api/product', $data);

        $response->assertStatus(200);

        // Verify the product was created with correct data
        $this->assertDatabaseHas('products', [
            'name' => 'a',
            'price' => 122,
            'description' => 'a'
        ]);

        // Verify that the images field contains the uploads path
        $product = Product::first();
        $this->assertStringContainsString('uploads/', $product->images);
    }
}
