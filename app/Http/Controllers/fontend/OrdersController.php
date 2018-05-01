<?php

namespace App\Http\Controllers\fontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\OrderDetail;
use App\Orders;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if(!Session::has('cart')){
            return view('frontend.order', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontend.order',[
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);



        foreach ($cart->items as $products) {
            $product = Product::findOrFail($products['item']['id']);
            if ($product->productItemTotal - $products['qty'] < 0) {
                Session::flash('soldOut', $product->productName . ' sold out');
                return back();
            } else {
                $product->productItemTotal -= $products['qty'];
                $product->productItemSold += $products['qty'];
                $product->save();


                $orderDetail = new OrderDetail();
                $orderDetail->detailName = $products['item']['productName'];
                $orderDetail->detailPrice = $products['item']['productPrice'];
                $orderDetail->detailQuantity = $products['qty'];
                $orderDetail->detailTotal = $products['productPrice'];
                $orderDetail->detailStatus = 0;
                $orderDetail->detailCustomersId = Auth::user()->id;
                $orderDetail->detailOrderId = 0;
                $orderDetail->detailProductId = $products['item']['id'];
                $orderDetail->save();
            }
        }

        $order = new Orders();
        $order->orderDate = Carbon::now();
        $order->orderStatus = 0;
        $order->orderTotal = $request->totalAll;
        $order->orderUserId = Auth::user()->id;
        $order->save();
//id new
        $insertIdOrders = Orders::orderBy('id', 'desc')->first();
        $insertIdOrders->orderCode = "B.".$insertIdOrders->id;
        $insertIdOrders->save();


        $lastIdOrders = Orders::orderBy('id', 'desc')->first();


        foreach ($cart->items as $products2) {
            $orderDetail2 = OrderDetail::where('detailProductId', '=', $products2['item']['id'])->orderBy('id','desc')->first();
            $orderDetail2->detailOrderId = $lastIdOrders->id;
            $orderDetail2->save();
        }


        Session::forget('cart');
        return redirect()->action('ProductController@allListProduct');
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
        $orders = Orders::find($id);
        $orders->delete();
        return back();
    }




    public function chkOrder(){
        $order = Orders::where('orderUserId','=',Auth::user()->id)->get();
        return view('frontend.checkOrder',['order' => $order]);
    }



    public function orderDetail($id){
        $order = Orders::findOrFail($id);
        $orderDetail = OrderDetail::where('detailOrderId','=',$id)->get();
        return view('frontend.orderDetail',[
            'orderDetail' => $orderDetail,
            'order' => $order,
        ]);
    }


    public function payment(Request $request){
        $order = Orders::where('id','=', $request->orderIdPayment)->first();
        if ($request->hasFile('payImage')){   //ถ้ามีนรูปอัพมา
            $newFileName = str_random(10).'.'.$request->file('payImage')->getClientOriginalExtension();
            $request->file('payImage')->move(public_path().'/paymentsImg/',$newFileName);
            $order->orderPaymentImage = $newFileName;
        }
        $order->orderStatus = 3;
        $order->save();
        return back();
    }


    public function orderDelete(Request $request){
        $order = Orders::findOrFail($request->orderId);
        //get orderDetail
        $orderDetail = OrderDetail::where('detailOrderId',$request->orderId)->get();
        foreach ($orderDetail as $orderDetails){
            // + product  productItemTotal cancel order
            $product = Product::find($orderDetails->detailProductId);
            $product->productItemTotal += $orderDetails->detailQuantity;
            $product->productItemSold -= $orderDetails->detailQuantity;
            $product->save();
        }
        $order->orderStatus = 10;
        $order->save();
        return back();
    }

    public function orderPDF($id){
        $order = Orders::findOrFail($id);
        $orderDetail = OrderDetail::where('detailOrderId','=',$id)->get();

        $pdf = PDF::loadView('frontend.pdf.profilesOrder',[
            'orderDetail' => $orderDetail,
            'order' => $order,
        ]);
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    }

}
