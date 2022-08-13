@extends('layout.master')


@extends('layout.nav')


@section('content')

<section class="mt-5" >
    <div class="container">
       
        <h2 style="text-align: center;">Order Detail Table</h2>
        @if (session()->has('success'))
                    <div class="alert alert-danger" style="text-align: center;">
                        {{session('success')}}
                    </div>
                @endif
        
        <table class="table table-striped" style="margin-top: 4%;">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>          
                    <th>Price</th>
                    <th>Total_Quantity</th>
                    <th>Total_Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            @php $total_price = 0; @endphp
            @foreach ($cart as $c)
            @php
                        
                        $total_price= $c->total_quantity*$c->product->price;
            @endphp
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->product->name}}</td>           
                <td>{{$c->product->price.'ကျပ်'}}</td>
                <td>{{$c->total_quantity}}</td>
                <td>{{$total_price}}</td>
                <td>{{$c->cart_date}}</td>
            </tr>
            @endforeach
            
        </table>
       

        <h2>Table</h2>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>TableNumber</th>
                    <th>Checkout</th>
                </tr>
            </thead>
            @foreach ($table as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->tableNumber}}</td>
                    <td>{{$t->total_price}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</section>

@endsection

