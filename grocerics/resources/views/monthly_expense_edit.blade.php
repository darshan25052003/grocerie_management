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
<h2>edit monthly expense  </h2>
  <a style="color:white;float:left;" href="/monthly_expense"><button class="btn btn-primary">back</button></a>
<br>
<br>
<br>
  @if(count($errors) > 0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="/me_update/{{$monthly_expenses['id']}}" method="post">
  @csrf
    <div class="form-group">
      <label for="expenseName"> expense name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter price" name="expenseName" value="{{$monthly_expenses['expenseName']}}">
    </div>
    <div class="form-group">
      <label for="expensePrice">expense price:</label>
      <input type="text" class="form-control" id="price" placeholder="Enter description" name="expensePrice" value="{{$monthly_expenses['expensePrice']}}">
    </div>
  

    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</body>
</html>
@endsection
