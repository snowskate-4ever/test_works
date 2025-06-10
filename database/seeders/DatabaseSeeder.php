<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use App\Models\Type;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CategoryFactory;
use Database\Factories\PropertyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        Category::factory(15)->create();
        Product::factory(1000)->create();
        $products = Product::all();
        $types = Type::where('slug', 'products')->get();
        foreach ($products as $product) {
            foreach ($types as $type) {
                if (!Property::where([
                    'type_id' => $type->id,
                    'product_id'=> $product->id,
                    'slug' => 'products'
                ])->exists()) {
                    switch ($type->name) {
                        case 'Вес':
                            $unit = 'кг';
                            break;
                        case 'Ширина' || 'Высота' || 'Длина':
                            $unit = 'см';
                            break;

                        default:
                            $unit = '';
                            break;
                    }
                    $properties = [
                        'product_id' => $product->id,
                        'type_id' => $type->id,
                        'unit' => $unit,
                        'slug' => 'products',
                        'value' => random_int(1, 100),
                    ];
                    Property::create($properties);
                }
            }
        }
    }
}
