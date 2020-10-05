<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Product;

class OrderController extends Controller
{
    public function create (OrderRequest $request)
    {
       if(!$request->order_status_id){
           $request['order_status_id'] = 1;
       }
       //get logged user from access_token
       $request['user_id'] = $request->user()->id;

       $product = Product::find($request['product_id']);
       $request['price'] = $product->new_price??$product->old_price;

       $request['total_price'] = $request['quantity'] * $request['price'];
       $order = Order::create($request->all());
       return $order;
    }

    public function index(){
        /*$orders=Order::leftJoin("products","product_id","products.id")
            ->leftJoin("order_statuses","order_status_id","order_statuses.id")
            ->where("user_id", request()->user()->id)
            ->select([
                'orders.id',
                'products.id as product_id',
                'products.title as product',
                'quantity',
                'price',
                'total_price',
            ])->orderBy("orders.id","desc")->paginate();*/

        $orders = Order::where("user_id", request()->user()->id)
        ->paginate(10);
        return $orders;

        //return response()->json(["msg"=>"مبروك"])
    }


}
