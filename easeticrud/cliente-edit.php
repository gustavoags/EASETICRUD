<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente - Editar</title>
    <link rel="shortcut icon" href="imgs/icons8-cliente-50.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('nav.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Editar Cliente
                <a href="tables.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <?php
              if (isset($_GET['id'])) {
                $cliente_id = mysqli_real_escape_string($conexao, $_GET['id']);
                $sql_code = "SELECT * FROM novos WHERE id='$cliente_id'";
                $query = mysqli_query($conexao, $sql_code);
                if (mysqli_num_rows($query) > 0) {
                  $cliente = mysqli_fetch_array($query);
              ?>
              <form action="acoes.php" method="POST">
                <input type="hidden" name="id" value="<?=$cliente['id']?>">
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" value="<?=$cliente['nome']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Empresa</label>
                  <input type="text" name="empresa" value="<?=$cliente['empresa']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Serviço</label>
                  <input type="text" name="servico" value="<?=$cliente['servico']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Contrato</label>
                  <input type="text" name="contrato" value="<?=$cliente['contrato']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_cliente" class="btn btn-primary">Salvar</button>
                </div>
              </form>
              <?php
              } else {
                echo "<h5>Usuário não encontrado</h5>";
              }
            }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>