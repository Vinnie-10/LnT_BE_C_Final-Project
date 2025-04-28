<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $request->validate([
            'category' => 'required|string'
        ]);

        Category::create([
            'name' => $request->category
        ]);
        return redirect()->route('create.categories')->with('success', 'It has been stored successfully!');
    }
}
