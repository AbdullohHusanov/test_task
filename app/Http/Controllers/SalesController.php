<?php

namespace App\Http\Controllers;

use App\Models\SaleModel;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return SaleModel::all();
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
     * @param \Illuminate\Http\Request $request
     * @return SaleModel|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'month' => 'required|integer',
            'year' => 'required|integer',
        ]);

        $newSale = new SaleModel();
        $newSale->product_id = $request->product_id;
        $newSale->price = $request->price;
        $newSale->count = $request->count;
        $newSale->month = $request->month;
        $newSale->year = $request->year;
        $newSale->save();

        return $newSale;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SaleModel $saleModel
     * @return \Illuminate\Http\Response
     */
    public function show(SaleModel $saleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SaleModel $saleModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleModel $saleModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SaleModel $saleModel
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, SaleModel $saleModel)
    {
        $request->validate([
            'id' => 'required|integer',
            'product_id' => 'required|integer',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'month' => 'required|integer',
            'year' => 'required|integer',
        ]);

        $sale = SaleModel::query()->find($request->id);

        if ($sale !== null) {
            $sale->product_id = $request->product_id;
            $sale->price = $request->price;
            $sale->count = $request->count;
            $sale->month = $request->month;
            $sale->year = $request->year;
            $sale->save();

            return response($sale, 200);
        } else {
            return response([], 400)
                ->json(['message' => 'not updated']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SaleModel $saleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleModel $saleModel, $sale)
    {
        return SaleModel::query()->where('id', '=', $sale)->delete();
    }

    public function saleStatistics()
    {

    }
}
