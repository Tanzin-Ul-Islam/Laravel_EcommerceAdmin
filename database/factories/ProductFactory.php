<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name'=>$product_name,
            'image'=>'image_'.$this->faker->unique()->numberBetween(1,9).'.png',
            'slug'=>$slug,
            'description'=>$this->faker->text(200),
            'stock_status'=>'instock',
            'price'=>$this->faker->numberBetween(10,500),
            'category_id'=>$this->faker->numberBetween(1,5),
        
        ];
    }
}
