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
  <h2>add catogery </h2>
  <a style="color:white;float:left;" href="/catogery"><button class="btn btn-primary">back</button></a>
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
  <form action="/create" method="post">
  @csrf
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="catogeryName" >
    </div>
    <div class="form-group">
            <label for="status">Choose a status:</label>
            <select id="status" name="catogeryStatus" class="form-control">
            <option value="" > -- Select One --</option>
            <option value="true">true</option>
            <option value="false">false</option>
            </select>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</body>
</html>
@endsection
