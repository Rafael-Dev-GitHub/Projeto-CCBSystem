
<?php
include('verificaLogin.php');
?>
<?php
require 'banco.php';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $cpfErro = null;
    $dataErro = null;
    $telefoneErro = null;
    $enderecoErro = null;
    $congrecacaoErro = null;
    $funcaoErro = null;
    $sexoErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['nome'])) {
            $nome = $_POST['nome'];
        } else {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = False;
        }


        if (!empty($_POST['cpf'])) {
            $cpf = $_POST['cpf'];
        } else {
            $cpfErro = 'Por favor digite o seu cpf!';
            $validacao = False;
        }

        
        if (!empty($_POST['data_nascimento'])) {
            $data = $_POST['data_nascimento'];
        } else {
            $dataErro = 'Por favor digite a sua data de nascimento!';
            $validacao = False;
        }

        if (!empty($_POST['telefone'])) {
            $telefone = $_POST['telefone'];
        } else {
            $telefoneErro = 'Por favor digite o número do telefone!';
            $validacao = False;
        }
        
        if (!empty($_POST['endereco'])) {
            $endereco = $_POST['endereco'];
        } else {
            $enderecoErro = 'Por favor digite o seu endereço!';
            $validacao = False;
        }

        if (!empty($_POST['congrecacao'])) {
            $congrecacao = $_POST['congrecacao'];    
        } else {
            $congrecacaoErro = 'Por favor digite o endereço de sua congrecação!';
            $validacao = False;
        }


        if (!empty($_POST['funcao'])) {
            $funcao = $_POST['funcao'];
        } else {
            $funcaoErro = 'Por favor informe uma função!';
            $validacao = False;
        }
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO voluntario (nome, cpf, data_nascimento, telefone, endereco,congrecacao, funcao) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $cpf, $data, $telefone, $endereco,$congrecacao,$funcao));
        Banco::desconectar();
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!--  CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Adicionar Contato</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Contato </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nome" type="text" placeholder="Nome Completo"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="control-group  <?php echo !empty($cpfErro) ? 'error ' : ''; ?>">
                        <label class="control-label">CPF</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="cpf" type="text" placeholder="CPF"
                                   value="<?php echo !empty($cpf) ? $cpf : ''; ?>">
                            <?php if (!empty($cpfErro)): ?>
                                <span class="text-danger"><?php echo $cpfErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group  <?php echo !empty($dataErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Data De Nascimento</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="data_nascimento" type="date" placeholder="Data de Nascimento"
                                   value="<?php echo !empty($data) ? $data : ''; ?>">
                            <?php if (!empty($dataErro)): ?>
                                <span class="text-danger"><?php echo $dataErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($enderecoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <input size="80" class="form-control" name="endereco" type="text" placeholder="Endereço"
                                   value="<?php echo !empty($endereco) ? $endereco : ''; ?>">
                            <?php if (!empty($enderecoErro)): ?>
                                <span class="text-danger"><?php echo $enderecoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($telefoneErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input size="35" class="form-control" name="telefone" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($congrecacaoErro) ? '$congrecacaoErro ' : ''; ?>">
                        <label class="control-label">Congrecação</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="congrecacao" type="text" placeholder="Congrecação"
                                   value="<?php echo !empty($congrecacao) ? $congrecacao : ''; ?>">
                            <?php if (!empty($congrecacaoErro)): ?>
                                <span class="text-danger"><?php echo $congrecacaoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($funcaoErro) ? '$funcaoErro ' : ''; ?>">
                        <label class="control-label">Função</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="funcao" type="text" placeholder="Função"
                                   value="<?php echo !empty($funcao) ? $funcao : ''; ?>">
                            <?php if (!empty($funcaoErro)): ?>
                                <span class="text-danger"><?php echo $funcaoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
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

