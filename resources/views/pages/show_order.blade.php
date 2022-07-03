<!DOCTYPE html>
<html>
    <head>
        {{-- <base href="/public"> --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>complete responsive grocery website design tutorial</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <style>
        .customers{

            margin: auto;
            width: 70%;
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
        @include('pages.header')

        
@if(count($order)=="0")
<div class="col-md-12" align="center">

    <h1 align="center" style="margin:20px">
        No
      <b style="color:red"> orders</b>  </h1>

      @else

        <div class="customers">
    <table>
    <tr>
    <th class="td_dogs">Product id</th>
    <th class="td_dogs">Date created</th>
    <th class="td_dogs">Product title</th>
    <th class="td_dogs">product quantity</th>
    <th class="td_dogs">product size</th>
    <th class="td_dogs">price</th>
    <th class="td_dogs">Image</th>
    <th class="td_dogs">Delivery status</th>
    <th class="td_dogs">Cancel order</th>



    @foreach($order as $order)

    <tr>
    <th>{{$order->id}}</th>
    <th>{{$order->created_at}}</th>
    <th>{{$order->product_title}}</th>
    <th>{{$order->quantity}}</th>
    <th>{{$order->size}}</th>
    <th>${{$order->price}}</th>
    <th><img class="img_deg" src="/product/{{$order->image}}"> </th>
    <th>{{$order->delivery_status}}</th>
    <td>@if($order->delivery_status != 'Delivered')
    <a class="btn btn-danger" onclick="return confirm('sure?')" href="{{url('/cancel_order',$order->id)}}"
        >Cancel order</a>
    <td>
    @else
    <p>The order has been delivered</p>
    @endif </td>
        @endforeach
</div>
@endif

    </body>
</html>