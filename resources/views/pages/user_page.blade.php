<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive grocery website design tutorial</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        
#i{
        background:var(--green);
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 12px;
        
        
    }

    #i:hover {
    background-color: #2c2c54; 
    color: rgb(255, 255, 255);

    
}
    </style>

</head>
<body>
    

<!-- header section starts  -->
@include('pages.header')
<!-- header section ends -->


  
<!-- home section starts  -->
<section class="home" id="home">

    <div class="image">
        <div class="slideshow-container">

            <div class="mySlides fade">
              <img src="https://cdn.media.amplience.net/i/modanisa/ar-levant-960x350-main-Z3-20220620?fmt=auto" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <img src="https://cdn.media.amplience.net/i/modanisa/ar-levant-eidaladha-960x350xZ3-20220620?fmt=auto" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <img src="https://cdn.media.amplience.net/i/modanisa/ar-shoesbags-960x350xZ3-20220620_1?fmt=auto" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="https://cdn.media.amplience.net/i/modanisa/ar-levant-evening-960x350xZ3-20220620?fmt=auto" style="width:100%">
              </div>
            
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
            
        
    </div>
</section> 



<section class="category" id="category">

    <h1 class="heading">shop by <span>basic category</span></h1>

    <div style="margin-left:400px " class="box-container">

    <form action="{{url('/men')}}" method="get" >
        <div class="box">
            <h3>Men</h3>
            <img src="images/manager.png" alt="">
            <button class="btn" name="men" type="submit" value="Men">shop now</button>
        </div>
    </form>

    <form action="{{url('/women')}}" method="get" >
        <div class="box">
            <h3>Women</h3>
            <img src="images/woman.png" alt="">
            <button class="btn" name="women" type="submit" value="women">shop now</button>
        </div>
    </form>

        
    <form action="{{url('/children')}}" method="get" >
        <div class="box">
            <h3>Children</h3>
            <img src="images/children.png" alt="">
            <button class="btn" name="children" type="submit" value="children">shop now</button>
        </div>
    </form>
    </div>


   

</section>


@include('pages.card')


<h1 class="heading">some <span>products</span></h1>

<section class="product" id="product">

    

    <div class="box-container">
        <?php $count=0 ?>

        @forelse($product as $products)
        <div class="box">
           
            <img src="product/{{$products->image}}" alt="">
            <h3>{{$products->title}}</h3>
            

            @if($products->discount_price !=null)
                   
                   <h6 class="price" style="text-decoration:line-through; color:blue">
                     ${{$products->price}}
                  </h6>
                  <h6 class="price1" style="color:red">
                    ${{$products->discount_price}}
                 </h6>
                  @else
                  <h6 class="price" style="color:red">
                     ${{$products->price}}
                  </h6>

                   @endif
            
            <a style=" " href="{{url('product_details',$products->id)}}"  class="btn info">Product details</a>

         
           

            <form action="{{url('add_cart',$products->id)}}"method='post'>
                @csrf
               <div class="">
                <div class="quantity">
                    <span style="color: blue">quantity : </span>
                    <input name="quantity" type="number" min="1" max="1000" value="1">
                    
                </div>
                  
                  <div class="col-md-4">
                <input   id="i"  type="submit"value="Add To Cart">

                  </div>
                  </div>
            </form>
        </div>
    
        <?php $count +=1 ?>
        @if($count ==12)
        @break
        @endif
        @empty
        <p style="font-size:100px ;margin:auto">No results found!!!</p>
        
       
        @endforelse

       


<!-- home section ends -->

<!-- category section starts  -->



<!-- category section ends -->

<!-- product section starts  -->



<!-- product section ends -->



<!-- footer section starts  -->



<script src="js/script.js"></script>
    
</body>
</html>