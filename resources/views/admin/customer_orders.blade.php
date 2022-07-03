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

                

                 <h1>All orders:</h1>
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>product title</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Size</td>
                        <td>Product id</td>
                        <td>User id</td>
                        <td>Payment status</td>
                        <td>Delivery status</td>
                        <td>Order date</td>
                        <td>Product image</td>
                        <td>Determine order status</td>


                    </tr>
                    
                    @foreach($order as $orders)
                    <tr> 
                        <td>{{$orders->name}}</td>
                        <td>{{$orders->email}}</td>
                        <td>{{$orders->phone}}</td>
                        <td>{{$orders->address}}</td>
                        <td>{{$orders->product_title}}</td>
                        <td>{{$orders->quantity}}</td>
                        <td>{{$orders->price}}</td>
                        <td>{{$orders->size}}</td>
                        <td>{{$orders->product_id}}</td>
                        <td>{{$orders->user_id}}</td>
                        <td>{{$orders->payment_status}}</td>
                        <td>{{$orders->delivery_status}}</td>
                        <td>{{$orders->created_at}}</td>
                        
                        <td><img class="img_size" src="/product/{{$orders->image}}"></td> 

                            
                        <td><form action="{{url('/delivered',$orders->id)}}">
                            <select name="delivery_status" style="width: 29em color=black">
                            <option>Under processing</option>
                            <option>Charged</option>
                            <option>Delivered</option>
                            <option>Received</option>
                            <option >The request is cancelled</option>

                            </select> 
                            <input style="margin-top: 20px" onclick="return confirm('Are you sure the status has changed?')" type="submit"value="Status update"class="btn btn-outline-dark">  
                            
                            
                            
                               

                           
                        </form>
                     </td>

                      
                            
                        </tr>
                    @endforeach
                      
                    
                </table>
            </div>
        </div>
        {!!$order->withQueryString()->links()!!}

  </body>
</html>
    
@endsection