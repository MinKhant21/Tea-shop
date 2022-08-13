
    <nav class="navbar navbar-expand-lg f"  style="background-color:yellow;">
        <div class="container p-3">
            <a class="navbar-brand text-dark" href="{{url('/')}}">Tea-Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">

                 
                    <li class="nav-item">
                        @auth
                        <a class="nav-link text-dark" href="{{url('/ordertable')}}">ORDER</a>
                        @endauth
                    </li>
                    
                    
                    <li class="nav-item ">
                  
                                @auth
                                <a href="{{url('/logout')}}" class="dropdown-item"">Logout</a>
                                @endauth
                                
                        
                    </li>
                
                       
                   
                </ul>
            </div>
        </div>
    </nav>
