<?php

include('verificaLogin.php');

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: indexOcorrencia.php");
}

if (!empty($_POST)) {

    $ocorrenciaErro = null;

    $ocorrencia = $_POST['ocorrencia'];

    //Validação
    $validacao = true;
    if (empty($ocorrencia)) {
        $ocorrencia = 'Por favor preenche o campo!';
        $validacao = false;
    }

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE voluntario  set ocorrencia = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($ocorrencia, $id));
        Banco::desconectar();
        header("Location: indexOcorrencia.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM voluntario where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $ocorrencia = $data['ocorrencia'];
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

    <title>Registrar ocorrencia</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Registrar ocorrencia </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="registrarOcorrencia.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group <?php echo !empty($ocorrenciaErro) ? 'error' : ''; ?>">
                        <label class="control-label">Registrar ocorrencia</label>
                        <div class="controls">
                            <input name="ocorrencia" class="form-control" size="30" type="text" placeholder="ocorrencia"
                                   value="<?php echo !empty($ocorrencia) ? $ocorrencia : ''; ?>">
                            <?php if (!empty($ocorrenciaErro)): ?>
                                <span class="text-danger"><?php echo $ocorrenciaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="indexOcorrencia.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
