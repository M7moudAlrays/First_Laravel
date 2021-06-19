<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> First Project  </title>


    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap"
          rel="stylesheet">
          
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
            crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
      @yield('content')
     

         
         <section>
           <div class="container">
             <div class="row mt-4">
              <div class="col-md-12">
                <h3 class="alert alert-success  rounded "> 
                  <i class="fab fa-accusoft"> </i>  Hello Mr : {{$object -> name}} <br> 
                </h3>
              </div>
              <div class="col-md-6 offset-3">
                <h3 class="alert alert-info rounded"> Your Name is : <span class="text-danger"> {{$name}} </span><br> 
                    age is : <span class="text-danger"> {{$age}} </span><br>
                    Graduated From Faculty Of  <span class="text-danger"> {{$faculty}} </span><br>  
                </h3>
              </div>
             
            </div>  
           </div>
         </section>
        


         <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
            crossorigin="anonymous"></script>

        {{-- <script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
        @yield('scripts') --}}
</body>
</html>
