<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function save(Request $request){

        $basket = session('basket', []);
        $total = 0;

        foreach ($basket as $item){
            $total += ($item['quantity'] * $item['price']);
        }

        $invoiceNumber = session('last_invoice_number', 1);
        session(['last_invoice_number' => $invoiceNumber + 1]);

        $invoice = Invoice::create([
            'address' => session('user_address'),
            'postal_code' => session('user_pos'),
            'total' => $total
        ]);

        foreach ($basket as $item){
            Item::create([
                'invoice_id' => $invoice->id,
                'category' => $item['category'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['quantity'] * $item['price']
            ]);
        }

        foreach($basket as $item)
            Product::where('name', $item['name'])->decrement('qty', $item['quantity']);

        session()->forget('basket');
        Basket::truncate();

        return redirect()->route('user.page')->with('success', 'Invoice has successfully been saved.');
    }
}
