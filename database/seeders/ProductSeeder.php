<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'category' =>  'Hamburguesa',
            'name' => 'Hamburguesa clásica',
            'description' => 'Hamburguesa clásica con queso y carne de res.',
            'price' => 10
        ]);

        DB::table('products')->insert([
            'category' =>  'Hamburguesa',
            'name' => 'Hamburguesa doble',
            'description' => 'Hamburguesa clásica con queso y doble carne de res.',
            'price' => 15
        ]);
        
        DB::table('products')->insert([
            'category' =>  'Hamburguesa',
            'name' =>'Chilli burger',
            'description' => 'Hamburguesa clásica con chilli queso y doble carne de res.',
            'price' => 20
        ]);
        
    }
}
