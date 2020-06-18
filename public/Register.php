<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body {
  background-image: url("bg2.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  text-align: center;
    margin-top: 10px;

}
input[type=text] {
  width: 350px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 10px;
  font-size: 16px;
  background-color: white;
  margin: auto;


}
input[type=password] {
  width: 350px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 10px;
  font-size: 16px;
  background-color: white;
  margin: auto;

}
input[type=email] {
  width: 350px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 10px;
  font-size: 16px;
  background-color: white;
  margin: auto;

}
</style>












  <?php
 
session_start();
  if (isset($_POST['submit'])){
    $conn=mysqli_connect('localhost','root','','registration') or die(mysql_error());
    mysqli_select_db($conn,'registration');
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);  
    $password = md5($password);  
    $username=$_POST['username'];
    $_SESSION['username'] = $username;

    $query = "SELECT * FROM user 
          where email='".$email."' 
          OR username= '".$username."'";


    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
     $message = "Invalid Credentials , $email Or $username already exists. ";
     echo "<script type='text/javascript'>alert('$message');</script>"; 
    }

else{
    $sql = " INSERT INTO user (password,email,username) VALUES ('$password','$email' ,'$username')";
    
  if (!mysqli_query($conn,$sql)) {
  echo 'not inserted';
  }
      header('location:welcome.php');

    echo 'inserted';
    
 }
}
?>

  <script type="text/javascript">
    function ValidateEmail() 
{
  var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var x = document.forms["form"]["email"].value;

 if (re.test(x))
  {
    return (true)
  }
      else{    
        alert("You have entered an invalid email address! ")
        return (false) 
    }
}


  function validateForm() {
    var a =document.forms['form'].email.value 
    var b =document.forms['form'].password.value ;
  if (a === "" || b === "") {
    alert("Please enter all fields");
    return false;
  }
  else {
  if (ValidateEmail())
      return true;
    else
          { 
            return false;
          }
  }
    } 

  

  </script>
<script src="email-validation.js"></script>

<body onload='document.form.email.focus()'>

<div class="container">
	<form name="form" class="form-group" action=""  method="post">
	<h1 class="text-primary">Register</h1>

	<label  class="text-info" for="username"  > User Name </label>
    <p>
	     <input id="username" type="text" name="username" placeholder="UserName" >
    </p>

	<label  class="text-info" for="Email">Email</label>
   <p> 
      <input type="text" name="email" placeholder="Your Email" >
   </p>
<label  class="text-info" for="password">Password</label>
  <p>

	 <input type="password" name="password" placeholder="Your Password" pattern=".{5,30}"    title="5 to 30">
  </p>

<button class="btn btn-primary" name="submit" type="submit" value="submit" onclick="return validateForm();" >Register</button>
</form>
</div>
</body>
</html>
