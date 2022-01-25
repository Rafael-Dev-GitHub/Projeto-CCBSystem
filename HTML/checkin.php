<?php 
 require ('verificaLogin.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/css/checkin.css"/>
    <script src="../HTML/js/main.js"></script>
    <link rel="stylesheet" href="../HTML/js/mobile-navbar.js" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Check-in</title>
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
    
               <div class="logout">
               <h2 class="user"><?php echo $_SESSION['usuario'];?></h2>
                <h2 class="exit"><br><a href="logout.php">Sair da conta</a></h2>
               </div>
    </header>
        <div class="container">
            <div class="row">
    
                <table class="table table-striped">
                    <thead>
                        <tr>
                      
                            <th scope="col">Nome Completo</th>
                            <th scope="col">Função</th>
                            <th scope="col">Status</th>
                            <th scope="col">Registro Entrada</th>
                            <th scope="col">Registro Saída</th>
                            <th scope="col">Ação</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM voluntario ORDER BY id DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['funcao'] . '</td>';
                            echo '<td>'. $row['status_Check'] . '</td>';
                            echo '<td>'. $row['entrada_ponto'] . '</td>';
                            echo '<td>'. $row['saida_ponto'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-warning" href="updateStatus.php?id='.$row['id'].'">Atualizar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
