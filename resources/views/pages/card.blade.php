<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Cards slider</title>
</head>

<body>
  <br>
  <br>
  <h1 class="heading">Offers on <span>men's clothing</span></h1>

  <div class="container">
    <div id="slide-left-container">
      <div class="slide-left">
      </div>
    </div>

    <div id="cards-container">
      <div class="cards">
        <?php $count=0 ?>
        @foreach($product as $products)
@if($products->category_nameB=='men')
        <div class="card">

          <a style=" " href="{{url('product_details',$products->id)}}" ><img src="product/{{$products->image}}" alt="" style="width:100%"></a>
          <div class="container">
            <h4>
              <h2>{{$products->title}} </h2> <br>  <h2 class="price" style="text-decoration:line-through; color:blue">
                ${{$products->price}}   <br>   <h2 class="price1" style="color:red">
                  ${{$products->discount_price}}
               </h2>
             </h2>
            </h4>
          </div>
        </div>
        <?php $count +=1 ?>
        @if($count ==10)
        @break
        @endif
@endif
        @endforeach
        
      </div>
    </div>

    <div id="slide-right-container">
      <div class="slide-right">
      </div>
    </div>

  </div>

  
<div class="image">
  <div class="slideshow-container">

      <a href="{{url('/children')}}" ><img src="https://cdn.media.amplience.net/i/modanisa/ar-kidsbest-960x250xZ3-20220620_1?fmt=auto" style="width:100% "></a>  
      
      
  </div>
</div>
<br>
<br>
<br>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

</body>

</html>