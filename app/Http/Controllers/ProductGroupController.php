<?php

namespace App\Http\Controllers;

use App\ProductGroup;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    public function index()
    {
        $type = ProductGroup::get();
        return view('productgroup.index',[
           'data' => $type
        ]);
    }

    public function create()
    {
        return view('productgroup.create');
    }

    public function store(Request $request)
    {
        $type = new ProductGroup();
        $type->productGroupName = $request->productGroupName;
        $type->save();
        return redirect()->action('ProductGroupController@index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $type = ProductGroup::find($id);
        return view('productgroup.edit',[
            'data' => $type
        ]);
    }

    public function update(Request $request, $id)
    {
        $type = ProductGroup::find($id);
        $type->productGroupName = $request->productGroupName;
        $type->save();
        return redirect()->action('ProductGroupController@index');
    }

    public function destroy($id)
    {
        $type = ProductGroup::find($id);
        $type->delete();
        return back();
    }
}
