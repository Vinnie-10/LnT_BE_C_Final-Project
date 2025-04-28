<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function data(Request $request){
        return view('data');
    }

    public function save(Request $request){
        $validated = $request->validate([
            'address' => 'required|string|min:10|max:100',
            'pos' => 'required|string|min:5|max:5'
        ]);

        session([
            'user_address' => $validated['address'],
            'user_pos' => $validated['pos']
        ]);
        return redirect()->route('invoice.page');
    }
}
