<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class AddCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Bands', 'Duration', 'Title']; //In questo array inserisco le categorie che utilizzo
                          //Nelle categorie vado a mettere valori univoci
        foreach($categories as $category){
            $newCategory_obj = new Category;
            $newCategory_obj->name = $category;
            $newCategory_obj->slug = Str::slug($category);
            $newCategory_obj->save();

        }
    }
}
