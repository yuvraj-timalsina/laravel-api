<?php
    
    namespace Database\Factories;
    
    use App\Models\Product;
    use App\Models\Category;
    use Illuminate\Database\Eloquent\Factories\Factory;
    
    /**
     * @extends Factory<Product>
     */
    class ProductFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition()
        {
            return [
                'category_id' => Category::inRandomOrder()->first()->id,
                'name' => fake()->word(),
                'description' => fake()->paragraph,
                'price' => random_int(1000, 99999),
            ];
        }
    }
