
@extends('admin.layout')

@section('content')
<ul>
    <li><h3>* You can delete the category by pressing the delete button.</h3>
    </li>
    <li><h3>* You You can edit the category from the edit button.</li>
  </ul>  
@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss='alert'alert-hidden='true'>X</button>
    {{session()->get('message')}}
</div>
@endif

<table class="table">
  <tr>
      
      <td>Sub catagory</td>
      <td>Delete</td>
      <td>Edit</td>

  </tr>
  
  @foreach($dataS as $dataS)
  <tr> 
     
      <td>{{$dataS->category_nameS}}</td>
      

            

          <td>
              <form action="/delete_categoryS/{{ $dataS->id }}" method="post">
                 @csrf
                @method ('delete')
                <button type="submit" onclick="return confirm('Are you sure you want to delete the category?')" class="btn btn-outline-dark">Delete</button> 
             </form>
          </td>
          <td>
              <a class="btn btn-outline-dark" href="{{url('update_categoryS',$dataS->id)}}">Edit</a>
          </td>
      </tr>
  @endforeach
    
  
</table>

@endsection