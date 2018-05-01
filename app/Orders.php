<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'orderCode',
        'orderDate',
        'orderStatus',
        'orderTotal',
        'orderPaymentImage',
        'orderUserId',
        ];


    public function user(){
        return $this->belongsTo(User::class,'orderUserId');
    }


    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
