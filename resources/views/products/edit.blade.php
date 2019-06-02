@extends('layouts.admin_dashboard')

@section('content')

        <h1>Edit Product</h1>   

        <p>Opret Produkter</p>

        <hr>
        {!! Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'POST']) !!}

    
    <div class="form-group">
        {{Form::label('title', 'Produkt Navn')}}
        {{Form::text('title', $product->title , ['class' => 'form-control', 'placeholder' => $product->title])}}

        {{Form::label('title', 'Pris')}}
        {{Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => $product->price])}}

        {{Form::label('title', 'Kategori')}}
        {{Form::text('category', $product->category, ['class' => 'form-control', 'placeholder' => $product->category])}}    
    </div>
    <div class="form-group">
        {{Form::label('body', 'Beskrivelse')}}
        {{Form::textarea('disc', $product->disc, [ 'id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => $product->disc])}}
    </div>
    
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

    {!! Form::close() !!}



@endsection