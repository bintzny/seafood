<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'detailName',
        'detailPrice',
        'detailQuantity',
        'detailTotal',
        'detailStatus',
        'detailCustomersId',
        'detailOrderId',
        'detailProductId',
    ];


    public function products(){
        return $this->belongsTo(Product::class,'detailProductId');
    }

}
