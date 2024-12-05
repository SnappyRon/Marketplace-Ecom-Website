<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products;
        return view('seller.products.index', compact('products'));
    }

    public function create()
    {
        return view('seller.products.create');
    }

    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'image'         => 'required|image',
        ]);

        // Handle Image Upload
        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $imageName);

        // Create Product
        Auth::user()->products()->create([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'image'         => $imageName,
            'supplier_name' => Auth::user()->name, // Autofill supplier_name with seller's name
        ]);

        return redirect()->route('seller.products.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        $this->authorizeProduct($product);
        return view('seller.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        // Validate Input
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'image'         => 'image',
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete Old Image
            if ($product->image && file_exists(public_path('img/' . $product->image))) {
                unlink(public_path('img/' . $product->image));
            }

            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('img'), $imageName);
            $product->image = $imageName;
        }

        // Update Product
        $product->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
        ]);

        return redirect()->route('seller.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);

        // Delete Image
        if ($product->image && file_exists(public_path('img/' . $product->image))) {
            unlink(public_path('img/' . $product->image));
        }

        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Product deleted successfully.');
    }

    // Helper method to authorize product
    private function authorizeProduct(Product $product)
    {
        if ($product->seller_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
