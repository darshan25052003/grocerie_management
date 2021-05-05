
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
<div>
<span class="btn btn-info btn-lg float-right"> <i class="fa fa-user icon"></i>  {{$username}} </span>

          </div> 
          <br><br>
  <h2>monthly expense page</h2>

  <a style="color:white;float:right;" href="me_add"><button class="btn btn-primary">add new expense</button></a>
<br>
<br>
 
@if(session('status'))
            <div class="alert alert-success ">
            {{session('status')}}
            </div>
            @endif
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th> expense name</th>
        <th> expense price</th>
      
        <th>action</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($monthly_expenses as $monthly_expense)
      <tr>
        <td>{{$monthly_expense['id']}}</td>
        <td>{{$monthly_expense['expenseName']}}</td>
        <td>{{$monthly_expense['expensePrice']}}</td>
        
        <td>
        <a style="color:white" href="me_edit/{{$monthly_expense['id']}}"><button class="btn btn-primary">edit</button></a>
        <a onclick=" return confirm('Are you sure?')" style="color:white" href="me_delete/{{$monthly_expense['id']}}"><button class="btn btn-danger">delete</button></a>
        
        </td>
       
      </tr>
      @endforeach
    
      
    </tbody>
  </table>
  <div class="paginate">
  {{ $monthly_expenses->links() }}
  </div>
</div>

</body>
</html>
@endsection
