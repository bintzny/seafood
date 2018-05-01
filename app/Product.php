<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'productStatus',
        'productCode',
        'productName',
        'productImage',
        'productNumber',
        'productPrice',
        'productDescription',
        'productItemTotal',
        'productItemSold',
        'productGroupId',
    ];


    public function product(){
        return $this->hasMany(OrderDetail::class);
    }
}
