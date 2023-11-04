@include('partials.header')
        
@auth('student')
@include('dashboard')
@else
<body>
  
   <div class="container-fluid">
    <div class="row">
        <div class="offset-md-4  col-md-4 mt-5 border p-5 rounded-2">

             
    
            
            <h2 class="text-center">Student portal</h2>
            <hr>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                 
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-2" name="l-email" required placeholder="username@gmail.com">
                </div>
                <br>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control mt-2" name="l-password" required placeholder="********">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="form-control btn btn-primary">Log in</button>
                </div>
                
            </form>
            @endauth
        </div>
    </div>
   </div>
</body>

</html>