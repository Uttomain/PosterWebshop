@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Check Out</h1>
         
            
            <div class="card card-outline-secondary mx-auto" style="width:400px;" >
                <div class="card-body">
                    <h3 class="text-center">Kunde Information</h3>
                    <hr>
                    <form class="form" role="form" action="{{ route('checkout') }}" method="POST" id="checkout-form" autocomplete="off">
                        <div class="form-group">                            
                            <input type="text" class="form-control" id="cc_name" pattern="\w+ \w+.*" title="Fornavn og Efternavn" required="required" name="name" placeholder="Navn">
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="text" class="form-control"   title="First and last name" required="required" name="address" placeholder="Adresse, By, Post nr.">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="cc_name" title="Intast tlf nummer" name="tlfnr" placeholder="Telefon nummer" required="required">
                        </div>
                        {{-- <h3 class="text-center">Betalings Oplysninger</h3>
                    <hr>
                        <div class="form-group">
                            <label for="cc_name">Card Holder's Name</label>
                            <input type="text" class="form-control" id="cc_name" pattern="\w+ \w+.*" title="First and last name" required="required">
                        </div>
                        <div class="form-group">
                            <label>Card Number</label>
                            <input type="text" class="form-control" autocomplete="off" maxlength="20" title="Credit card number" required="">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12">Card Exp. Date</label>
                            <div class="col-md-4">
                                <select class="form-control" name="cc_exp_mo" size="0">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="cc_exp_yr" size="0">
                                    <option>2018</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                    <option>2022</option>
                                </select>
                                <option>2019</option>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="" placeholder="CVC">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-12">Amount</label>
                        </div>
                        <div class="form-inline">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input type="text" class="form-control text-right" id="exampleInputAmount" placeholder="39">
                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                            </div>
                        </div> --}}
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="reset" class="btn btn-default btn-lg btn-block">Fortryd</button>
                            </div>
                            <div class="col-md-6">
                                @csrf
                                <button type="submit" class="btn btn-laeg-i-kurv-knap btn-lg btn-block text-light">Køb Nu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
      

        </div>       
@endsection