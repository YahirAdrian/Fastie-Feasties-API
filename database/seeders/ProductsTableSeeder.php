<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Adjust namespace if your model is in App\Product

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'category'    => 'Hamburguesas',
                'name'        => 'Hamburguesa clásica',
                'description' => 'Hamburguesa original con queso, lechuga y tomate',
                'price'       => 100,
                'image'       => 'burgers/classic-burger.jpeg',
            ],
            [
                'category'    => 'Hamburguesas',
                'name'        => 'Hamburguesa doble',
                'description' => 'Hamburguesa con doble carne, queso, lechuga y tomate',
                'price'       => 130,
                'image'       => 'burgers/double-burger.jpeg',
            ],
            [
                'category'    => 'Hamburguesas',
                'name'        => 'Hamburguesa chilli',
                'description' => 'Hamburguesa con adereso chilli, queso, lechuga y tomate',
                'price'       => 125,
                'image'       => 'burgers/chilli-burger.jpeg',
            ],
            [
                'category'    => 'Hamburguesas',
                'name'        => 'Hamburgesa hawaiiana',
                'description' => 'Hamburgesa hawaiiana con piña, queso, lechuga y tomate',
                'price'       => 125,
                'image'       => 'burgers/hawaiian-burger.jpeg',
            ],
            [
                'category'    => 'Bebidas',
                'name'        => 'Refresco Coca-cola',
                'description' => 'Vaso de refresco Coca-cola de 500ml',
                'price'       => 40,
                'image'       => 'drinks/coca-cola.jpeg',
            ],
            [
                'category'    => 'Bebidas',
                'name'        => 'Refresco Fanta',
                'description' => 'Vaso de refresco Fanta de 500ml',
                'price'       => 40,
                'image'       => 'drinks/fanta.jpeg',
            ],
            [
                'category'    => 'Bebidas',
                'name'        => 'Refresco Fuze Tea',
                'description' => 'Vaso de refresco Fuze Tea de 500ml',
                'price'       => 40,
                'image'       => 'drinks/fuze-tea.jpeg',
            ],
            [
                'category'    => 'Bebidas',
                'name'        => 'Refresco Sidral Mundet',
                'description' => 'Vaso de refresco Sidral Mundet de 500ml',
                'price'       => 40,
                'image'       => 'drinks/sidral-mundet.jpeg',
            ],
            [
                'category'    => 'Bebidas',
                'name'        => 'Refresco Sprite',
                'description' => 'Vaso de refresco Sprite de 500ml',
                'price'       => 40,
                'image'       => 'drinks/sprite.jpeg',
            ],
            [
                'category'    => 'Bebidas',
                'name'        => 'Malteada de fresa',
                'description' => 'Malteada de fresa con crema batida leche entera',
                'price'       => 70,
                'image'       => 'drinks/malteada-fresa.jpeg',
            ],
            [
                'category'    => 'Hot-dogs',
                'name'        => 'Hot dog clásico',
                'description' => 'Hot dog clásico con aderezos',
                'price'       => 35,
                'image'       => 'hot-dogs/classic-dog.jpeg',
            ],
            [
                'category'    => 'Hot-dogs',
                'name'        => 'Cheese-dog',
                'description' => 'Hot dog cubierto con queso derretido',
                'price'       => 40,
                'image'       => 'hot-dogs/cheese-dog.jpeg',
            ],
            [
                'category'    => 'Hot-dogs',
                'name'        => 'Chilli-dog',
                'description' => 'Hot dog de aderezo chilli',
                'price'       => 45,
                'image'       => 'hot-dogs/chilli-dog.jpeg',
            ],
            [
                'category'    => 'Hot-dogs',
                'name'        => 'Grilled-dog',
                'description' => 'Hot dog con salchicha para asar',
                'price'       => 50,
                'image'       => 'hot-dogs/grilled-dog.jpeg',
            ],
            [
                'category'    => 'Pizzas',
                'name'        => 'Pizza de pepperoni',
                'description' => 'Pizza de pepperoni masa original tamaño grande',
                'price'       => 150,
                'image'       => 'pizzas/pepperoni-pizza.jpeg',
            ],
            [
                'category'    => 'Pizzas',
                'name'        => 'Pizza triple pepperoni',
                'description' => 'Pizza con triple pepperoni, masa original, tamaño grande',
                'price'       => 170,
                'image'       => 'pizzas/triple-pepperoni-pizza.jpeg',
            ],
            [
                'category'    => 'Pizzas',
                'name'        => 'Pizza de carnes frias',
                'description' => 'Pizza de carnes frías, masa original, tamaño grande',
                'price'       => 160,
                'image'       => 'pizzas/meat-pizza.jpeg',
            ],
            [
                'category'    => 'Pizzas',
                'name'        => 'Pizza hawaiiana',
                'description' => 'Pizza hawaiiana con piña, masa original, tamaño grande',
                'price'       => 150,
                'image'       => 'pizzas/hawaiian-pizza.jpeg',
            ],
            [
                'category'    => 'Pizzas',
                'name'        => 'Pizza orilla rellena de queso',
                'description' => 'Pizza con orilla rellena de queso de pepperoni, masa original tamaño grande',
                'price'       => 175,
                'image'       => 'pizzas/cheese-crust-pizza.jpeg',
            ],
            [
                'category'    => 'Snacks',
                'name'        => 'Banana split',
                'description' => 'Banana split con helado de vainilla y chocolate, jarabe de chocolate y fruta',
                'price'       => 150,
                'image'       => 'snacks/banana-split.jpeg',
            ],
            [
                'category'    => 'Snacks',
                'name'        => 'Papas fritas',
                'description' => 'Porción de papas fritas',
                'price'       => 35,
                'image'       => 'snacks/french-fries.jpeg',
            ],
            // I've included the logic here, but truncated the repetition.
            // You can add more rows following the same pattern if needed.
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
