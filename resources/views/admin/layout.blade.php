<html>
   <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/headers.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>{{ config('app.name') }}</title>
    <style>
   a{
    border: solid 1px black;
    border-radius: 7px;
    margin: 5px;
    color: hotpink;

   }
a:hover, a:active {
  background-color: rgb(165, 164, 164);
  
}


    </style>
    
   </head>

   <body>
    <header class="p-3 mb-3 border-bottom">
      <div>
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="{{url('/redirect')}}" class="nav-link px-2 link-dark">Dashbord</a></li>
              <li><a href="{{url('/view_categoryB')}}" class="nav-link px-2 link-dark">Basic Categories</a></li>
              <li><a href="{{url('/view_categoryS')}}" class="nav-link px-2 link-dark">Sub Categories</a></li>
              <li><a href="{{url('/view_product')}}" class="nav-link px-2 link-dark">Add products</a></li>
              <li><a href="{{url('/show_product')}}" class="nav-link px-2 link-dark">Show products</a></li>
              <li><a href="{{url('/customer_orders')}}" class="nav-link px-2 link-dark">Customer orders</a></li>
              <li><a href="/" class="nav-link px-2 link-dark">The shop</a></li>




            </ul>
            
              
                <x-app-layout>
    
                </x-app-layout>
            
            </div>
          </div>
        </div>
      </div>
      </header>
  
    <div class="container py-5">

        @yield('content')
   </div>
   </body>
</html>