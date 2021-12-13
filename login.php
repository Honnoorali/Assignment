
<?php
require "config.php";
if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];

  if(empty($email))
  {
    echo '<script>alert("empty username")</script>';
    die();
  }
  if(empty($password))
  {
    echo '<script>alert("empty password")</script>';
    die();
  }

  $query="select * from Login where email='".$email."'";
  $result=mysqli_query($conn,$query);
  if($result->num_rows<=0)
  {
    echo '<script>alert("Invalid username.....")</script>';
  }
  else
  {
    $row=mysqli_fetch_assoc($result);
    if($password==$row['password'])
    {
      session_start();
      $_SESSION['email']=$email;
      header('Location:frame1.html');
    }
    else
    {
      echo '<script>alert("Invalid username and password")</script>';
    }
  }
}


?>


<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style type="text/css">
  .i{
    opacity: 0.1;
  }

.log{
    position: absolute;top: 350px;left: 650px;
    transform: translate(-50%,-50%);
    background:rgba(0,0,0,.1);
    height: 350px;
    width: 400px;
    padding: 40px;
    box-sizing: border-box;
    box-shadow: 0px 15px 25px rgba(0,0,0,.5);
    border-radius: 10px;
  }

  .log h1{
    margin : 0 0 30px;
    padding: 0;
    color: #03a9f4;
    text-align: center;
    font-size: 32px;
  }

  .log .box{
    position: relative;
  }

  .log .box input{
    width: 100%;
    padding: 10px 0;
    font-size: 15px;
    color: black;
    margin-bottom: 30px;
    border:none;
    border-bottom: 1px solid #fff;
    outline: none;
    background:transparent;

  }

  .log .box label{
    position: absolute;top: 0;left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
  }

  .log .box input:focus ~ label,
  .log .box input:valid ~ label
  {
    top: -17px;
    left: 0;
    color: #03a9f4;
    font-size: 14px;
  }

  .log input[type="submit"]{
    background:transparent
    border:none;
    outline: none;
    color: #fff;
    background: #03a9f4;
    padding: 10px 20px;
    cursor:pointer;
    border-radius: 6px;
    font-weight: bold;
    font-size: 15px;
  }

  .log input[type="submit"]:hover{
    background-color: white;
    color: #03a9f4;
  }

  .h{
    position: absolute;top: 8%;left:30%;
    color: #03a9f4;
    font-weight: 700;
  }

  .btn1{
    position: absolute;top: 425px;left: 700px;
    background:transparent
    border:none;
    width: 100px;
    outline: none;
    color: #03a9f4;
    background: black;
    padding: 10px 20px;
    cursor:pointer;
    border-radius: 6px;
    font-weight: bold;
    font-size: 15px;
  }

  .btn1:hover{
    background-color: #03a9f4;
    color: #fff;
  }
	</style>
</head>

<body>
  <form method="post" action="#">
    <center>
   <!--  <marquee scrollamount="9"  behavior="alternate" direction="up" width="600" height="110">
      <marquee behavior="alternate" direction="right"> -->
        <h1 class="h"><b>ASSIGNMENT EVALUATION</b></h1>
      <!-- </marquee>
    </marquee> -->
  </center>
  <img src="4.jpg" class="i" height="600" width="1420">
    <div class="log">
      <h1><b>ADMIN LOG IN</b></h1>
      <div class="box">
        <input type="email" id="username" name="email" required=""><br>
        <label>Username</label>
      </div>
      <div class="box">
        <input type="password" id="password" name="password" required=""><br>
        <label>Password</label>
      </div>
       <input class="btn" type="submit" name="submit" value="SUBMIT">
    </div>
</form>
<a href="index.html"><input class="btn1" type="button" name="" value="BACK"></a>
</body>
</html>