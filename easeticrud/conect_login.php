<?php 
include('conexao.php');
# FAZENDO O LOGIN DO ADMIN;
if (isset($_POST['acessar']) && !empty($_POST['email'] && !empty($_POST['senha']))){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
    $result = $conexao->query($sql_code);

    if (mysqli_num_rows($result) < 1){
        header('Location: login.php');
    } else {
        header('Location:index.php');
    }

}
?>