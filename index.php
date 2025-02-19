
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">

    <title>Party Cadre Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</head>


<style>
#shadowbox1 {
           border: 1px solid grey;
           padding: 20px;
           /*box-shadow: 15px 10px 18px gray;*/
           background: white;
         }

 
 
  .btn-primary {
  color: #fff;
  background-color: #3498db;
  border-color: #3498db;
}
.btn-primary:hover {
  color: #fff;
  background-color: #8F2D56;
  border-color: #8F2D56;
}

body {
  background-image: url('images/design2.jpg');
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    backdrop-filter: blur(8px);

    margin: 0;
    padding: 0;
    height: 100vh; /* 100% of the viewport height */
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0;

    
}

  
</style>


<body>

<div class="container">
<center><img src="images/logo-white.png" width=50%></center><br>
<div id="shadowbox1">
<center><h3><span class="badge">Party Cadre Management</span></h3></center>
  <!-- h4 class="display-4">Hi there!</h4-->
  <!--p class="lead">Welcome to Election Data Management System!</p-->
  <hr class="my-4">
  <p  class="lead"><b>Hi there! Please login to continue..</b></p>
 
  <div class="row">
  <div class="col-6">
  <form action="login_process.php" method="POST">
  <!--label>Email: </label><input type="email" name="user_email" placeholder="Enter your email ID" class="form-control" required /> <br /-->
  <label>Username: </label><input type="text" name="user_name" placeholder="Enter your Username" class="form-control" required /> <br />
  <label>Password: </label><input type="password" name="user_password" placeholder="Enter your password" class="form-control" required /> <br />
  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
</div>
<div class="col-6">
 <center> <img src="images/congress_logo.jpeg" width=50%></center>
</div>
</div>
  <!--
  <a class="btn btn-primary btn-lg" href="ramnad.php" role="button">Ramnad</a>
  <a class="btn btn-primary btn-lg" href="thiruvanandhapuram.php" role="button">Thiruvananthapuram</a>
-->
</div>
</div>
</body>
</html>