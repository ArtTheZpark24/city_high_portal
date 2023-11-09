@include('partials.header')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light dash-nav">
    <div class="container-fluid">
     
        <h1><a href="" class="navbar-brand">Student portal</a></h1>
      
        </div>    
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ $firstname }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li class="dropdown-item">
                <form action="{{route('logout') }}" method="POST">
                    @csrf
                <button type="submit" class="btn ml-5 btn-logout ">
                 
                    Log out</button>
            </form>
              </li>
            </ul>
          </li>
      
        
   
      
    </nav> 
    <div class="container-fluid">
      
    </div>
 
</body>
</html>