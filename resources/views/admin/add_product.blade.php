@extends('admin.layout')

@section('content')


<!DOCTYPE html>
<html lang="en">
  <head>
   

   <style type="text/css">
    .div_center
   {
    text-align:center;
        padding-top:40px;
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
  padding: 25px;
}
  
</style>
         
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->

        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss='alert'alert-hidden='true'>X</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h1>Add Product</h1>
                    <form action="{{url('/add_product')}}"method="POST"
                    enctype="multipart/form-data">
                    @csrf
                        <div class="div_design"> 
                            <label>Product Title:</label>
                            <input style="width: 29em" class="text_color"type="text"name="title"
                            placeholder="Write a title" required=''>
                            </div>
    
                            <div class="div_design"> 
                             <label>Product description:</label>
                                <input style="width: 29em" class="text_color"type="text"name="description"
                                placeholder="Write a description">
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
                    <input style="width: 29em" class="text_color"type="number"name="price"
                    placeholder="Write a price">
                    </div>

                   
              
                    <div class="div_design"> 
                    <label>Product discount_price:</label>
                    <input style="width: 29em" class="text_color"type="number"name="discount_price"
                    placeholder="Write a discount_price">
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
                
           
                   <div class="i"> 
                <label>Product Image Here:</label>
                <input type="file"name="image">
              </div>
    
              
        
                <input type="submit"value="Add Product"class="btn btn-outline-dark">  </div>
    
               
                    </form>

                    
         </div>
   
  </body>
</html>

@endsection