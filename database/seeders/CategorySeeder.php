<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = ['Animals', 'Nature', 'City', 'Sport', 'Mountain'];

        foreach ($categories as $cat) {
            $newCategory = new Category();
            $newCategory->name = $cat;
            $newCategory->slug = Str::of($cat)->slug('-');
            $newCategory->save();
        }
    }
}
