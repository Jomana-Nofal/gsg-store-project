<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

class CatrgoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

     

    public function definition()
    {
        $status = ['active', 'draft'];
        
        return [
            'name' => $this->faker->name(),
            'discription'=>$this->faker->words(100,true),
            'slug' => Str::slug($name),
            'image_path' => $this->faker->imageUrl(),
            'status' => $status[rand(0, 1)],
        ];
    }
}
