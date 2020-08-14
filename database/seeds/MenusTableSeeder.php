<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 5)->create();
        $categories->each(function($category){
            factory(\App\Models\Menu::class, 3)->create([
                'category_id' => $category->id,
            ]);
        })
    }
}