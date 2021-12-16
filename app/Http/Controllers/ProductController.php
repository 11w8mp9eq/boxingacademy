<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	 /**
     * Display all products
     *
     * @return Product[]
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products
        ]);
    }

	 /**
     * Display product details
     *
     * @return Product
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', [
            'product' => $product
        ]);
    }
}
