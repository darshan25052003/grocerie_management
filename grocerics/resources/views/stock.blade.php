
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
  <h2>stock page</h2>

  <a style="color:white;float:right;" href="s_add"><button class="btn btn-primary">add new stock</button></a>
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
        <th> stock name</th>
        <th>avaliable_quantity</th>
        <th>action</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($stocks as $stock)
      <tr>
        <td>{{$stock['id']}}</td>
        <td>{{$stock['StockName']}}</td>
        <td>{{$stock['avaliable_quantity']}}</td>

        <td>
        <a style="color:white" href="s_edit/{{$stock['id']}}"><button class="btn btn-primary">edit</button></a>
        <a onclick=" return confirm('Are you sure?')" style="color:white" href="s_delete/{{$stock['id']}}"><button class="btn btn-danger">delete</button></a>
        
        </td>
       
      </tr>
      @endforeach
    
      
    </tbody>
  </table>
  <div class="paginate">
  {{ $stocks->links() }}
  </div>
</div>

</body>
</html>
@endsection
