<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SubCategory::factory()->count(6)->create();

    }
}