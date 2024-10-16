<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário - Visualizar</title>
    <link rel="shortcut icon" href="imgs/icons8-cliente-50.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('nav.php');?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Visualizar cliente
                <a href="tables.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET['id'])) {
                    $cliente_id = mysqli_real_escape_string($conexao, $_GET["id"]);
                    $sql_code = "SELECT * FROM novos WHERE id = '$cliente_id'";
                    $query = mysqli_query($conexao, $sql_code);
                if (mysqli_num_rows($query) > 0) {
                    $clientes = mysqli_fetch_array($query);
                ?>

                <div class="mb-3">
                  <label>Nome</label>
                    <p class="form-control">
                    <?=$clientes['nome'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Empresa</label>
                    <p class="form-control">
                    <?=$clientes['empresa'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Serviço</label>
                    <p class="form-control">
                    <?=$clientes['servico'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Contrato</label>
                    <p class="form-control">
                    <?=$clientes['contrato'];?>
                  </p>
                </div>
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