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

        foreach(range(1,15) as $i)
        {
            Product::create([
                'name' => $faker->word($min = 5),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 3000),
                'featured' => $faker->boolean($chanceOfGettingTrue = 50),
                'recommend' => $faker->boolean($chanceOfGettingTrue = 50)
            ]);
        }
    }
}