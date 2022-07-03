@extends('pages.header')

@section('content')
<!DOCTYPE html>
<html>
    <head>

<style>
   #b{
        background:var(--green);
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border-radius: 12px;
        margin-left: 10px;
        margin-top:25px;
        height: 30px;
        width: 60px;

    }

    #b:hover {
    background-color: #2c2c54; 
    color: rgb(255, 255, 255);

    
}

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

      
        label{
           font-size: 12px;
        } 
       .f1{
        margin-left: 10px;
        margin-top:25px;


       }
       .f2{
       margin-left: 10px;
        margin-top:25px;
        

       } 
       

</style>
    </head>
    <body>
       
    </body>
    </html>
    @if(count($product)=="0")
    <div class="col-md-12" align="center">

        <h1 align="center" style="margin:20px">
          No
          <b style="color:red"> products</b>
          found  </h1>
       

          @else
       
        <div class="sub" >
            
            <form class="sub_f" action="{{url('/sub3')}}" mathod='get'>
        

            <div class="f1">
                <h2>Shop by :</h2>

                <input type="checkbox" name='shoes' value="shoes" >
                <label class="form-check-label" for="flexCheckDefault">
                    shoes              
                </label>
        
                <input type="checkbox" name='coats' value="coats" >
        
                <label class="form-check-label" for="flexCheckDefault">
                    coats              
                </label>
        
                <input type="checkbox" name='pants' value="pants" >
        
                <label class="form-check-label" for="flexCheckDefault">
                    pants              
                </label>
        
                <input type="checkbox" name='tshirts' value="tshirts" >
        
                <label class="form-check-label" for="flexCheckDefault">
                    tshirts              
                </label>
        
                <input type="checkbox" name='bags' value="bags" >
        
                <label class="form-check-label" for="flexCheckDefault">
                    bags              
                </label>
            </div>
                <div class="f2">
                <h2>Choose the size :</h2>

                <input type="checkbox" name='S' value="S" >
        
                <label class="form-check-label" for="flexCheckDefault">
                    S              
                </label>
    
                <input type="checkbox" name='X' value="X" >
            
                <label class="form-check-label" for="flexCheckDefault">
                    X             
                </label>
    
                <input type="checkbox" name='L' value="L" >
            
                <label class="form-check-label" for="flexCheckDefault">
                    L           
                </label>
    
                <input type="checkbox" name='XL' value="XL" >
            
                <label class="form-check-label" for="flexCheckDefault">
                    XL          
                </label>
    
                <input type="checkbox" name='M' value="M" >
            
                <label class="form-check-label" for="flexCheckDefault">
                    M            
                </label>
            </div>
               
                

                    <input id="b"   type="submit" value="Find">
                
            
            
         
           
            </form> 

         </div>
        





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
         @endif
   


</section>

@endsection