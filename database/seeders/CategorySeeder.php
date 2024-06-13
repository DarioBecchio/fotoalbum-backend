<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Ritratti' , 'Paesaggi' ,'Natura', 'Architettura', 'Street Photography', 'Eventi','Sport', 'Moda'];
    
        foreach ($categories as $category){
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
