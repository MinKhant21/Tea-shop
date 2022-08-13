@extends('layout.master')


@extends('layout.nav')


@section('content')

<section class="mt-5" >
    <div class="container">
       
        <h2 style="text-align: center;">Table Detail </h2>
        @if (session()->has('success'))
                    <div class="alert alert-danger" style="text-align: center;">
                        {{session('success')}}
                    </div>
        @endif
       <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>TableNumber</th>
                <th>Price</th>
            </tr>
            
            <tr>
                <td>{{$id}}</td>
                <td>{{$slug.'+'.$jslug}}</td>
                <td>{{$total_price}}</td>
            </tr>
            
       </table>
    </div>
</section>

@endsection

