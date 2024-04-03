<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewProduct; // Make sure to import your model

class NewProductController extends Controller
{
    public function index()
    {
        // Retrieve all new products
        return NewProduct::all();
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'course' => 'required|string',
        ]);

        // Create new product
        return NewProduct::create($request->all());
    }

    public function show($id)
    {
        // Retrieve a specific new product by its ID
        return NewProduct::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'course' => 'required|string',
        ]);

        // Find the product and update
        $product = NewProduct::findOrFail($id);
        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        // Find the product and delete
        $product = NewProduct::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
