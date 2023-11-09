@include('partials.header')
        
@auth('student')
@include('dashboard')
@else
<body>
  
   <div class="container-fluid login-container">
    <div class="row">
        <div class="offset-md-4  col-md-4 mt-5 border p-5 rounded-2">

             
    
            
            <h2 class="text-center login-logo">STUDENT PORTAL</h2>
            
            <form action="{{ route('login') }}" method="POST" class="form-group mt-5">
                @csrf

                @if ($errors->any())
                   <div class="error-message">
                 
                        @foreach ($errors->all() as $error )
                        
                        <p class="text-center">{{ $error }}</p>
                            
                        @endforeach
                    
                   </div>
                @endif
                 
                <div class="form-group mt-5">
                    <label for="l-email" class="login-email">Email</label>
                    <input type="email" class="form-control mt-2 email-input" name="l-email" required placeholder="username@gmail.com">
                  
                </div>
                <br>
                <div class="form-group">
                    <label for="l-password" class="login-password">Password</label>
                    <input type="password" class="form-control mt-2 password-input" name="l-password" required placeholder="********">
               
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