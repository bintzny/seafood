<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;


    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public  function add($item, $id){
        $storedItem = ['qty' => 0, 'productPrice' => $item->productPrice, 'item' => $item];
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['productPrice'] = $item->productPrice * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->productPrice;
    }


    public  function remove($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['productPrice'] -= $this->items[$id]['item']['productPrice'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['productPrice'];

        if ($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    public  function delete($id)
    {
        $this->totalQty -=  $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['productPrice'];
        unset($this->items[$id]);
    }
}
