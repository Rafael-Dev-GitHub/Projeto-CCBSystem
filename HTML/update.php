<?php

include('verificaLogin.php');
require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $nomeErro = null;
    $cpfErro = null;
    $dataErro = null;
    $telefoneErro = null;
    $enderecoErro = null;
    $congrecacaoErro = null;
    $funcaoErro = null;

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $congrecacao = $_POST['congrecacao'];
    $funcao = $_POST['funcao'];


    //Validação
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o nome!';
        $validacao = false;
    }

    if (empty($cpf)) {
        $cpfErro = 'Por favor digite o cpf!';
        $validacao = false;
    }

    if (empty($data_nascimento)) {
        $dataErro = 'Por favor digite a Data de Nascimento!';
        $validacao = false;
    }

    if (empty($telefone)) {
        $telefoneErro = 'Por favor preenche o campo!';
        $validacao = false;
    }

    if (empty($endereco)) {
        $enderecoErro = 'Por favor preenche o campo!';
        $validacao = false;
    }
    
    if (empty($congrecacao)) {
        $congrecacaoErro = 'Por favor preenche o campo!';
        $validacao = false;
    }

    if (empty($funcao)) {
        $funcaoErro = 'Por favor preenche o campo!';
        $validacao = false;
    }

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE voluntario  set nome = ?, cpf = ?, data_nascimento = ?, telefone = ?, endereco = ?, congrecacao = ?, funcao = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $cpf, $data_nascimento, $telefone, $endereco, $congrecacao ,$funcao, $id));
        Banco::desconectar();
        header("Location: index.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM voluntario where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $cpf = $data['cpf'];
    $data_nascimento = $data['data_nascimento'];
    $telefone = $data['telefone'];
    $endereco = $data['endereco'];
    $congrecacao = $data['congrecacao'];
    $funcao = $data['funcao'];
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
                <form class="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group <?php echo !empty($nomeErro) ? 'error' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="nome" class="form-control" size="50" type="text" placeholder="Nome"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($cpfErro) ? 'error' : ''; ?>">
                        <label class="control-label">CPF</label>
                        <div class="controls">
                            <input name="cpf" class="form-control" size="80" type="text" placeholder="CPF"
                                   value="<?php echo !empty($cpf) ? $cpf : ''; ?>">
                            <?php if (!empty($cpfErro)): ?>
                                <span class="text-danger"><?php echo $cpfErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($dataErro) ? 'error' : ''; ?>">
                        <label class="control-label">data</label>
                        <div class="controls">
                            <input name="data_nascimento" class="form-control" size="30" type="text" placeholder="Data de Nascimento"
                                   value="<?php echo !empty($data_nascimento) ? $data_nascimento : ''; ?>">
                            <?php if (!empty($dataErro)): ?>
                                <span class="text-danger"><?php echo $dataErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($telefoneErro) ? 'error' : ''; ?>">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input name="telefone" class="form-control" size="30" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($enderecoErro) ? 'error' : ''; ?>">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <input name="endereco" class="form-control" size="30" type="text" placeholder="endereco"
                                   value="<?php echo !empty($endereco) ? $endereco : ''; ?>">
                            <?php if (!empty($enderecoErro)): ?>
                                <span class="text-danger"><?php echo $enderecoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($congrecacaoErro) ? 'error' : ''; ?>">
                        <label class="control-label">Congrecacao</label>
                        <div class="controls">
                            <input name="congrecacao" class="form-control" size="30" type="text" placeholder="congrecacao"
                                   value="<?php echo !empty($congrecacao) ? $congrecacao : ''; ?>">
                            <?php if (!empty($congrecacaoErro)): ?>
                                <span class="text-danger"><?php echo $congrecacaoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($funcaoErro) ? 'error' : ''; ?>">
                        <label class="control-label">Função</label>
                        <div class="controls">
                            <input name="funcao" class="form-control" size="30" type="text" placeholder="funcao"
                                   value="<?php echo !empty($funcao) ? $funcao : ''; ?>">
                            <?php if (!empty($funcaoErro)): ?>
                                <span class="text-danger"><?php echo $funcaoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
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
