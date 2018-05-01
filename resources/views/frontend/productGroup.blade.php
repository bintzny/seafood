@extends('layouts.fontend-new')
@section($productGroup->productGroupName,'active')

@section('content')
    @foreach($product as $products)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{asset('productImage_resize/'.$products->productImage)}}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title"><a href="#">{{ $products->productName }}</a></h4>
                    <h5>{{  $products->productPrice }}</h5>
                    <p class="card-text">{{ $products->productDescription }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">     <a href="{{route('product.cartAddItem',['id'=>$products->id])}}">  <i class="material-icons">add_shopping_cart</i></a> <span class=" item_price">$ {{  $products->productPrice }}</span></small>
                </div>
            </div>
        </div>
    @endforeach
@endsection