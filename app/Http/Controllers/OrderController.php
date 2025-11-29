<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index(){
        return Order::all()->load('products');
    }

    public function show($id){
        $order = Order::findOrFail($id);
        if (! (auth()->user()->is_admin || auth()->id() === $order->user_id) ) {
            return response()->json(['message' => 'Forbidden'], 403);
        }
        return Order::findOrFail($id)->load('products');
    }

    public function order_by_user($user_id){
        
        return Order::where('user_id', $user_id)->get()->load('products');
    }

    public function store(Request $request){
        //Validate order data
        $validated = $request->validate([
        'comments' => 'nullable|string',
        'status' => 'nullable|string',
        'products' => 'required|array|min:1',
        'products.*.id' => 'required|exists:products,id',
        'products.*.quantity' => 'required|integer|min:1'
        ]);
        
        $user = $request->user();
        $order = $user->orders()->create([
            'comments' => $validated['comments'] ?? null,
            'status' => $validated['status'] ?? null,
        ]);

        // 2. Attach products through pivot table
        foreach ($validated['products'] as $item) {
            $order->products()->attach($item['id'], [
                'quantity' => $item['quantity'],
                'subtotal' => intval($item['quantity']) * floatval(Product::findOrFail($item['id'])->price)
            ]);
        }

        return response()->json([
        'message' => 'Order created successfully',
        'order' => $order->load('products')
        ], 201);
    }

    public function update(Request $request, $id){
        $order = Order::findOrFail($id);
        
        //Validate order data
        $validated = $request->validate([
        'comments' => 'nullable|string',
        'products' => 'nullable|array|min:1',
        'products.*.id' => 'nullable|exists:products,id',
        'products.*.quantity' => 'nullable|integer|min:1'
        ]);

        // Find the order
        $order = Order::findOrFail($id);
        $data = $request->all();

        // Update the order
        $order->status = $data['status'] ?? $order->status;
        $order->comments = $data['comments'] ?? $order->comments;
        $order->save();

        // Update products through pivot table
        if (!empty($validated['products'])) {
            $productsToSync = [];
            foreach ($validated['products'] as $item) {
                $productsToSync[$item['id']] = [
                    'quantity' => $item['quantity'],
                    'subtotal' => intval($item['quantity']) * floatval(Product::findOrFail($item['id'])->price)
                ];
            }
            $order->products()->sync($productsToSync);

        }

        return response()->json([
            'message' => 'Order updated successfully',
            'order' => $order->load('products')
        ], 200);
    }

    public function destroy($id){
        $order = Order::findOrFail($id);
        $order->products()->detach(); // Detach all products
        $order->delete();

        return response()->json([
        'message' => 'Order deleted successfully'
        ], 200);
    }
}
