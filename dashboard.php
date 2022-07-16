<?php
session_start();
include 'db.php';
if (empty($_SESSION['user_logado'])) {
	unset($_SESSION['user_logado']);
	header("Location:login");                          //si el usuario  no esta logeado redirecciona para login
}

$dados_logado = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM login WHERE username = '".$_SESSION['user_logado']."'"));
if ($dados_logado['type'] != "cliente" && $dados_logado['type'] != "admin") {
	header("Location:login");
	exit();
}
?>
<span style="font-size:40px">
Bienvenido :
<?php if ($dados_logado['type'] == "admin") { ?>Admin<?php } else { ?><?php } ?>
<?php if ($dados_logado['type'] == "cliente") { ?>cliente<?php } else { ?><?php } ?>
</span>
<br>
<a href="salir"><button class="btn" style="background:#222;padding:15px;color:#fff">LOGOUT</button></a>