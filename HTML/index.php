<?php
include('verificaLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../HTML/assets/css/index.css"/>
    <script src="../HTML/js/main.js"></script>
    <link rel="stylesheet" href="../HTML/js/mobile-navbar.js" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Voluntário</title>
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
            </br>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Adicionar voluntário</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome Completo</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Congregação</th>
                            <th scope="col">Função</th>
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
                            echo '<td>'. $row['cpf'] . '</td>';
                            echo '<td>'. $row['data_nascimento'] . '</td>';
                            echo '<td>'. $row['telefone'] . '</td>';
                            echo '<td>'. $row['endereco'] . '</td>';
                            echo '<td>'. $row['congrecacao'] . '</td>';
                            echo '<td>'. $row['funcao'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                        <!-- Fim orientação PHP -->
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
