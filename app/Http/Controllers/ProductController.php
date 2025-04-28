<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function add(){
        $categories = Category::all();
        return view('add', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|min:5|max:80',
            'price' => 'required|integer|min:500',
            'qty' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $imagePath
        ]);
        return redirect()->route('add.products')->with('success', 'Product has been added successfully!');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route("admin.page")->with('success', 'The product has succesfully been deleted');
    }

    public function edit($id){
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('editProduct', compact('product', 'categories'));
    }

    public function editProduct(Request $request, $id){
        $products = Product::findorFail($id);

        $validatedProduct = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|min:5|max:80',
            'price' => 'required|integer|min:500',
            'qty' => 'required|integer|min:0',
            'image' => 'image|mimes:jpeg,jpg,png'
        ]);

        $products->category_id = $validatedProduct['category_id'];
        $products->name = $validatedProduct['name'];
        $products->price = $validatedProduct['price'];
        $products->qty = $validatedProduct['qty'];

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($products->image) {
                Storage::disk('public')->delete($products->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $products->image = $imagePath;
        } else{
            $validatedProduct['image'] = $products->image;
        }

        $products->save();

        return redirect()->route('admin.page')->with('success', 'The product has been edited successfully.');
    }
}
