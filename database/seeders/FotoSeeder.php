<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Foto;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            $foto = new Foto();
            $foto->title = $faker->words(4, true);
            $foto->slug = Str::of($foto->title)->slug('-');
            $foto->image_path = $faker->imageUrl(600, 400, 'Fotos', true, $foto->title, true, 'jpg');
            $foto->description = $faker->text();
            $foto->save();
        }
    }
}
