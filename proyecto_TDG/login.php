<?php
session_start();


if(isset($_SESSION['username'])) {
  header("location:index.php");
  die();
}

//connect to database
$db=mysqli_connect("localhost","root","","proyectotdg");


    if($db) {
      if(isset($_POST['login_btn'])) {
          $username=mysqli_real_escape_string($db,$_POST['username']);
          $password=mysqli_real_escape_string($db,$_POST['password']);

          $password= md5($password); //Remember we hashed password before storing last time
          $sql="SELECT * FROM usuario_sesion WHERE  usuario='$username' AND clave='$password'";
          echo ($sql);
          $result=mysqli_query($db,$sql);
          
          if($result) {     
            if( mysqli_num_rows($result)>=1) {
                $_SESSION['message']="Has Iniciado Sesión";
                $_SESSION['username']=$username;
                //header("location:index.php");
            } else {
                  $_SESSION['message']="El usuario o la contraseña son incorrectas";
            }
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
      <style>
        input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }

        input[type=password], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }

        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }
      </style>
</head>
<body>

  <div class="container">
    <hgroup>
      <h1 class="site-title" style="text-align: center; color: green;">Iniciar Sesión</h1><br>
    </hgroup>

    <br>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav center">
            <!--<li><a href="login.php">LogIN</a></li>-->
            <li><a href="index.php">Inicio</a></li>
            <li><a href="register.php">Registrarse</a></li>
            <!--<li><a href="logout.php">LogOut</a></li>-->
          </ul>
        </div>
      </div>
    </nav>

  <main class="main-content">
    <div class="col-md-6 col-md-offset-2">
    <?php
        if(isset($_SESSION['message']))
        {
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
    ?>
    <center>
    <form>  <!-- method="POST" action="login.php"
 -->        <input type="text" id="fname" name="username" placeholder="Usuario*">
        <br>
        <input type="password" id="fname" name="password" placeholder="Contraseña*">
        <br>
        <input type="submit" name="login_btn" class="Log In">
      </center>
    </form>
    </div>
  </main>
  </div>
</body>
</html>
