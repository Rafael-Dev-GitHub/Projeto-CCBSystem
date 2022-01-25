<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Acesso CCBSystem</title>
	<link rel="stylesheet" type="text/css" href="../HTML/assets/css/portalogin.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<img class="wave" src="img/wave.png">

	<!-- grid ao meio -->
	<div class="container">
		
		<div class="img">
			<!-- imagens obtidas no site: https://undraw.co/search -->
			<img src="img/colab.svg">
		</div>
		
		<div class="login-content">
		
			<form action="login.php" method="post">
				
				<img src="img/avatar.png">
				<h2 class="title">Iniciar sessão</h2>
           		<div class="input-div one focus">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Login</h5>
           		   		<input type="text" name="usuario" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Senha</h5>
           		    	<input type="password" name="senha" class="input" required>
            	   </div>
            	</div>
            	<a href="#">Esqueceu a senha?</a>
				<div >
					<input type="submit" class="btn" value="Login">
				</div>
          
            </form>
	       <!-- Fim Formulario login -->

			<!-- Validação login/senha -->
			<?php
			if(isset($_SESSION['nao_autenticado'])):
			?>
			<div class="notification is-danger">
				<p>ERRO: Usuário ou senha inválidos.</p>
			  </div>
			  <?php
			  endif;
			  unset($_SESSION['nao_autenticado']);

			  ?>
			  <!-- FIM Validação login/senha -->
        </div>

    </div>
</body>
</html>