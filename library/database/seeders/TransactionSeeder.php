<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();

        for ($i=0; $i < 20; $i++){
            $transaction = new Transaction;
            $transaction->member_id = rand(1,20);
            $transaction->date_start = $faker->dateTimeBetween('-1 year', 'now');
            $transaction->date_end = $faker->dateTimeBetween('-1 month', 'now');


            $transaction->save();
        }
        
    }
}
