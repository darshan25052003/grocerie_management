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
<h2>edit product  </h2>
  <a style="color:white;float:left;" href="/product"><button class="btn btn-primary">back</button></a>
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
  <form action="/p_update/{{$products['id']}}" method="post">
  @csrf
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="productName" value="{{$products['productName']}}">
    </div>
   
    <div class="form-group">
            <label for="status">Choose a status:</label>
            <select id="status" name="productStatus" class="form-control">
            <option value="" disabled> -- Select One --</option>
            <option value="true" {{ $products->productStatus== 'true' ? 'selected':'' }}>true</option>
            <option value="false" {{ $products->productStatus == 'false' ? 'selected':'' }}>false</option>
            </select>
    </div>
    <div class="form-group">
      <label for="name">price:</label>
      <input type="text" class="form-control" id="price" placeholder="Enter price" name="productPrice" value="{{$products['productPrice']}}">
    </div>
    <div class="form-group">
      <label for="name">description:</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="productDescription" value="{{$products['productDescription']}}">
    </div>
    <div class="form-group">
      <label for="name">catogery:</label>

      <select name="catogery" class="form-control" >
            <option value="" disabled> -- Select One --</option>
            
            @foreach($catogerys as $catogery)
            <option value="{{ $catogery->id }}" {{ $catogery->id == $products['catogery'] ? 'selected':'' }}>
      
                    {{ $catogery->catogeryName }}
                </option>
            @endforeach
        </select>
     

    </div>

    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</body>
</html>
@endsection
