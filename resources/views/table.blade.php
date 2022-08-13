@extends('layout.master')


@extends('layout.nav')


@section('content')

<section class="mt-5" >
    <div class="container">
        <h1>Table{{$slug}}</h1>
        <h2 style="text-align: center;">Food Menu</h2>
        @if (session()->has('success'))
                    <div class="alert alert-danger" style="text-align: center;">
                        {{session('success')}}
                    </div>
                @endif
        <div class="row " style="margin-top:7%;">
            <div class="col" >
                <div style="width: 90%;">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Option</th>
                            </tr>
                           
                          </thead>
                        @foreach ($products as $p)
                            
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->price.'ကျပ်'}}</td>
                            <td>
                                <a href="{{url('/order/'.$p->id)}}" class="btn btn-sm btn-warning">Order</a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col">
                
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                           <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Total_Quantity</th>
                            <th>Action</th>
                            <th></th>
                        </tr>

                      </thead>

                      @php $total_price = 0; @endphp
                      @foreach ($orders as $r)
                      @php
                        
                        $total_price+= $r->total_quantity*$r->product->price;
                        @endphp
                      <tr>
                        <td>{{$r->id}}</td>
                        <td>{{$r->product->name}}</td>
                        <td>{{$r->product->price}}</td>
                        <td>{{$r->total_quantity}}</td>
                        <td>
                            <a href="{{url('/remove-quantity/'.$r->id)}}" class="btn btn-sm btn-warning">-</a>
                            <a href="{{url('/add-quantity/'.$r->id)}}" class="btn btn-sm btn-success">+</a>
                        </td>
                      </tr>

                      @endforeach
                      
                      <tr>
                        <td colspan="6">
                            <span class="float-right" style="float: right;">
                                <span>Total Price : <b>{{$total_price}}</b></span>
                                <a href="{{url('/checkout/'.$total_price.'/'.$slug)}}" class="btn btn-primary">Checkout</a>
                            </span>
                        </td>
                    </tr>
                        
                </table>
               
            </div>
        </div>
       
    </div>
</section>

@endsection

