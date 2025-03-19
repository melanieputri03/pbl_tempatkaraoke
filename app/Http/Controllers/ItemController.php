<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // Contoh data item (nanti bisa diganti dari database)
        $items = [
            ['id' => 1, 'name' => 'Laptop', 'price' => 15000000],
            ['id' => 2, 'name' => 'Mouse', 'price' => 250000],
            ['id' => 3, 'name' => 'Keyboard', 'price' => 500000],
        ];

        return view('items.index', compact('items'));
    }
}
