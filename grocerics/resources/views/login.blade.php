<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("https://freepngimg.com/thumb/grocery/41624-7-groceries-hd-download-hd-png.png");
  min-height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</head>

<body>

<a style="color:white;float:right;" href="/register"><button class="btn btn-info">register</button></a>
<br><br><br><br>
<div class="bg-img">

  <form action="/show" method="post" class="container">
  @csrf
    

<h2>Login Form</h2>
@if(session()->get('status'))
<div style="color:lime">
            {{session()->get('status')}}
            </div>
@endif

@if(session()->get('msg'))
<div style="color:red">
            {{session()->get('msg')}}
            </div>
@endif
           
            <br><br>
            @if(count($errors) > 0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
              
            @endforeach
        </ul>
    </div>
@endif
    <label for="text"><b>username</b></label>
    <input type="text" placeholder="Enter username" name="username" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" >
    <input type="checkbox" onclick="myFunction()">Show Password
<br>
<br>
    <button type="submit" class="btn">Login</button>
  </form>
  
</div>


</body>
</html>
