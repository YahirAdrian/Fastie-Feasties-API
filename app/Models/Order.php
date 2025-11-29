<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'user_id',
    'status',
    'comments'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    /* public function orders(){
        return $this->belongsToMany(Product::class)
            ->withTimeStamps()
            ->withPivot('quantity', 'subtotal');
    } */

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
                    ->withPivot('quantity', 'subtotal')
                    ->withTimestamps();
    }

}
