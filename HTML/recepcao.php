<?php
include('verificaLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../HTML/assets/css/recepcao.css"/>
    <script src="../HTML/js/main.js"></script>
    <link rel="stylesheet" href="../HTML/js/mobile-navbar.js" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCBSystem - Recepção</title>
</head>
<body>
    <header>
        <nav>
            <a class="logo">CCBSystem - Recepção</a>
        <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>

        <nav>
            <ul class="nav-list">
             <li ><a class="voluntario">Voluntários</a>
                 <ul style= "animation: 0s ease 0.585714s 1 normal forwards running navLinkFade;">
                      <li><a href="index.php">Registrar<br><br>Atualizar<br><br>Visualizar<br><br>Deletar</a></li>
                 </ul>
        </li>
        <li><a href="checkin.php">Check-In</a>
        </li>
        <li><a href="ambientes.php">Trocar Ambiente</a>
        </li>
         </ul>
         </nav>
         <div class="visualizar_usuario">
                <h2 class="user"><?php echo $_SESSION['usuario'];?></h2>
               </div>
               <div class="logout">
                <h2 class="exit"><br><a href="logout.php">Sair da conta</a></h2>
               </div>
    </header>
    <main>
        <div class="container">
            <div class="img">
                <img src="img/recepcao.png" alt="people">

            </div>
            <p>Bem vindo à Recepção da CCBSystem!</p>
            
       </div>
    </main>
    <script src="js/mobile-navbar.js"></script> 
</body>
</html>