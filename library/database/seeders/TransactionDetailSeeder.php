<?php

namespace Database\Seeders;

use Faker\Factory as faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionDetail;
use App\Models\Transaction;


class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();

        for ($i=0; $i < 20; $i++){
            $transaction_detail = new TransactionDetail;

            $transaction_detail->transaction_id = rand(1,20);
            $transaction_detail->book_id = rand(2,21);
            $transaction_detail->qty = rand(1,13);

            $transaction_detail->save();
        }
    }
}
