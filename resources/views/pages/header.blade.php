

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">

<script src="public/js/script.js"></script>
<style>
.search{
  border-bottom: 1px solid #27ae60;
  }
</style>
</head>


</body>
</html>

<header>

  
  <div class="header-2">

    
    
    <form  action="{{url('/search')}}" method="get">
      @csrf
      <input class="search"  type="text" name="search" placeholder="Search" />
    </form>

    


      <div id="menu-bar" class="fas fa-bars"></div>

      <nav class="navbar">
          <a href="{{'/'}}">Home</a>
          <a href="{{url('products')}}">product</a>
          <a href="{{url('show_cart')}}">Cart</a>
          <a href="{{url('show_order')}}">Orders</a>

        

          
      </nav>

      
      

      <div >
        @if (Route::has('login'))

               @auth
               
                <x-app-layout>

              </x-app-layout>                 



               @else
                
                  <a class="btn btn-primary" href="{{ route('login') }}" id='l'>Login</a>
                  <a class="btn btn-success" href="{{ route('register') }}">Register</a>
              
               @endauth
               @endif
      </div>



  </div>
<div>
  @yield('content')

</div>

</header>
