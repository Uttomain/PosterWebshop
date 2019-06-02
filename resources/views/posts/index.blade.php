@extends('layouts.app')

@section('content')
<div class="container-fluid pb-5" style="background-color:#E2E2E2; height: 100% ; ">
<div class="container"> 
    <h1 class="pt-4"> Inspirations Blog </h1>
 <hr class="mb-5">
 

 @if(count($posts) > 0 )
    @foreach($posts as $post)
   
   <div class="card mt-2 mb-5 post-card ml-auto mr-auto p-3">
       <div class="row">
            <div class="col-md-12 col-sm-12"> 
                <div class="row"> 
                <div class="col-md-4">
                    <div class="round-avatar">
                        <div class="first-letter text-light text-center">
                               <h2> {{$post->user->name[0]}} </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 post-info">
                    <h3 class="mb-0"><b>{{$post->user->name}}</b></h3>                  
                    <p>Written on {{$post->created_at}}</p>
                </div>
            </div>
            </div>
            
           <div class="col-md-12 col-sm-12 ">
               <div class="post-title-border mb-1"></div>
                <h3> <a  class="text-secondary" href="/posts/{{$post->id}}">{{$post->title}}</a> </h3>
           <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
           </div>
           
       </div>
   
   </div>  
   
    @endforeach    
     <div class="ml-auto mr-auto">{{$posts->links()}}</div>
 @else
    <div class="card">
        <div class="card-body">
                No posts found
        </div>
    </div>
    
 @endif
</div>
</div>
@endsection