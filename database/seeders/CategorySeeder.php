<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Support\Facades\{DB, Schema};
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->delete();
        
        $category = Category::create([
            'parent' => null
        ]);

        $category = Category::create([
            'parent' => '1'
        ]);

        $category = Category::create([
            'parent' => '2'
        ]);

        $category = Category::create([
            'parent' => '2'
        ]);

        $category = Category::create([
            'parent' => '2'
        ]);

        $categoryt = CategoryTranslation::create([
            'locale' => 'en',
            'description' => 'a;slmc;slac;alsmca;smc;almv',
            'category_id' => '1',
            'name' => 'manson',
        ]);

        $categoryt = CategoryTranslation::create([
            'locale' => 'en',
            'description' => 'a;slmc;slac;alsmca;smc;almv',
            'category_id' => '2',
            'parent' => '1',
            'name' => 'daly',
        ]);

        $categoryt = CategoryTranslation::create([
            'locale' => 'en',
            'description' => 'a;slmc;slac;alsmca;smc;almv',
            'category_id' => '3',
            'parent' => '2',
            'name' => 'filly',
        ]);
        $categoryt = CategoryTranslation::create([
            'locale' => 'en',
            'description' => 'a;slmc;slac;alsmca;smc;almv',
            'category_id' => '4',
            'parent' => '2',
            'name' => 'مانسون',
        ]);
        $categoryt = CategoryTranslation::create([
            'locale' => 'en',
            'description' => 'a;slmc;slac;alsmca;smc;almv',
            'category_id' => '5',
            'parent' => '2',
            'name' => 'فيلي',
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
