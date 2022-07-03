<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive grocery website design tutorial</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header section starts  -->
@include('pages.header')
<!-- header section ends -->


<div class="col-sm-6col-md-4col-lg-4"style="margin:auto;width:50%;
      padding:30px">

           <div class="img-box"style="padding:30px">
              <img src="product/{{$product->image}} " alt="" width="200px" height="200px">
              <hr>
           </div>
           <div class="detail-box">
              <h1 >
                 {{$product->title}}
              </h1>
              <hr>
              @if($product->discount_price !=null)
             
                <h2 style="color:red">price: ${{$product->price-$product->discount_price}}</h2> 
              
              <hr>
             @else
             
               <h2 style="color:rgb(17, 0, 255)">price: ${{$product->price}}</h2>            
             <hr>

              @endif
             </div>

            <h2>Product Basic Catagory: {{$product->category_nameB}}</h2>
            <hr>
            <h2>Product Sub Catagory: {{$product->category_nameS}}</h2>
            <hr>
            <h2>Product Details: {{$product->description}}</h2>
            <hr>
            <h2>Available Size: {{$product->size}}</h2>
            <hr>

            <form action="{{url('add_cart',$product->id)}}"method='post'>
               @csrf
              <div class="row">
                 
                 <div class="col-md-4">
                    <input class="btn" type="submit"value="Add To Cart">

                 </div>
                 </div>
           </form>

        </div>
     </div>  


<script src="js/script.js"></script>
    
</body>
</html>