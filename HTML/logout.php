<!-- Função Responsável para deslogar da conta. -->
<?php
session_start();
session_destroy();
header('Location: verificaLogin.php');
exit();