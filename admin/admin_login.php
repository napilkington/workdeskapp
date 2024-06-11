<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css_login/style.css">
</head>

<body class="login-page">
  <!-- Login Box -->
  <div class="login-box" style="height: 450px;">
    <img src="../img_login/login_people_icon.svg" alt="people" class="avatar">
    <div class="login-form">
      <h1 class="login-header">Admin Log in </h1>

       <!-- Código PHP login -->

       <?php
	require('../include/conn.php');
	session_start();
	if (isset($_POST['login']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="select * from user_login where binary email='".$email."' AND binary password='".$password."' AND status=1";
		$result=mysqli_query($conn,$sql);

		if (mysqli_num_rows($result)==1)
		{	$_SESSION['IS_ELOGIN']='yes';
			$_SESSION['eemail']=$email;

			$username = mysqli_fetch_row($result);
    		$_SESSION['euser_name'] =  $username[1]; 
   			$_SESSION['eid'] = $username[0];


			header('location:admin_dashbord.php');
			die();
		}
		else
		{ ?>
    <script>
            alert("Error al introducir usuario o contraseña.");
        </script>
    
    <?php
        
    }

	}
?>
       
       <!-- Fin Código PHP login -->

      <form action="admin_login.php" method="POST">
        <div class="login-textbox">
          <i class="fas fa-user-alt"></i>
          <input class="login-input" type="text" name="email" id="email" placeholder="Introduce email..." required oninvalid="this.setCustomValidity('Por favor, introduce un email válido.')" oninput="this.setCustomValidity('')">
        </div>
        <div class="login-textbox">
          <i class="fas fa-key"></i>
          <input class="login-input" type="password" name="password" id="password" placeholder="Introduce contraseña..." required oninvalid="this.setCustomValidity('Por favor, introduce una contraseña válida.')" oninput="this.setCustomValidity('')">
        </div>
        <button class="login-btn" type="submit" name="login">Acceder</button>        
        <input type="button" value="Salir" class="login-btn" style="background-color: orange; color: black;" onclick="window.location.href='../index.php'"/>  
      </form>
      
    </div>
  </div>
  <!-- End of Login Box -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
