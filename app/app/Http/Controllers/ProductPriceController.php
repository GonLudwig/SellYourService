<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Product::with('price')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'id'                => $product->id,
            'name'              => $product->name,
            'description'       => $product->description,
            'price_id'          => $product->price_id,
            'started_display'   => $product->started_display,
            'ended_display'     => $product->ended_display,
            'price'             => $product->price
        ]);
    }
}
