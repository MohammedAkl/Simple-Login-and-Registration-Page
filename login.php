
<!DOCTYPE html>
<html>
<head>
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
  border-radius: 100px;
  font-size: 16px;
  background-color: white;
  margin: auto;

}
</style>



	<title>Form</title>
</head>
<body>
  <?php
session_start();
  if (isset($_POST['submit'])){	
	// Change next line
	// Change the database info according your database's info "name and password"
    $conn=mysqli_connect('localhost','root','','registration') or die(mysql_error());
    mysqli_select_db($conn,'registration');
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);  
    $password = md5($password);  

  if ($email!="&&$password!=") {
    $sql = "SELECT * FROM user WHERE email='".$email."' AND password='".$password."'";
    $result = mysqli_query($conn, $sql);
    if ($result== false) {
    echo "error while executing";

    }
    else
    $row = mysqli_fetch_row($result);
  if ($row==true) {
    $_SESSION['email']=$email;

      header('location:welcome.php');
  }
  else
    {

  $message = "WRONG PASSWORD OR EMAIL";
echo "<script type='text/javascript'>alert('$message');</script>";
    }

   
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
  <div class="container">

<form name="form" action="" class="form-group" method="Post">
  <h1 class="text-primary">Login</h1>

    <p>
                 <label class="text-info" for="Email">Email:</label>
                 <input type="text" class="form-control" name="email" placeholder="Your Email" >
                 <label class="text-info"for="Password">Password:</label>
                 <input type="Password" class="form-control" name="password" placeholder="Your Password" pattern=".{5,30}"    title="5 to 30">
    </p>

    <button name="submit" type="submit" value="Submit" class="btn btn-primary" onclick="return validateForm()">Login</button>
  </form>


		<form action="Register.php"  method="Post">
      <p>
		            <h5 class="text-danger">Have not an account ? </h5>
      		      <button class="btn btn-primary" >Register</button>
  </form>
      </p>
</div>

</body>
</html>
