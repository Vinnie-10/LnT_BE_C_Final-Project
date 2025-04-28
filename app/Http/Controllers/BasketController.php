<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function add($productId){
        $basket = session()->get('basket', []);

        if (!is_array($basket)) {
            $basket = [];
        }

        $product = Product::find($productId);

        if (isset($basket[$productId])){
            $basket[$productId]['quantity']++;

            $basketItem = Basket::where('name', $product->name)->first();
            if ($basketItem) {
                $basketItem->quantity++;
                $basketItem->save();
            }
        } else{
            $basket[$productId] = [
                'category' => $product->category->name,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];

            Basket::create([
                'category' => $product->category->name,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ]);
        }

        session()->put('basket', $basket);

        return redirect()->back()->with('success', 'The product has successfully been added to the basket');
    }

    public function view(){
        $basket = session('basket', []);
        $productId = array_keys($basket);

        $products = Product::whereIn('id', $productId)->get();

        return view('basket', compact('products', 'basket'));
    }

    public function invoice(){
        $basket = Basket::with('category')->get();

        session(['basketThings' => $basket]);

        $address = session('address');
        $pos = session('pos');

        return view('payment', [
            'basketThings' => $basket,
            'address' => $address,
            'pos' => $pos
        ]);

    }
}
