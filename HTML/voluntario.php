<?php
include('verificaLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
</html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../HTML/css/registrarVoluntarios.css" />
    <script src="../HTML/js/main.js"></script>
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" href="../HTML/js/mobile-navbar.js" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Voluntário</title>
</head>
<body>
<header>
        <nav>
            <a class="logo">Registrar Voluntários</a>
        <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
            <ul class="nav-list">
        <li><a href="recepcao.php">Inicio</a></li>
        <li><a href="portalLogin.php">Portal Colaborador</a></li>
        <li><a href="/">Institucional</a></li>
         </ul>
         <div class="logout">
               <h2 class="user"><?php echo $_SESSION['usuario'];?></h2>
                <h2 class="exit"><br><a href="logout.php">Sair da conta</a></h2>
               </div>
        </nav>

    </header>

    <div class="container">
          <img src="img/report.svg">
          
          <form class="formVoluntario" action="cadastrarVoluntario.php" method="POST">
    
             <h4>Nome Completo</h4>
            <input class="textForm" name="nome_completo" type="text" 
            value="<?php if(isset($_GET['nome_completo']))
		     echo($_GET['nome_completo']); ?>"required/></br>
            <h4>CPF </h4>

            <input class="textForm" name="cpf" type="text" 
            value="<?php if(isset($_GET['cpf']))
		    echo($_GET['cpf']); ?>"required/></br>
            <h4>Data de nascimento </h4>

            <input class="dateForm" name="data_nascimento" type="date"
            value="<?php if(isset($_GET['data_nascimento']))
		    echo($_GET['data_nascimento']); ?>" required /></br>
            <h4>Telefone</h4>

            <input class="telFom" name="telefone" type="tel"    
            value="<?php if(isset($_GET['telefone']))
		    echo($_GET['telefone']); ?>" required/></br>
            <h4>Endereço</h4>

            <input  class="textForm" name="endereco" type="text"
            value="<?php if(isset($_GET['endereco']))
		    echo($_GET['endereco']); ?>" required/></br>
            <h4>Comum Congregação</h4>

            <input  class="textForm" name="congrecacao" type="text"
            value="<?php if(isset($_GET['congrecacao']))
		    echo($_GET['congrecacao']); ?>" required/></br>
            <h4>Função</h4>

            <input  class="textForm" name="funcao" type="text"
            value="<?php if(isset($_GET['funcao']))
		    echo($_GET['funcao']); ?>" required/><br>

            <input type="reset" value="limpar campos"/><br>
            <input class="enviar" type="submit" value="Cadastrar"/>
            
         
    </form>
    <div class="result">
   <!-- Notificações  -->
    <?php
			         if(isset($_SESSION['status_cadastro'])):
			            ?>
			          <div class="notification is-success">
				       <p class="p">Cadastro efetuado com sucesso!</p>
			           </div>
			         <?php
			          endif;
			         unset($_SESSION['status_cadastro']);
                     ?>
                     <?php
                     if(isset($_SESSION['cpf_existe'])):
                     ?>
                    <div class="notification is-info">
                        <p class="p">CPF já cadastrado. Informe outro e tente novamente.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['cpf_existe']);
                    ?>
                       <!--FIM Notificações  -->
    </div>
</div>

</body>
</html>