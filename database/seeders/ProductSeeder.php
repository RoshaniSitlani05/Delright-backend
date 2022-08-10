<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'role' => rand(1, 2),
            'phone_number' => rand(123456789, 9876543210),
            'password' => Hash::make('password'),
        ]);

        // DB::table('products')->insert([
        //     'name' => Str::random(10),
        //     'price' =>  rand(2, 50),
        //     'discount_percentage' =>  rand(2, 50),
        //     'gst' =>  rand(2, 50),
        //     'quantity' =>  rand(2, 50),
        //     'seller_id' => 12,
        //     'category' => 1,
        // ]);
    }
}
