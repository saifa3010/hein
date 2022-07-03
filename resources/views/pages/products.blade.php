@extends('pages.header')

@section('content')
<!DOCTYPE html>
<html>
    <head>
        
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
       
      
    </body>
</html>


<section class="product" id="product">

    

    <div class="box-container">

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

        @empty
        <p style="font-size:100px ;margin:auto">No results found!!!</p>
            
   
       
        @endforelse

       
    

         </div>
   
         {!!$product->links()!!}


</section>

@endsection