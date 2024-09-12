<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_product()
    {
        $response = $this->postJson('/api/products', [
            'name' => 'Test Product',
            'description' => 'This is a test product description.',
            'price' => 22.22,
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'id', 'name', 'description', 'price', 'created_at', 'updated_at'
                 ]);

        $this->assertDatabaseHas('products', ['name' => 'Test Product']);
    }

    public function test_creating_product_requires_name_description_and_price()
    {
        $response = $this->postJson('/api/products', []);

        $response->assertStatus(422); 
        $response->assertJsonValidationErrors(['name', 'description', 'price']);
    }

}
