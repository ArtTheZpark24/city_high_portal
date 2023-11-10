@include('partials.header')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light dash-nav">
    <div class="container-fluid">
     
        <h1><a href="" class="navbar-brand">Student portal</a></h1>
      
        </div>    
        <div class="dropdown">
          <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           {{ $firstname }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <form action="{{route('logout') }}" method="POST">
                @csrf
            <button type="submit" class="btn border  ml-5 btn-logout  ">
             
              <i class="fa-light fa-arrow-right-from-bracket"></i> Log out</button>
        </form>
            </li>
          </ul>
        </div>
      
        
   
      
    </nav> 
    <div class="container-fluid">
      
    </div>
 
</body>
</html>