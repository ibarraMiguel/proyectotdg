<?php
session_start();

//connect to database
$db=mysqli_connect("localhost","root","","proyectotdg");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<hgroup>
            <h1 class="site-title" style="text-align: center; color: green;">Home</h1><br>
          </hgroup>
  <div class="container">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav center">
          <li><a href="login.php">Iniciar Sesión</a></li>
          <li><a href="register.php">Registrarse</a></li>
          <!--<li><a href="logout.php">Cerrar Sesión</a></li>-->
        </ul>
      </div>
    </div>
  </nav>

  <main class="main-content">
  <div class="col-md-6 col-md-offset-4">
  <?php
    if(isset($_SESSION['message'])) {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
          unset($_SESSION['message']);
    }
    ?>

     <h1>Bienvenido</h1>
     <div>
       <h4>Trabajo de proyecto de grado realizado para el curso de Electiva III</h4>
       </div>
          <!--<a href="logout.php">Cerrar Sesión</a>-->
      </div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <footer>
        Powered by <i>Luis Miguel Ibarra Cano</i>
      </footer>


  </main>
    

</div>  
</body>
</html>
