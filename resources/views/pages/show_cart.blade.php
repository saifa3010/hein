<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive grocery website design tutorial</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .customers{

            margin: auto;
            width: 50%;
            border-collapse: collapse;
            text-align: center;
            font-size: 20px;
            overflow-x: auto;
        }
        .customers tr:nth-child(even){background-color: #f2f2f2;}

        .customers tr:hover {background-color: #ddd;}

        table,tr,th{
            border: 1px solid #ddd;
            padding: 8px;
            
        }
        

        .td_dogs{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }
        .img_deg
      {
          height:100px;
          width:100px;
      }

      .alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    font-size: 20px;
    width: 800px;
    margin: auto;
    border-radius: 12px;


}
.x{
    color: red;
    padding-right: 20px;
}
     




    </style>
</head>
<body>

<!-- header section starts  -->
@include('pages.header')
<!-- header section ends -->


@if(count($cart)=="0")
        <div class="col-md-12" align="center">

            <h1 align="center" style="margin:20px">
                Your 
              <b style="color:red"> cart</b>
              is empty  </h1>

              <a class="btn" href="{{url('products')}}" >Products</a>


@else

@if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss='alert'alert-hidden='true'><h2 class="x">X</h2></button>
                    {{session()->get('message')}}
                </div>
                @endif

    

    <div class="customers">
        
        <table>
            <?php $total=0 ?>
            <tr>
                <th class="td_dogs">Product title</th>
                <th class="td_dogs">product quantity</th>
                <th class="td_dogs">product size</th>
                <th class="td_dogs">price</th>
                <th class="td_dogs">Image</th>
                <th class="td_dogs">Action</th>
                </tr>
        @forelse($cart as $cart)

        
        <tr>
        <th>{{$cart->product_title}}</th>
        <th>{{$cart->quantity}}</th>
        <th>{{$cart->size}}</th>
        
        <th>${{$cart->price}}</th>
        <th><img class="img_deg" src="/product/{{$cart->image}}"> </th>
        <td>
            <a class="btn btn-danger" onclick="return confirm('sure?')" href="{{url('/remove_cart',$cart->id)}}"
            >remove product</a>
        </td>
    
        </tr>
        <?php $total=$total + $cart->price ?>

       
        @empty
        <p style="font-size:100px ;margin:auto">There are no products</p>
        <a class="btn" href="{{url('products')}}" >Products</a>

    
        @endforelse
    
        </table>
    
        <div>
        <h3>total=${{$total}}</h3>
        </div>
        <div>
        <a class="btn" href="{{url('user_data')}}" >Confirmation</a>




   



    </div>

    </div>
@endif



    <script src="js/script.js"></script>
        
    </body>
    </html>