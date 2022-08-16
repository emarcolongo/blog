<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Post;

class PostFactory extends Factory
{
    /**
     * @return array;
     */
    public function definition() {
        return [
            'title'=>$this->faker->words(4,true),
            'description'=>$this->faker->sentence,
            'content'=>$this->faker->paragraphs(9,true),
            'slug'=>$this->faker->slug,
            'is_active'=>$this->faker->boolean,
            'user_id'=>rand(1,10)
        ];
    }
}