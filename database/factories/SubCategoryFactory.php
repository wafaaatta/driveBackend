<?php

namespace Database\Factories;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


/**

 */
class SubCategoryFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SubCategory::class;

    public function definition()
    {
        return [

            'name' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];

   }
}