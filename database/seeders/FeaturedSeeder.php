<?php

namespace Database\Seeders;

use App\Models\Featured;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $featureds = ['is_Featured' , 'omitted'];

       foreach ($featureds as $featured){
        $feature = new Featured();
        $feature -> option = $featured;
        $feature->save();
       }
    }
}
