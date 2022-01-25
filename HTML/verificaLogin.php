<!-- Função para verificar o login, se não estiver logado, 
não terá acesso a nenhuma página do site. -->
<?php
session_start();
if(!$_SESSION['usuario']) {
    header('Location: portalLogin.php');
    exit();
}           