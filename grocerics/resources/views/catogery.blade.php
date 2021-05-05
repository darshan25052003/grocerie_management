
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
@extends('sidebar')
<div class="container">
<div></div>

          <div>
          <span class="btn btn-info btn-lg float-right"> <i class="fa fa-user icon"></i>  {{$username}} </span>
          </div> 
          <br><br>
      <h2>catogry page</h2>

  <a style="color:white;float:right;" href="add"><button class="btn btn-primary">add new catogery</button></a>
<br>
<br>  
           
            @if(session('status'))
            <div class="alert alert-success ">
            {{session('status')}}
            </div>
            @endif
            
            <br>
            <br>
    
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>status</th>
        <th>action</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($catogerys as $catogery)
      <tr>
        <td>{{$catogery['id']}}</td>
        <td>{{$catogery['catogeryName']}}</td>
        <td class="{{ $catogery->catogeryStatus == 'true' ? 'btn btn-success':'btn btn-danger' }}">{{$catogery['catogeryStatus']}}</td>
        <td>
        <a style="color:white" href="edit/{{$catogery['id']}}"><button class="btn btn-primary">edit</button></a>
        <a onclick=" return confirm('Are you sure?')" style="color:white" href="delete/{{$catogery['id']}}"><button class="btn btn-danger">delete</button></a>
        
        </td>
       
      </tr>
      @endforeach
    
      
    </tbody>
  </table>
  <div class="paginate">
  {{ $catogerys->links() }}
  </div>
 
</div>


</body>
</html>
@endsection
