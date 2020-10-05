<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'price',
        'total_price',
        'order_status_id',
    ];
    protected $appends = ["product_title","order_status_name"];
    public function getProductTitleAttribute(){
        //return $this->product->title;
        return Product::find($this->product_id)->title;
    }
    public function getOrderStatusNameAttribute(){
        return OrderStatus::find($this->order_status_id)->title;
        //return $this->orderStatus->title;
    }
    public function user(){
        return $this->belongsTo("App\User");
    }
    public function product(){
        return $this->belongsTo("App\Models\Product");
    }
    public function orderStatus(){
        return $this->belongsTo("App\Models\OrderStatus");
    }
}
