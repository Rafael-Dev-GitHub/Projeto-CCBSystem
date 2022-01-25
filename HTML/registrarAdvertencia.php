<?php

include('verificaLogin.php');

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: indexAdvertencia.php");
}

if (!empty($_POST)) {

    
    $advertenciaErro = null;


    $advertencia = $_POST['advertencia'];


    //Validação
    $validacao = true;
    if (empty($advertencia)) {
        $advertencia = 'Por favor preenche o campo!';
        $validacao = false;
    }

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE voluntario  set advertencia = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($advertencia, $id));
        Banco::desconectar();
        header("Location: indexAdvertencia.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM voluntario where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $advertencia = $data['advertencia'];
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

    <title>Registrar advertencia</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Registrar advertencia </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="registrarAdvertencia.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group <?php echo !empty($advertenciaErro) ? 'error' : ''; ?>">
                        <label class="control-label">Registrar advertencia</label>
                        <div class="controls">
                            <input name="advertencia" class="form-control" size="30" type="text" placeholder="advertencia"
                                   value="<?php echo !empty($advertencia) ? $advertencia : ''; ?>">
                            <?php if (!empty($advertenciaErro)): ?>
                                <span class="text-danger"><?php echo $advertenciaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="indexAdvertencia.php" type="btn" class="btn btn-default">Voltar</a>
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
<!--JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
