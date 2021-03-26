<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++){
            $name = 'Category '. $i;
            Category::create([
                'name' => $name,
                'slug' => str_slug($name),
            ]);
        } 
    }
}
