<?php
session_start();
  if (isset($_SESSION['user_logado'])) {    //si el usuario ya esta logeado redirecciona para dashboard
        header("Location: dashboard");
        exit();
    }
if (isset($_POST['user'])) {                //conexao con form login btn
	include 'db.php';                          //Conexao db
   	$_SESSION["login_time_stamp"] = time(); //tiempo de conexion al servidor
	$usuario = trim(isset($_POST['user']) ? $_POST['user'] : '');   
	$senha = trim(isset($_POST['pass']) ? $_POST['pass'] : '');   
	$userchecked = mysqli_real_escape_string($con, $usuario);  
	$passchecked = mysqli_real_escape_string($con, $senha);
	$query = mysqli_query($con, "SELECT * FROM login WHERE username = '".$userchecked."' AND password = '".$passchecked."'");   //listamos los usuarios de nuestra db existentes
	$check = mysqli_num_rows($query);
        if ($check == 1) {        //aqui verificamos si el usario existe o no
		$_SESSION['user_logado'] = $userchecked;
	    header("Location: dashboard");    //usario logado con suceso
        } else {
	 $msg = '<script>swal("Error", "Usuario o Contraseña Incorrectos!", "error")</script>';  //usuario denegado
	} if (empty($_POST['user'])) { 
   $msg = '<script>swal("Error", "Campos Vacios!", "warning")</script>';  //campos vacios
}
}
?>
<title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/npms.css">
    <link rel="stylesheet" type="text/css" href="assets/css/npm.css">
    <script src="assets/jdn/x.js"></script>
</head>
<body>
    <section class="w3l-mockup-form">
        <div class="container">
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="content-wthree">
					<div class="social-icons">LOGIN FORM</div>
                    <h2>HARTMODz</h2>
                           <form action="" method="post" autocomplete="off">
                            <input type="text" class="email" name="user" placeholder="Usuario">
                            <input type="password" class="password" name="pass" placeholder="Password">
                            <button name="submit" class="btn" type="submit">Login</button>
                          </form>
                      </div>
                    </div>
                </div>
            </div>
    </section> 
</body></html>
<?php echo $msg; ?>