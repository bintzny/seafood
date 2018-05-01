<?php

namespace App\Http\Controllers;

use App\Cart;
use App\OrderDetail;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $order = Orders::all();
        return view('orders.index',['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //update status
        $order = Orders::find($request->statusOrder);
        $order->orderStatus = $request->statusData;
        $order->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Orders::find($id);
        return view('orders.edit', [
            'data' => $orders
        ]);
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
                    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orders::destroy($id);
        OrderDetail::where('detailOrderId',$id)->delete();
        return back();
    }


    public function detailOrder($id){

        $order = Orders::find($id);
        $orderDetail = OrderDetail::where('detailOrderId','=',$id)->get();
        return view('orders.detail',[
            'orderDetail' => $orderDetail,
            'order' => $order,
        ]);
    }


    public function orderPDF($id){
        $order = Orders::findOrFail($id);
        $orderDetail = OrderDetail::where('detailOrderId','=',$id)->get();

        $pdf = PDF::loadView('pdf.order',[
            'orderDetail' => $orderDetail,
            'order' => $order,
        ]);
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    }
}
