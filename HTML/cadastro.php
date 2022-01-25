<?php
session_start();
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar novo Usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../HTML/assets/css/cadastro2.css">
</head>

<body>
<header>
        <nav>
            <a class="logo">CCBSystem - Cadastro</a>
        <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>

        <nav>
   <ul>
        <a href="ambientes.php">Trocar Ambiente</a>
        
         </ul>
         </nav>
               <div class="logout">
               <h2 class="user"><?php echo $_SESSION['usuario'];?></h2>
                <h2 class="exit"><br><a href="logout.php">Sair da conta</a></h2>
               </div>
    </header>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Cadastrar novo usuário</h3>
                    <!-- Notificações sucesso/ja existe -->
                    <?php
			         if(isset($_SESSION['status_cadastro'])):
			            ?>
			          <div class="notification is-success">
				       <p>Cadastro efetuado com sucesso!</p>
			           </div>
			         <?php
			          endif;
			         unset($_SESSION['status_cadastro']);
                     ?>

                     <?php
                     if(isset($_SESSION['usuario_existe'])):
                     ?>
                    <div class="notification is-info">
                        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['usuario_existe']);
                    ?>
                     <!-- FIM Notificações sucesso/ja existe -->
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input class="usuario" name="usuario" type="text" class="input is-large" placeholder="Usuário">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="senha" name="senha" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>
                            <div class="field">
                            
		                       <div class="col-md-6">
                               <h2>Escolha o nível de acesso</h2>
			                     <select class="form-control form-control-lg" name="nivel">
                                    <option value="1">Administrador</option>  
                                    <option value="0">Usuario</option>
			                     </select>
	                            </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
