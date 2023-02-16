<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //** http://localhost:8000/api/customer
    public function index()
    {
        error_log('## Customer index');
        $customer = Customer::select('*')->get();
        $customer = $customer->sortByDesc('id');
        $customer = $customer->values()->all();
        //return response()->json(Customer::all());
        return response()->json($customer);
    }
    public function store(Request $request){
        $customer = new Customer();
        $customer->Name = $request->Name;
        $customer->save();
        return response()->json([
            "message" => "Customer updated"
        ], 200);
    }
    public function show($id)
    {
        //
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();   
        return response()->json([
            "message" => "Customer delete"
        ], 200);
    }
}
