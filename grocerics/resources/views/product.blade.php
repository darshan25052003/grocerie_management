
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
  <h2>product page</h2>

  <a style="color:white;float:right;" href="p_add"><button class="btn btn-primary">add new product</button></a>
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
        <th> product name</th>
        <th> product status</th>
        <th>product price</th>
        <th>product description</th>
        <th>catogery</th>
        <th>action</th>
       
      </tr>
    </thead>
    <tbody>
    
    @foreach($products as $product)
    
      <tr>
        <td>{{$product['id']}}</td>
        <td>{{$product['productName']}}</td>
       <td class="{{ $product->productStatus == 'true' ? 'btn btn-success':'btn btn-danger' }}">{{$product['productStatus']}}</td>
        <td>{{$product['productPrice']}}</td>
        <td>{{$product['productDescription']}}</td>
        <td>{{$product['catogery']}}</td>
        <td>
        <a style="color:white" href="p_edit/{{$product['id']}}"><button class="btn btn-primary">edit</button></a>
        &nbsp;&nbsp;&nbsp;
        <br>
        <a onclick=" return confirm('Are you sure?')" style="color:white" href="p_delete/{{$product['id']}}"><button class="btn btn-danger">delete</button></a>
        
        </td>
       
      </tr>
    
      @endforeach
    
      
    </tbody>
  </table>
  <div class="paginate">
  {{ $products->links() }}
  </div>
</div>

</body>
</html>
@endsection
