<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder{

    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach(range(1,100) as $i)
        {
            Product::create([
                'name' => $faker->word(5),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2,5,99),
                'featured' => $faker->boolean(42),
                'recommend' => $faker->boolean(27),
                'category_id' => $faker->numberBetween(1,15)
            ]);
        }
    }
}