<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        return view('shops/.list', compact('shops'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop();
        $shop->name         = $request->name;
        $shop->address      = $request->address;
        $shop->email        = $request->email;
        $shop->phone        = $request->phone;
        $shop->nit          = $request->nit;
        $shop->status_id    = 1;
        $shop->save();
        $shops = Shop::select('statuses.name as status', 'shops.*')->join('statuses', 'statuses.id', '=', 'shops.status_id')->get();
        return ['shops' => $shops];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        return ['shop' => $shop];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shop = Shop::find($id);
        $shop->name         = $request->name;
        $shop->address      = $request->address;
        $shop->email        = $request->email;
        $shop->phone        = $request->phone;
        $shop->nit          = $request->nit;
        $shop->save();

        $shops = Shop::select('statuses.name as status', 'shops.*')->join('statuses', 'statuses.id', '=', 'shops.status_id')->get();
        return ['shops' => $shops];
    }

    public function updateStatus($id)
    {
        $shop = Shop::find($id);

        if ($shop->status_id == 1)

            $shop->status_id = 2;
        else
            $shop->status_id = 1;

        $shop->save();

        $shops = Shop::select('statuses.name as status', 'shops.*')
                    ->join('statuses', 'statuses.id', '=', 'shops.status_id')
                    ->get();

        return ['shops' => $shops];
    }
}
