<!DOCTYPE html>
<html>

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
    margin-top: 100px;

}

</style>




<head>
  <title>HomePage</title>
</head>
<body>

  <form name="Form" action="Login.php"  method="Post">
  <h1 class="text-info">Welcome</h1>
<button class="btn btn-primary" >Login</button>
</form>
  <p>
        <h5 class="text-danger">Don't have an account ? </h5>

    <form action="Register.php"  method="Post">
    <button class="btn btn-primary" >Register</button>
</form>
  </p>
</body>
</html>
