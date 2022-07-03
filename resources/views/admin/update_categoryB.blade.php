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
    

      @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss='alert'alert-hidden='true'>X</button>
            {{session()->get('message')}}
        </div>
      @endif

        <form action="{{url('/update_category_nameB_confirm',$dataB->id)}}"method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Changing basice category :</label>
          <input  type="text" value="{{$dataB->category_nameB}}" name="category_nameB" class="form-control" id="formGroupExampleInput" placeholder="Add main category here">

        
        <input style="margin-top: 15px" type="submit"value="Update basice category"class="btn btn-outline-dark">  
    
         </div>
         </form>

                    
        
    
  </body>
</html>

@endsection
