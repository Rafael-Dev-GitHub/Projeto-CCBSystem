<?php
include('verificaLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../HTML/assets/css/ocorrencia.css"/>
    <link rel="stylesheet" href="../HTML/js/mobile-navbar.js" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Ocorrência</title>
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
        <ul class="nav-list">
                    
				<li><a href="#">Registro de Ocorrências</a>
							<ul>
								<li><a href="#">Registrar ocorrências de acidente</a></li>
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
        <div class="container">
            </br>
            <div class="row">
        
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome Completo</th>
                            <th scope="col">Função</th>
                            <th scope="col">Ocorrencia</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Puxa do banco de dados para mostrar os dados em order desc do 'ID'. -->
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM voluntario ORDER BY id DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['funcao'] . '</td>';
                            echo '<td>'. $row['ocorrencia'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-warning" href="registrarOcorrencia.php?id='.$row['id'].'">Atualizar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                         <!-- Fim da orientação php -->
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>
