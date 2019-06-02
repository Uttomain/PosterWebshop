@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Kurv</h1>
        @if(session()->has('cart'))
        
                
                       
                                @foreach($products as $product)
                                <div class="row mb-5">
                                  
                                  <ul class="mr-auto">
                                  <li class="list-group-item">
                                        {{-- <img style="width: 100%;" class="product-card-show-img" src="/storage/product_images/{{$product->product_image}}">                        --}}
                                  <strong>{{ $product['item']['title']}}</strong>
                                  </ul>
                                  <ul class="ml-auto">
                                          
                                  {{-- <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" >Action</button>
                                  <ul class="dropdown-menu">
        
                                          <li><a href="{{ route('product.remove', [ 'id' => $product['item']['id'] ]) }}">reduce All</a></li>
                                  </ul> --}}

                                 
                                        <span class="badge badge-dark"><li><a href=" {{ route('product.reduceByOne', [ 'id' => $product['item']['id'] ]) }}">-</a></li></span>
                                        <span class="badge badge-light">{{$product['qty']}}</span>
                                        <span class="badge badge-dark">+</span>
                                   
                                  <span class="label label-success ml-5">{{$product['price']}}</span>
                                </ul>

                                
                                  
                        </div>
                                @endforeach
                               
                                
                     </li>
                       
                
        
        <hr>
        <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <h3 class="float-right">{{$totalPrice}}</h3>
                        </div>
                </div>
                
        <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <a type="button" href="{{route('checkout')}}" class="btn btn-laeg-i-kurv-knap text-light btn float-right">CheckOut</a>
                        </div>
                </div>
        @else
        <div class="row">
                        <h2>No Items in Cart</h2>
                </div>   
        @endif

</div>        
@endsection