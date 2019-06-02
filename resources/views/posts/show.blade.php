@extends('layouts.app')

@section('content')
<div class="container-fluid pb-5" style="background-color:#E2E2E2; height: 100% ; ">
        <div class="container"> 
            <h1 class="pt-4"> {{$post->title}}  </h1>
        <hr class="mb-3">

 
 <div class="card mt-2 mb-5 post-card-full ml-auto mr-auto">
        <div class="row">       
            
            <div class="col-md-12 col-sm-12">               
              <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
            </div>

            <div class="col-md-12 col-sm-12 mt-2"> 
                    <div class="row  p-3"> 
                    <div class="col-md-2">
                        <div class="round-avatar">
                            <div class="first-letter text-light text-center">
                                   <h2> {{$post->user->name[0]}} </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 post-info-full ">
                        <h3 class="mb-0"><b>{{$post->user->name}}</b></h3>                  
                        <div class="mb-0">Written on {{$post->created_at}}
                         
                          @auth 
                          @if(Auth::user()->id == $post->user_id)                          
                  
                           {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'btn float-right pt-0'])!!}
                           {{Form::hidden('_method', 'DELETE')}}
                           {{Form::submit('delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")' ])}}
                           {!!Form::close()!!}

                           <a href="/posts/{{$post->id}}/edit" class="btn btn-edit btn-light float-right">Edit</a>
                          @endif
                      @endauth

                        </div>
                    </div>
                    
                    <div class="pl-3 mt-2 post-body-text">
                            {!!$post->body!!}
                    </div>
                </div>
                
                </div>
            
        </div>
    
    </div>




    
<hr>
   

</div>
</div>
@endsection

