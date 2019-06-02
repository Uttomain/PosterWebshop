@extends('layouts.admin_dashboard')

@section('content')
<div class="container">

        <h1>Opret Produkt</h1>   

        <p>Opret Produkter</p>

        <hr>
        {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('title', 'Produkt Navn')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Navn'])}}

        {{Form::label('title', 'Pris')}}
        {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => '0'])}}

        {{Form::label('title', 'Kategori')}}
        {{Form::text('category', '', ['class' => 'form-control', 'placeholder' => 'Regular'])}}

        
    </div>
    <div class="form-group">
        {{Form::label('body', 'Beskrivelse')}}
        {{Form::textarea('disc', '', [ 'id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>

    <div class="form-group">
            {{Form::file('product_image')}}
    </div>
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

    {!! Form::close() !!}


</div>
@endsection