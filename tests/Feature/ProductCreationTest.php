<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductCreationTest extends TestCase
{
    use RefreshDatabase;

public function test_can_create_a_product_via_web_interface()
{
    Storage::fake('public');

    $response = $this->post('/products', [
        'name' => 'Test Product',
        'description' => 'Test Description',
        'price' => 99.99,
        // 'image' => UploadedFile::fake()->image('product.jpg')
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/products/create');
    $response->assertSessionHas('success', 'Product created successfully.');

    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
        'description' => 'Test Description',
        'price' => 99.99,
    ]);
}




}
