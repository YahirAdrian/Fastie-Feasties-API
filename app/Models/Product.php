<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function orders(){
        return $this->belongsToMany(Order::class)
        >withTimeStamps()
        ->withPivot('quantity', 'subtotal');
    }

    public function create($data){
        $product = new Product();
        $product->name = $data['name'];
        $product->category = $data['category'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->save();
        return $product;
    }

    
}
