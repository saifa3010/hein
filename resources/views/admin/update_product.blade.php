@extends('admin.layout')

@section('content')


<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">

   <style type="text/css">
    .div_center
   {
    text-align:center;
        padding-top:50px;
    }
    .h2_font
  {
    font-size:40px;
    padding-bottom:40px;
  }
  .text_color
{
color:black;
padding-bottom:20px;
}
label
{
 display:inline-block;
 width:200px;
}

.div_design
{
 padding-bottom:15px;
 
}
.i{
  margin-left: 230px;
}
  
</style>
         
  </head>
  <body>
    <div class="container-scroller">
      
      <div class="container-fluid page-body-wrapper">
        

        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss='alert'alert-hidden='true'>X</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h1>Edit Product</h1>
                    <form action="{{url('/update_product_confirm',$product->id)}}"method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                        <div class="div_design"> 
                            <label>Product Title:</label>
                            <input size="50" class="text_color"type="text"name="title"
                            placeholder="Write a title" required='' value="{{$product->title}}">
                            </div>
                            
    
                            <div class="div_design"> 
                             <label>Product description:</label>
                                <input size="50" class="text_color"type="text"name="description"
                                placeholder="Write a description" value="{{$product->description}}">
                                </div>
                                
                                <div class="div_design"> 
                                  <label>Product size:</label>
                                  <select style="width: 29em" class="text_color"type="text" name="size"
                                  placeholder="Write a quantity">
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                    <option>XXL</option>
                                  </select>
                                </div>
             
                
                    <div class="div_design"> 
                    <label>Product price:</label>
                    <input style="width: 29em" class="text_color"type="number"name="price" value="{{$product->price}}">
                    </div>
              
                    <div class="div_design"> 
                    <label>Product discount_price:</label>
                    <input style="width: 29em" class="text_color"type="number"name="discount_price"
                    placeholder="Write a discount_price" value='{{$product->discount_price}}'>
                    </div>
    
                   <div class="div_design"> 
                        <label>Product basic category:</label>
                         <select style="width: 29em" class="text_color" name="category_nameB">
                            <option value=""selected="">Add a basic category here</option>
                            @foreach($categoryB as $categoryB)
                            <option value="{{$categoryB->category_nameB}}">
                                {{$categoryB->category_nameB}}</option>
                            @endforeach
                         </select>
                   </div>  
                  

                   <div class="div_design"> 
                    <label>Product sub category:</label>
                     <select style="width: 29em" class="text_color" name="category_nameS">
                        <option value=""selected="">Add a sub category here</option>
                        @foreach($categoryS as $categoryS)
                        <option value="{{$categoryS->category_nameS}}">
                            {{$categoryS->category_nameS}}</option>
                        @endforeach
                     </select>
               </div>   
                  <table class="i">
                    <tr>
                      <td>
                     
                      <div class=""> 
                        <label>Product Image Here:</label>
                        <input type="file"name="image" value='{{$product->image}}'>
                      </div>
                      </td>
                      <td>
                        <div class="">
                          <label>current product image :</label>
                          <img style="margin: auto" height="100"
                          width="100" src='/product/{{$product->image}}'>

                      </div>
                      
                      </td>

                    </tr>
                   
             
                  </table>
               
    
              
        
                <input type="submit"value="Update Product"class="btn btn-outline-dark">  
    
                </div>
                    </form>

                    
         </div>
    
  </body>
</html>

@endsection
