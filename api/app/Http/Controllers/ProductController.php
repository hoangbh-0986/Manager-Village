<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function GetProduct()
    {
        $product = Product::with('craftVillages')->get();
        return  response()->json([
            'products' => $product,
        ]);
    }

    public function CreateProduct(Request $request) {
        $request->validate([
            'name' => 'required',
            'craft_village_id' => 'required',
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'image' => substr($request->get('image'), 12),
            'craft_village_id' => $request->get('craft_village_id'),
        ]);
        $product->save();
        return  response()->json([
            'product' => $product,
        ]);
    }

    public function DetailProduct($id)
    {
        $product =  Product::with('craftVillages')->find($id);

        return $product;
    }

    public function UpdateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'craft_village_id' => 'required',
            // 'image' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->craft_village_id = $request->get('craft_village_id');
        $product->image = substr($request->get('image'), 12);
        $product->save();

        return $product;
    }

    public function DeleteProduct($id)
    {
        $product = Product::find($id);

        return response()->json([
            'success' => (bool) ($product->delete()),
        ]);
    }
}
