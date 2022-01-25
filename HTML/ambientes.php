<?php
include('verificaLogin.php');
?>

<html>
  <head>
        <title>Ambiente de acesso CCBSystem</title>
        
        <link rel="stylesheet" type="text/css" href="../HTML/assets/css/ambientes5.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
    
        <form id="formAmbiente">
            <h1 class="title">BEM VINDO A ÁREA
                <br> DE AMBIENTE!</h1>
               
               <div class="visualizar_usuario">
                <h2>Bem vindo, <?php echo $_SESSION['usuario'];?>!</h2>
               </div>
              
               <div class="logout">
                <h2 class="exit"><br><a href="logout.php">Sair da conta</a></h2>
               </div>
         
               <div class="ambientes"><h4>Selecione o ambiente:<h4></br>
               <h2><a href="cadastro.php">Cadastrar novo usuário</a></h2><br>
               <h2><a href="almoxarifado.php">Almoxarifado</a></h2></br>
               <h2><a href="segurança.php">Segurança</a></h2></br>
                <h2><a href="recepcao.php">Recepção</a></h2>
               
               </div>

    
        </form>
        
</body>
</html>
