<?php
include('verificaLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../HTML/assets/css/seguranca.css" />
    <script src="../HTML/js/main.js"></script>
    <!-- Necessário para a formatação do menu -->
    <link rel="stylesheet" href="../HTML/js/mobile-navbar.js" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Necessário para formatação dos elementos do footer-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <!-- Necessário para exportar os ícones telefone,email e localizaçao. --> 
    <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>   
    <title>CCBSystem - Segurança</title>
</head>
<body>


<header>
    <nav>
        <a class="logo">CCBSystem - Segurança</a>
    <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>

    <nav>
        <ul class="nav-list">
            
				<li><a href="#">Registro de Ocorrências</a>
							<ul>
								<li><a href="indexOcorrencia.php">Registrar ocorrências de acidente</a></li>
								<li><a href="indexAdvertencia.php">Registrar advertência</a></li>
							</ul>
						</li>	
				</li>
       
    <li><a href="ambientes.php">Trocar Ambiente</a></li>
     </ul>
     
     <div class="logout">
               <h2 class="user"><?php echo $_SESSION['usuario'];?></h2>

                <h2 class="exit"><br><a href="logout.php">Sair da conta</a></h2>
               </div>
     </nav>

</header>  

<!-- Funçao para rodar banner, porém não achei + necessario utilizalo, mas a função 
ainda está ativa para rodar a imagem, será alterado futuramente -->
    <div class="container">
        <img src="img/banner-work.png" alt="">
      </div>
  <script type="text/javascript">
  var counter = 1;
  setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if(counter > 2){
      counter = 1;
    }
  }, 5000);
  </script>
  <!-- Fim do script -->
  
<!-- Começo do footer-->
<main>
  <footer>
    <div id="contact-area">
      <div class="container3">
          <div class="row">
            <div class="col-md-12">
              <h3 class="main-title">Duvida? Entre em contato com o suporte</h3>
            </div>
            <div class="col-md-4 contact-box">
              <i class="fas fa-phone"></i>
              <p><span class="contact-tile">Ligue para:</span> (41)99999-9999</p>
              <p><span class="contact-tile">Horários:</span> 8:00 - 19:00</p>
            </div>
            <div class="col-md-4 contact-box">
              <i class="fas fa-envelope"></i>
              <p><span class="contact-tile">Envie um email:</span> contato@ccbsystem.com</p>
            </div>
            <div class="col-md-4 contact-box">
              <i class="fas fa-map-marker-alt"></i>
              <p><span class="contact-tile">Nossa unidade:</span> Fiep Pinhais</p>
            </div>
            <div class="col-md-6" id="msg-box">
              <p>Ou nos deixe uma mensagem:</p>
            </div>
            <div class="col-md-6" id="contact-form">
              <form action="">
                <input type="text" class="form-control" placeholder="E-mail" name="email">
                <input type="text" class="form-control" placeholder="Assunto" name="subject">
                <textarea class="form-control" rows="3" placeholder="Sua mensagem..." name="message"></textarea>
                <input type="submit" class="main-btn">
              </form>
            </div>
          </div>
      </div>
    </div>
    <div id="copy-area">
      <div class="container3">
        <div class="row">
            <div class="col-md-12">
              <p class="paragrafo_footer">Desenvolvido por <a class="a_footer" href="#" target="_blank">CCBSystem</a> &copy; 2021</p>
            </div>
        </div>
      </div>
    </div>
  </footer>
<!-- Fim do footer-->
</main>
<script src="js/mobile-navbar.js"></script> 
<!--image slider start-->

</body>
</html>