@section('content') 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

@extends('sidebar')

<div class="container">
<h2>add expense  </h2>
  <a style="color:white;float:left;" href="/expense"><button class="btn btn-primary">back</button></a>
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
  <form action="/e_create" method="post">
  @csrf
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="expenseName" >
    </div>
    <div class="form-group">
      <label for="status">price:</label>
      <input type="text" class="form-control" id="price" placeholder="Enter price" name="expensePrice" >
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</body>
</html>
@endsection
