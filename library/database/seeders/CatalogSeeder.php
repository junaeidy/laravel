<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();

        for ($i=0; $i < 4 ; $i++){
            $catalog = new Catalog;

            $catalog->name = 'Belajar Bahasa'.$faker->text(10);

            $catalog->save();
        }
    }
}
