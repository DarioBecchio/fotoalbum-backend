<?php

namespace Database\Seeders;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
        public function run(Faker $faker): void
        {        
        for ($i=0; $i < 20; $i++){
            $photo = new Photo();
            $photo->title = $faker->words(5, true);
            $photo->description = $faker->text();
            $photo->image_path = $faker->imageUrl(640, 480, 'Photos','jpg');
            $photo->save();
        }
    }
    
}
