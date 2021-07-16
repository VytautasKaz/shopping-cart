<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $items = ['Basketball', 'Shirt', 'Pants', 'Jacket', 'Jumper', 'Polo Shirt', 'Computer', 'SmartPhone', 'Tablet'];
        $item_name = $this->faker->company . ' ' . Arr::random($items);

        return [
            'item_name' => $item_name,
            'description' => $this->faker->realText(200),
            'price' => $this->faker->numberBetween(10, 500),
            'path_to_img' => 'https://st2.depositphotos.com/3765753/5349/v/600/depositphotos_53491489-stock-illustration-example-rubber-stamp-vector-over.jpg',
        ];
    }
}
