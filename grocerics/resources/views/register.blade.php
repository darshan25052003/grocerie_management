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
  background-image: url("https://pixelz.cc/wp-content/uploads/2018/08/healthy-groceries-uhd-4k-wallpaper.jpg");


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
<script type="text/javascript">
 
 function togglePassword(el){
 
  // Checked State
  var checked = el.checked;

  if(checked){
   // Changing type attribute
   document.getElementById("password").type = 'text';

   // Change the Text
   document.getElementById("toggleText").textContent= "Hide";
  }else{
   // Changing type attribute
   document.getElementById("password").type = 'password';

   // Change the Text
   document.getElementById("toggleText").textContent= "Show";
  }
 }
  function togglepassword_repeat(el){
 
 // Checked State
 var checked = el.checked;

 if(checked){
  // Changing type attribute
  document.getElementById("password_repeat").type = 'text';

  // Change the Text
  document.getElementById("toggleText1").textContent= "Hide";
 }else{
  // Changing type attribute
  document.getElementById("password_repeat").type = 'password';

  // Change the Text
  document.getElementById("toggleText1").textContent= "Show";
 }
  }
 
</script>
</head>
<body>
<a style="color:white;float:right;" href="/login"><button class="btn btn-info">log in</button></a>
<br><br><br><br>

<div class="bg-img">

  <form action="/user_create" method="post" class="container">
  @csrf
    <h1>Register</h1>
@if(count($errors) > 0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
              <li style="color:red">{{ $error }}</li>
             
            @endforeach
        </ul>
    </div>
@endif
    <label for="username"><b>username</b></label>
    <input type="text" placeholder="Enter username" name="username" >

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password">
    <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'>&nbsp; <span id='toggleText'>Show</span></td>
    <br><br>
    <label for="password_repeat"><b>Password Repeat</b></label>
    <input type="password" placeholder="Enter Repeat Password" name="password_repeat" id="password_repeat">
    <input type='checkbox' id='toggle' value='0' onchange='togglepassword_repeat(this);'>&nbsp; <span id='toggleText1'>Show</span></td>
    <br><br>
    <button type="submit" class="btn">register</button>
  </form>
</div>


</body>
</html>

