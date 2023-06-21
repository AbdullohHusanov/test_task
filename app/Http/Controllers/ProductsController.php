<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return ProductModel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ProductModel|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:products,name',
            'brand' => 'required|string',
            'price' => 'required|float',
            'status' => 'required|boolean',
        ]);

        $newProduct = new ProductModel();
        $newProduct->name = $request->name;
        $newProduct->brand = $request->brand;
        $newProduct->price = $request->price;
        $newProduct->status = $request->status;
        $newProduct->save();

        return $newProduct;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductModel $productModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, ProductModel $productModel)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|unique:products,name',
            'brand' => 'required|string',
            'price' => 'required|float',
            'status' => 'required|boolean'
        ]);

        $prod = ProductModel::query()->find($request->id);
        if ($prod !== null) {
            $prod->name = $request->name;
            $prod->brand = $request->brand;
            $prod->price = $request->price;
            $prod->status = $request->status;
            $prod->save();
            return response($prod, 200);
        } else {
            return response([], 400)
                ->json(['message'=>'not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductModel $productModel, $product)
    {
        return ProductModel::query()->where('id','=', value: $product)->delete();
    }
}
