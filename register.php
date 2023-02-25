<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---->
    <link rel="stylesheet" href="s.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">    
    <title>Contacto</title>
</head>
<body>
    <section id="header">
        <a href="index.html"><img src="img/lb.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
             <li><a href="index.html">Home</a></li>
             <li><a href="tiendaP.html">Tienda</a></li>
             <li><a class="active" href="usuario.php">Usuario</a></li>
             <li><a href="About.html">Nosotros</a></li>
             <li><a href="Contacto.html">Contacto</a></li>
             <li id="lg-bag"><a href="cart.html"><i class="fas fa-shopping-bag"></i></a></li>
            <a href="#" id="close"><i class="fas fa-times"></i></a>
            </ul>
        </div>   
        <div id="mobile">
            <a href="cart.html"><i class="fas fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="page-header" class="about-header">
        <h2>Usuario</h2>
        <p>"En vez de enfocarte en la competencia, enfócate en el cliente"</p>
    </section>

    <section id="login">
        <div class="body"> 
          <div class="container">
              <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registro</p>
                <div class="input-group">
                    <input type="text" placeholder="Usuario" name="username"  value="<?php echo $username; ?>" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                <input type="password" placeholder="Contraseña" name="password" value="<?php echo  $_POST['password']; ?>" required>
                </div>
                <div class="input-group" >
                <input type="password" placeholder="Confirmar Contraseña" name="cpassword" value="<?php echo $_POST['cpassword'];?>" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Registrarse</button>
                </div>
                <p class="login-register-text">Ya tienes cuenta? <a href="usuario.php">Ingresa Aqui</a></p>
              </form>
          </div>
        </div>
    </section>

     <footer class="section-p1">
        <div class="col">
            <a href="index.html"><img src="img/lb.png" alt=""></a>
            <h4>Contacto</h4>
            <p><strong>Direccion:</strong> Zona 10, local 23, Edificio "Las Flores"</p>
            <p><strong>Telefono:</strong> (+502)5468-9745 / (+502)7854-9865</p>
            <p><strong>Horario:</strong> 9:00am - 6:00pm, Lun-Vie</p>
            <div class="siguenos">
                <h4>Siguenos</h4>
                <div class="icon">
                    <a href="https://www.facebook.com/Vortex-Store"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/vortex.502/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Acerca de</h4>
            <a href="#">Nosotros</a>
            <a href="#">Contactanos</a>
            <a href="#">Politica de Privacidad</a>
            <a href="#">Terminos y Condiciones</a>
        </div>

        <div class="col">
            <h4>Mi Cuenta</h4>
            <a href="#">Registrarse</a>
            <a href="#">Ver Carrito</a>
            <a href="#">Lista de Deseos</a>
            <a href="#">Ayuda</a>
        </div>

        <div class="col install">
            <h4>Proximamente...</h4>
            <p>Descarga nuestra aplicacion...</p>
            <div class="row">
                <img src="img/app.jpg" alt="">
                <img src="img/play.jpg" alt="">
            </div>
            <p>Metodos de Pago</p>
            <img src="img/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>©2022. Reservados todos los derechos</p>
        </div>
     </footer>
    <script src="sc.js"></script>
</body>
</html>