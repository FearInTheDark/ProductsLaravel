<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function index() {
        $products = Product::with('category')
            ->orderBy('comments_count', 'desc')
            ->withCount('comments')
            ->paginate(10);
        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'productName' => 'required|string|min:5',
            'price' => 'required|int',
            'quantity' => 'required|int',
            'category_id' => 'required|int',
            'image' => 'required|string|min:5|'
        ]);

        Product::create($validate);

        return redirect()->route('products');
    }

    public function show(Product $product) {
        $product->load([
            'category',
            'comments' => fn($query) => $query->orderBy('created_at', 'desc'),
            'comments.user'
        ])->loadCount('comments');
        return view('products.show', [
            'product' => $product,
            'comments' => $product['comments']
        ]);
    }

    public function update(Request $request, Product $product) {
        $validate = $request->validate([
            'productName' => 'required|string|min:5',
            'price' => 'required|int',
            'quantity' => 'required|int',
            'category_id' => 'required|int',
            'image' => 'required|string|min:5|'
        ]);

        $product->update($validate);

        return back();
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function search(Request $request) {
        $products = Product::where([
            ['productName', 'like', '%' . $request->search . '%']
        ])->get();
        return response()->json($products);
    }
}
