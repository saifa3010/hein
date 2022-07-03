



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


<div class="container-scroller">
 
  <div class="container-fluid page-body-wrapper">
  
    <div class="main-panel">
        <div class="content-wrapper">

         

            <table class="table">
                <tr>
                    
                    <td>Basic catagory</td>
                    <td>Delete</td>
                    <td>Edit</td>

                </tr>
                
                @foreach($dataB as $dataB)
                <tr> 
                   
                    <td>{{$dataB->category_nameB}}</td>
                    

                          

                        <td>
                            <form action="/delete_categoryB/{{ $dataB->id }}" method="post">
                               @csrf
                              @method ('delete')
                              <button type="submit" onclick="return confirm('Are you sure you want to delete the category?')" class="btn btn-outline-dark">Delete</button> 
                           </form>
                        </td>
                        <td>
                            <a class="btn btn-outline-dark"  href="{{url('update_categoryB',$dataB->id)}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                  
                
            </table>
        </div>
    </div>

@endsection




