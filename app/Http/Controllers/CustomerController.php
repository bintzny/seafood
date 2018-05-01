<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customer = User::get();
        return view('customer.index', [
            'data' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->address2 = $request->address2;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->action('CustomerController@index');

//        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::find($id);
        return view('customer.edit', [
            'data' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = User::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        if ($request->password != ' '){
            $customer->password = bcrypt($request->password);
        }
        $customer->password = bcrypt($request->password);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->address2 = $request->address2;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->action('CustomerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }
}
