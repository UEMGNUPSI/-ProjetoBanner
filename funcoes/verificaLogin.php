<?php
include_once "conexao.php";
session_start();

$login = $_POST['user'];
$senha = $_POST['pass'];
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;


$result_usuario = "SELECT * FROM login WHERE user = '$login' && pass = '$senha' LIMIT 1";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$resultado = mysqli_fetch_assoc($resultado_usuario);
if (isset($resultado)) {

    header('Location: /projetobanner/view/inicio.php?login=' . $_SESSION['login'] . '');
} else {
    echo "<script language='javascript' type='text/javascript'>window.location.href='/projetoBanner/index.php?l=Usuário ou senha Inválido!';</script>";
}
