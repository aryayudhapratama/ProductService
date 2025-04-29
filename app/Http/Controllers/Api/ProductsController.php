<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\produuctResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return new produuctResource($products, 'Success', 'List of Products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return new produuctResource(null, 'Failed', $validator->errors());
        }

        $product = Product::create($request->all());
        return new produuctResource($product, 'Success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($request->all());
            return new produuctResource($product, 'Success', 'Product Showed Successfully');
        } else {
            return new produuctResource(null, 'Failed', 'Product Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return new produuctResource(null, 'Failed', $validator->errors());
        }

        $product = Product::find($id);
        if ($product) {
            $product->update([
                'product_name' => $request->product_name,
                'price' => $request->price,
            ]);

            return new produuctResource($product, "Success", "Product Edited Successfully");
        } else {
            return new produuctResource(null, "Failed", "Product Not Found");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return new produuctResource(true, "Success", "Product Deleted Successfully");
        } else {
            return new produuctResource(null, "Failed", "Product Not Found");
        }
    }
}
