<?php

  session_start();
  

  //connect to database
  $db=mysqli_connect("localhost","root","","proyectotdg");

  if(isset($_POST['register_btn'])) {
      $id_persona = mysqli_real_escape_string($db,$_POST['id_persona']);
      $privilegios = mysqli_real_escape_string($db,$_POST['privilegios']);
      $usuario = mysqli_real_escape_string($db,$_POST['usuario']);
      $clave = mysqli_real_escape_string($db,$_POST['clave']);
      $clave2 = mysqli_real_escape_string($db,$_POST['clave2']);  


      $query = "SELECT * FROM usuario_sesion WHERE usuario = '$usuario'";
      $result=mysqli_query($db,$query);


      if($result) {    
        if(mysqli_num_rows($result) > 0) {                
            echo '<script language="javascript">';
            echo 'alert("Username already exists")';
            echo '</script>';
        }else{
          if($password==$password2) {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO usuario_sesion (id_persona, provilegios, usuario, clave) VALUES ('$id_persona','$provilegios','$usuario', '$clave', '$clave2')"; 
            echo ($sql);
            mysqli_query($db,$sql);  
                  $_SESSION['message']="You are now logged in"; 
                  $_SESSION['username']=$username;
            header("location:login.php");  //redirect home page
          }else{
            $_SESSION['message']="The two password do not match";   
          }
        }
      }
  }

?>



<!DOCTYPE html>
<html lang="es">
  <head>
      <title>Resgister</title>
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
            <h1 class="site-title" style="text-align: center; color: green;">Registrarse</h1><br>
          </hgroup>
        <br>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
          <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav center">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <!-- <li><a href="register.php">SignUp</a></li> -->
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
            <form method="post" action="register.php"><!-- 
              <table>
                 <tr>
                       <td>Username : </td>
                       <td><input type="text" name="username" class="textInput"></td>
                 </tr>
                 <tr>
                       <td>Email : </td>
                       <td><input type="email" name="email" class="textInput"></td>
                 </tr>
                  <tr>
                       <td>Password : </td>
                       <td><input type="password" name="password" class="textInput"></td>
                 </tr>
                  <tr>
                       <td>Password again: </td>
                       <td><input type="password" name="password2" class="textInput"></td>
                 </tr>
                  <tr>
                       <td></td>
                       <td><input type="submit" name="register_btn" class="Register"></td>
                 </tr>
                </table> -->
                (*) Campo obligatorio
                <input type="text" id="fname" name="id_persona" placeholder="Identificación*" class="textInput">
                <select required name="privilegios">
                  <option value="">Selecciona un privilegio*</option>
                  <option value="volvo">Estudiante</option>
                  <option value="saab">option 2</option>
                  <option value="mercedes">option 3</option>
                  <option value="audi">...</option>
                </select>
                <br> 
                <input type="text" id="fname" name="usuario" placeholder="Usuario*" class="textInput">
                <br>
                <input type="password" id="fname" name="clave" placeholder="Contraseña*" class="textInput">
                <br>
                <input type="password" id="fname" name="clave2" placeholder="Ingrese de nuevo la contraseña*" class="textInput">
                <br>
                <input type="submit" name="register_btn" class="Register">

            </form>
          </center>
            </div>

        </main>
    </div>

</body>
</html>




