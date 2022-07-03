@extends('admin.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    

   <style type="text/css">
    .img_size{
        width: 50px;
        height: 50px;
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

                <table class="table">
                    <tr>
                        <td>product title</td>
                        <td>product description</td>
                        <td>product basic catagory</td>
                        <td>product sub catagory</td>
                        <td>product size</td>
                        <td>product price</td>
                        <td>product discount_price</td>
                        <td>product image</td>
                        <td>Delete</td>
                        <td>Edit</td>

                    </tr>
                    
                    @foreach($product as $products)
                    <tr> 
                        <td>{{$products->title}}</td>
                        <td>{{$products->description}}</td>
                        <td>{{$products->category_nameB}}</td>
                        <td>{{$products->category_nameS}}</td>
                        <td>{{$products->size}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->discount_price}}</td>
                        <td><img class="img_size" src="/product/{{$products->image}}"></td> 


                              

                            <td>
                                <form action="/delete_product/{{ $products->id }}" method="post">
                                   @csrf
                                  @method ('delete')
                                  <button type="submit" onclick="return confirm('Are you sure you want to delete the category?')" class="btn btn-outline-dark">Delete</button> 
                               </form>
                            </td>
                            <td>
                                <a class="btn btn-outline-dark" href="{{url('update_product',$products->id)}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                      
                    
                </table>
            </div>
        </div>
        {!!$product->withQueryString()->links()!!}
</body>
</html>
@endsection