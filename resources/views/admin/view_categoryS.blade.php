
@extends('admin.layout')

@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss='alert'alert-hidden='true'>X</button>
    {{session()->get('message')}}
</div>
@endif

<div class='div_center'>

  <form action="{{url('/add_categoryS')}}" mathod='get'>
    @csrf
     <div class="mb-3">
      <label for="formGroupExampleInput2" class="form-label">Add sub category :</label>
      <input type="text" name="categoryS" class="form-control" id="formGroupExampleInput2" placeholder="Add subcategory here">
    </div> 
    <input  type="submit"class="btn btn-outline-dark"name="
    submit"value="Add Catagory">

</form>

<hr width="1110px" style="margin-top: 100px">

</div>


<a style="margin-left: 400px ;margin-top: 50px" class="btn btn-outline-dark" href="{{url('update_sub')}}">Edit or delete the sub category</a>
        

@endsection