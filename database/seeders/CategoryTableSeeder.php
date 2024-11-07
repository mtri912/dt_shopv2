<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryRecords = [
            ['id'=>1,'parent_id'=>0,'category_name'=>'Nike','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'nike','meta_title'=>'','meta_descriptions'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>2,'parent_id'=>0,'category_name'=>'Air Force 1','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'air-force-1','meta_title'=>'','meta_descriptions'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>3,'parent_id'=>0,'category_name'=>'Converse','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'converse','meta_title'=>'','meta_descriptions'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>4,'parent_id'=>0,'category_name'=>'Adidas','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'adidas','meta_title'=>'','meta_descriptions'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>5,'parent_id'=>0,'category_name'=>'Vans','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'vans','meta_title'=>'','meta_descriptions'=>'','meta_keywords'=>'','status'=>1],
        ];

        Category::insert($categoryRecords);
    }
}
