<?php

use Illuminate\Database\Seeder;

class AccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $account_types = ['Savings', 'Current', 'Family'];
        DB::table('account_types')->insert(
            [
                'title' => 'Savings',
                'minimum_balance' => 1000.00,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        );

        DB::table('account_types')->insert(
            [
                'title' => 'Current',
                'minimum_balance' => 5000.00,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        );

        DB::table('account_types')->insert(
            [
                'title' => 'Family',
                'minimum_balance' => 10000.00,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        );



    }
}
