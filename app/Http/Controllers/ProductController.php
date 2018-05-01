<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductGroup;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Psy\Util\Json;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index',[
            'data' => $product
        ]);
    }


    public function allListProduct(){
        $product = Product::all();
        return view('frontend.welcome',['product' =>$product]);
    }

    public function productGroup($id){
        $product = Product::where('productGroupId',$id)->get();
        $productGroup = ProductGroup::where('id',$id)->first();
        return view('frontend.productGroup',['product' =>$product,'productGroup' => $productGroup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product();
        $product->productName = $request->productName;
        $product->productCode = $request->productCode;
        $product->productNumber = $request->productNumber;
        $product->productPrice = $request->productPrice;
        $product->productGroupId = $request->productGroupId;
        $product->productDescription = $request->productDescription;

        if ($request->hasFile('productImages')){   //ถ้ามีนรูปอัพมา
            $newFileName = str_random(10).'.'.$request->file('productImages')->getClientOriginalExtension();
            $request->file('productImages')->move(public_path().'/productImage/',$newFileName);
            Image::make(public_path().'/productImage/'.$newFileName)->resize(400,400)->save(public_path().'/productImage_resize/'.$newFileName);
            $product->productImage = $newFileName;
        }

        $product->save();
        return redirect()->action('ProductController@index');
//        return response()->json($request);
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
        $product = Product::find($id);
        return view('product.edit',[
            'data' => $product
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
        $product = Product::find($id);
        $product->productName = $request->productName;
        $product->productCode = $request->productCode;
        $product->productNumber = $request->productNumber;
        $product->productPrice = $request->productPrice;
        $product->productGroupId = $request->productGroupId;
        $product->productDescription = $request->productDescription;


        //upload image
        if ($request->hasFile('productImages')){
            //delete file
            File::delete(public_path().'\\productImage\\'.$product->productImage);
            File::delete(public_path().'\\productImage_resize\\'.$product->productImage);

            $newFileName = str_random(10).'.'.$request->file('productImages')->getClientOriginalExtension();
            $request->file('productImages')->move(public_path().'/productImage/',$newFileName);

            Image::make(public_path().'/productImage/'.$newFileName)->resize(400,400)->save(public_path().'/productImage_resize/'.$newFileName);


            $product->productImage = $newFileName;
        }else{
            $product->productImage = $product->productImage;
        }

        $product->save();
        return redirect()->action('ProductController@index');
//        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Product::find($id);
        File::delete(public_path().'\\productImage\\'.$type->productImage);
        File::delete(public_path().'\\productImage_resize\\'.$type->productImage);
        $type->delete();
        return back();
    }
}
