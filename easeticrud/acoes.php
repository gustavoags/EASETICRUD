<?php 
session_start();
require 'conexao.php';

if(isset($_POST['create_cliente'])){
    $nome = mysqli_real_escape_string($conexao, trim($_POST["nome"]));
    $empresa = mysqli_real_escape_string($conexao, trim($_POST["empresa"]));
    $servico = mysqli_real_escape_string($conexao, trim($_POST["servico"]));
    $contrato = mysqli_real_escape_string($conexao, trim($_POST["contrato"]));

    $sql_code = "INSERT INTO novos (nome, empresa, servico, contrato) VALUES ('$nome', '$empresa', '$servico', '$contrato')";

    mysqli_query($conexao, $sql_code);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Cliente cadastrado com sucesso';
        header('Location: tables.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Cliente não foi cadastrado';
        header('Location: tables.php');
        exit;
    }
}

if (isset($_POST['update_cliente'])) {
    #$cliente_id = mysqli_real_escape_string($conexao, $_POST['cliente_id']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $empresa = mysqli_real_escape_string($conexao, $_POST['empresa']);
    $servico = mysqli_real_escape_string($conexao, $_POST['servico']);
    $contrato = mysqli_real_escape_string($conexao, $_POST['contrato']);

    $sql_code = "UPDATE novos SET nome = '$nome', empresa = '$empresa', servico = '$servico', contrato = '$contrato'";

    #$sql_code = "WHERE id = '$cliente_id'";
    mysqli_query($conexao, $sql_code);
    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Cliente atualizado com sucesso';
        header('Location:tables.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Cliente não foi atualizado';
        header('Location:tables.php');
        exit;
    }
}

if (isset($_POST['delete_cliente'])){
    $cliente_id = mysqli_real_escape_string($conexao,$_POST['delete_cliente']);
    $sql_code = "DELETE FROM novos WHERE id = '$cliente_id'";
    mysqli_query($conexao, $sql_code);
    if (mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'Cliente deletado';
        header('Location: tables.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Cliente não foi deletado';
        header('Location:tables.php');
        exit;
    }
}
?>