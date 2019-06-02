
@extends('layouts.app')

@section('content')
 
<div class="container">

 <div class="row mt-5">
     <div class="col-lg-6 pr-5">
            <img style="width: 100%" class="product-card-show-img" src="/storage/product_images/{{$product->product_image}}">
     </div>
     <div class="col-lg-6 pl-5">
            <h1>{{$product->title}}</h1>
            <h4>{{$product->price}} Kr</h4>
            <hr>
            <p>{!!$product->disc!!}</p>
      
            <p>
              Bemærk!<br>
              Farver kan se en smule andeledes <br>
              ud på det fysiske produkt.</p>
     <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"><button type="button" class="btn btn-laeg-i-kurv-knap btn-lg btn-block text-light"><strong>Tilføj til indkøbskurven</strong></button></a>
            
        </div>
    </div>      

    

</div>
@endsection