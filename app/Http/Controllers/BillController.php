<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bill;
use App\Models\Product;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        //$bill = new Bill();
        //$bill->id = null;
        //$bill->save();
        $products = Product::all()->whereIn('status_id',[1,7])->sortByDesc("status_id");
        return view('bill.list', compact('bills','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bill          = $this->saveBill($request);
        $productBill  = $this->saveProductBill($bill, $request->arrProducts);

        if (!isset($bill['error']) && !isset($productBill['error'])) {
            $resp = [
                'success' => true,
                'message' => 'Inserción correcta'
            ];
            return response()->json($resp);
        } else {
            $resp = [
                'error' => true,
                'message' => 'Error creando la factura (' . $bill['message'] . ', ' . $productBill['error'] . ')'
            ];
            return response()->json($resp);
        }
    }

    public function saveBill($request)
    {
        try {

            $bill = new Bill;
            $bill->date_bill    = $request->date_bill;
            $bill->discount     = $request->discount;
            $bill->way_to_pay   = $request->way_to_pay;
            $bill->total        = $request->total;
            $bill->user_id      = $request->user_id;
            $bill->client_id    = $request->client_id;
            $bill->status_id    = 1;
            $bill->save();

            return $bill;
        } catch (\Exception $e) {
            $resp = [
                'error'     => true,
                'message'   => 'Error insertando la factura (' . $e->getMessage() . ')'
            ];
            return ($resp);
        }
    }

    public function saveProductBill($bill, $arrProducts)
    {
        try {
            $bill->products()->detach();

            foreach ($arrProducts as $product) {

                $bill->products()->attach($product['id']);
            }

            return true;
        } catch (\Exception $e) {
            $resp = [
                'error'     => true,
                'message'   => 'Error insertando el detalle de la factura (' . $e->getMessage() . ')'
            ];
            return ($resp);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        return ['bill' => $bill];
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
        $bill = Bill::find($id);
        $bill->date_bill = $request->date_bill;
        $bill->discount = $request->discount;
        $bill->way_to_pay = $request->way_to_pay;
        $bill->total = $request->total;
        $bill->user_id = $request->user_id;
        $bill->client_id = $request->client_id;
        $bill->status_id = $request->status_id;
        $bill->save();
        $bill = Bill::select('statuses.status', 'bills.*')->join('statuses', 'statuses.id', '=', 'bills.status_id')->get();
        return ['bills' => $bills];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::find($id);
        $bill->status_id = $request->status_id;
        $bill->save();
        $bill = Bill::select('statuses.status', 'bills.*')->join('statuses', 'statuses.id', '=', 'bills.status_id')->get();
        return ['bills' => $bills];
    }

    public function addProduct($id)
    {
        $product = Product::find($id);
        $product->status_id = 7;
        $product->save();
        $products =  Product::select('statuses.name as status','users.name as user','categories.name as category','products.*')->join('statuses', 'statuses.id', '=', 'products.status_id')
        ->join('users', 'users.id', '=', 'products.user_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->get();
        return ['product' => $product, 'products' => $products];
    }
}
