<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Repositories\ProductRepository;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {name} {description} {price} {image?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product';

    /**
     * Execute the console command.
     * 
     */

    public function handle()
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $price = $this->argument('price');
        $image = $this->argument('image');

        $product = Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ]);

        if ($image) {
            $imagePath = Storage::putFile('public/images', $image);
            $data['image'] = $imagePath;
            $product->save();
        }

        $this->info('Product created successfully: ' . $product->name);
    }
}
