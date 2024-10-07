<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $products = Product::factory()->count(10)->create();
        $categories = Category::factory()->count(5)->create();

        foreach ($products as $product) {
            $product->categories()->attach($categories->random(rand(1, 3)));

            $reviewCount = rand(3, 5);

            for ($i = 0; $i < $reviewCount; $i++) {
                $product->reviews()->save(new Review([
                    'rating' => rand(2, 5),
                ]));
            }
        }
    }
}
