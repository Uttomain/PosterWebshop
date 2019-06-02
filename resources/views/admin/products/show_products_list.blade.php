@extends('../layouts.admin_dashboard')


@section('content')

<h1>Manage Products</h1>
     
<p>vis alle produkter</p>
<hr>

<a href="/products/create" class="btn btn-success mb-4"><b>+</b> Create Product</a>

<table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Product Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col" class="d-flex flex-row-reverse">Edit</th>
          </tr>
        </thead>

        @if(count($products) > 0 )
        @foreach($products as $product)

        <tbody>
          <tr>
            <th scope="row">{{$product->id}}</th>
            <td><img style="max-width: 20px;" src="/storage/product_images/{{$product->product_image}}">  {{$product->title}}</td>
            <td>{!!$product->price!!} Kr</td>
            <td>{{$product->category}}</td>
            
            <td class="d-flex flex-row-reverse"><a href="/products/{{$product->id}}/edit" class="btn-sm btn-secondary">Edit</a></td>
          </tr>
        </tbody>
      @endforeach
    </table>
    </div>
           {{$products->links()}}
        @else
           <p>No products found
        @endif


@endsection