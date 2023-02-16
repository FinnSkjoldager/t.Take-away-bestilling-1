<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    //** http://localhost:8000/api/order
    /*
    Actions Handled By Resource Controller
    Verb	URI	Action	Route Name
    GET	/photos	index	photos.index
    GET	/photos/create	create	photos.create
    POST /photos	store	photos.store
    GET	/photos/{photo} show	photos.show
    GET	/photos/{photo}/edit	edit	photos.edit
    PUT/PATCH	/photos/{photo}	update	photos.update
    DELETE	/photos/{photo}	destroy	photos.destroy
    */
    public function index()
    {
        //error_log('## Order index');
        //error_log(Order::all());
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->customer;
        }
        return response()->json($orders);
        /*
                return response()->json([
                    "message" => "Medlem not found"
                ], 404);
        */
    }
    public function showcustomer($id)
    {
        $order = Order::find($id);
        return response()->json($order->customer);
    }
    function mapRequestOrder(Request $request, Order $order){
        $order->OrderNo = $request->OrderNo;
        $order->CustomerID = $request->CustomerID;
        $order->PMethod = $request->PMethod;
        $order->GTotal = $request->GTotal;
        $order->DeletedOrderItemIDs = $request->DeletedOrderItemIDs;
        $order->DeletedOrderItemIDs = 0;
        $order->Paid = $request->Paid;
        return $order;
    }

    public function store(Request $request)
    {
        //error_log('## Order store'.$request); 
        //echo '## Order store '.$request.PHP_EOL;
        if (is_null($request->id))
            $order = new Order;
        else 
            $order = Order::find($request->id);
        $order = $this->mapRequestOrder($request, $order);
        $order->OrderItems()->detach();
        $order->save();
        $itemid = 1;
        foreach ($request->OrderItems as $item){
            error_log('$item '.json_encode($item)); 
            //error_log('$item[Paid] '.$item['pivot']['Paid']); 
            /*
            $itemid = $item['ItemID'] ?? null;
            if ($itemid == null)
                $itemid = $item['id'];
            */
            $itemid = $itemid + 1;
            //$itemid = 1;
            //error_log('$itemid: '.$itemid);
            //return "OK";
            //$order->OrderItems()->attach($itemid,['Quantity'=> $item['Quantity']]);
            $order->OrderItems()->attach($itemid,[
                'Quantity'=> $item['Quantity'],    
                ///'Paid'=> $item['pivot']['Paid']    
                'Paid'=> $item['Paid']    
            ]);
        } 
        $order->save();
       // return $this->show($request->id);
        return response()->json([
            "message" => "Order updated"
        ], 200);
   }
    public function show($id)
    {
        $order = Order::find($id);
        return response()->json([
                "order" => $order, 
                "orderDetails" => $order->OrderItems  
        ], 200);
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();   
    }
}
