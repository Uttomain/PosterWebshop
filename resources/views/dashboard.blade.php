@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="panel-body">
                         <a href="/posts/create" class="btn btn-success">Create Post</a>
                         <h3>Mine Blog Opslag</h3>
                         @if(count($posts) > 0 )
                            <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            
                            @foreach ($posts as $post)
                                <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                    
                                {{Form::hidden('_method', 'DELETE')}}
                                                    
                                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")'])}}
                                                
                                {!!Form::close()!!}</td>
                                </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts.</p> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5 mx-auto" style="width: 800px;">
            <div class="card-header">
              <h5>Købs Historik </h5>
            </div>
    @foreach($orders as $order)
      <div class="card-body">                
      <ul class="list-group">
                    @foreach($order->cart->items as $item)
                     <li class="list-group-item">                     
                    {{$item['item']['title']}}  {{$item['qty']}}
                    <span class="badge">{{$item['price']}}</span>  
                    </li> 
                    @endforeach
                </ul>
                <div class="card-footer">
                   <b> Total pris:</b> {{$order->cart->totalPrice}}
                  </div>
        </div>
    @endforeach
      </div>
</div>
@endsection
