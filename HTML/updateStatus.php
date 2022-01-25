<?php

include('verificaLogin.php');

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: checkin.php");
}

if (!empty($_POST)) {

    
    $statusErro = null;
    $tempoEntradaErro =null;
    $tempoSaidaErro =null;

   
    $status = $_POST['status_Check'];
    $tempoEntrada = $_POST['entrada_ponto'];
    $tempoSaida = $_POST['saida_ponto'];

    //Validação
    $validacao = true;
    if (empty($status)) {
        $statusErro = 'Por favor, atualize o status.';
        $validacao = false;
    }

    $validacao = true;
    if (empty($tempoEntrada)) {
        $tempoErro = 'Por favor, selecione um horário';
        $validacao = false;
    }

    

   
    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE voluntario set  status_Check = ?, entrada_ponto=?, saida_ponto=? where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($status,$tempoEntrada,$tempoSaida,$id));
        Banco::desconectar();
        header("Location: checkin.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM voluntario  where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $funcao = $data['funcao'];
    $status = $data['status_Check'];
    $tempoEntrada = $data['entrada_ponto'];
    $tempoSaida = $data['saida_ponto'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Atualizar Contato</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar Contato </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="updateStatus.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group <?php echo !empty($statusErro) ? 'error' : ''; ?>">
                            
                        <div class="controls">
                            <input name="status_Check" class="form-control" size="50" type="text" placeholder="status"
                                   value="<?php echo !empty($status) ? $status : ''; ?>">
                            <?php if (!empty($statusErro)): ?>
                                <span class="text-danger"><?php echo $statusErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($tempoEntradaErro) ? 'error' : ''; ?>">
                            
                        <div class="controls">
                            <input name="entrada_ponto" class="form-control"  type="time"
                                   value="<?php echo !empty($tempoEntrada) ? $tempoEntrada : ''; ?>">
                            <?php if (!empty($tempoEntradaErro)): ?>
                                <span class="text-danger"><?php echo $tempoEntradaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($tempoSaidaErro) ? 'error' : ''; ?>">
                            
                        <div class="controls">
                            <input name="saida_ponto" class="form-control"  type="time"
                                   value="<?php echo !empty($tempoSaida) ? $tempoSaida : ''; ?>">
                            <?php if (!empty($tempoSaidaErro)): ?>
                                <span class="text-danger"><?php echo $tempoSaidaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                

                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="checkin.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
