
@extends('layout.master')
@section('style')
<style>
    li{
        margin: 1%;
        padding-right: 3%;
    }
    a:hover{
        border-bottom: 1px solid;
    }
    h3{
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }
    body{
            margin: 0;
            padding: 0;
        }
        .wapper{
            width: 40%;
            height: auto;
            margin-top: 10%;
            margin-left: 28%;
            background-color: antiquewhite; 
        }
</style>
@endsection
    

@extends('layout.nav')

    {{-- content --}}
    @auth
    @section('content')
    
    <div >
        <div class="container" >
            <div class="pt-5 main" >
                <h3> <b>စားပွဲ နံပါတ်</b> </h3>
            <div style="margin-left:30%; margin-top:5%;">
                @for ($i = 1; $i <=5; $i++)
                <a href="{{url('/table/'.$i)}}" class="btn btn-primary btn-lg m-3 p-4">{{$i}}</a>
                @endfor
            </div>
                
                <br>
                <div class="container" style="text-align: center; margin-left:10%;">
                    <div style="width: 80%;">
                        <div class="row">
                            <div class="col">
                                <h1>Combined</h1>
                                @if (session()->has('success'))
                                    <div class="alert alert-danger" style="text-align: center;">
                                        {{session('success')}}
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger" style="text-align: center;">
                                        {{session('error')}}
                                    </div>
                                @endif
                                <form action="{{url('/maxtable')}}" method="POST">
                                    @csrf
                                    <div class="form-control" style="background-color:chartreuse;">
                                        <p id="show"></p>
                                        <div class="form-floating">
                                            
                                            <input type="text" class="form-control" name="t" id="table" >
                                            <label for="t">TableName</label>
                                        </div>
                                        <div class="form-floating mt-4">
                                            <input type="text" class="form-control" name="tt" id="ctable" >
                                            <label for="tt">TableName</label>
                                        </div>
                                       <div>
                                            <input type="submit" value="JOIN" class="btn btn-primary mt-3 form-control">
                                       </div>
                                    </div>
                                </form>
                                
                            </div>
                            <div class="col " style="margin-left:10%;">
                                <h1>Split</h1>
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>TableJoin</th>
                                           
                                            <th>Split</th>
                                        </tr>
                                    </thead>
                                    
                                    
                                        @foreach ($maxtable as $m)
                                        <tr>
                                            <td>{{$m->id}}</td>
                                            <td>
                                            <div>
                                                <a href="" class="btn btn-sm btn-primary disabled">{{$m->table}}</a>
                                                {{" + "}}
                                                <a href="" class="btn btn-sm btn-primary disabled">{{$m->jointable}}</a>
                                            </div>
                                            </td>
                                            
                                            <td>
                                                <a href="{{url('/table/'.$m->id.'/'.$m->table.'/jointable/'.$m->jointable)}}" class="btn btn-sm btn-success">Detail</a>

                                                <a href="{{url('/delete/'.$m->id)}}" class="btn btn-sm btn-danger">Split</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                </table>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>

    <script>
        let t = document.getElementById('table');
        let tt = document.getElementById('ctable');
        let show = document.getElementById('show');
        let table = parseInt(t.value);
        let ctable = parseInt(tt.value);
        let result = table+ctable;
        function myfun(){  
            show.innerText =`Table ${table} Join With ${ctable}.`;     
            t.value = '';    
            tt.value = ''; 
        }
    </script>
    @endsection
    @endauth

    @guest
        @section('content')
        <div class="wapper shadow p-2 mb-3 bg-body rounded">
        
            
            @if (session()->has('error'))
            <div class="alert alert-danger" style="text-align: center;">
                {{session('error')}}
            </div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-danger" style="text-align: center;">
                {{session('success')}}
            </div>
            @endif
           
            <h3 class="p-1" style="text-align: center;">Login</h3>
            <div class="p-4">
                <form action="{{url('/login')}}" method="POST">
                    @csrf
                    <div class="col-auto">
                        <label for="name" >Employee Name</label><br><br>
                        <input type="text" class="form-control" name="name"><br><br>
                    </div>
                    <div class="col-auto">
                        <label for="password" >Password</label><br><br>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <br>    
                    <div>
                        <input type="submit" name="login"  class="btn btn-primary form-control" value="Login">
                    </div>

                </form>
            </div>
                
            
        </div>
        @endsection
    @endguest


