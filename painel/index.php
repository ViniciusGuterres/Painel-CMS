<?php
require_once "php/dbconnection.php";
//connection to data base stuffs 
$db = new Connection;
$db -> dbConn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <title>Painel CMS </title>
</head>
<body>

  <!-- header -->
  <main role="main" class="container-md-9 ml-sm-auto col-lg-10 px-5 " >
    <header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 shadow">
      <h2 class="navbar-brand col-sm-3 col-md-2 mr-0">Team-Workers</h2>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </header>
  </main>

  <!-- worker register ajuste -->
  <div class="card container mt-5 ">
    <div class="card-header w-1">Cadastro</div>
    <div class="card-body">
      <form class="form-group" method="POST">
        <!-- data for table -->
        <div class="form-group">
          <label for="" class="font-weight-bold">Nome completo</label>
          <input type="text" class="form-control" name="team-worker" placeholder="Almeida de Carvalho">
        </div>
        <!-- data for table -->
        <div class="form-group">
          <label for="" class="font-weight-bold">Setor</label>
          <select class="form-control" required>
            <option selected value="0">Escolha um setor...</option>
            <option value="Logistica">Logistica</option>
            <option value="Fiscal">Fiscal</option>
            <option value="Rh">Rh</option>
            <option value="Fabril">Fabril</option>
            <option value="Diretoria">Diretoria</option>
          </select>
        </div>
        <!-- data for table -->
        <div class="form-group">
          <label for="" class="font-weight-bold">Descrição das atividades</label> 
          <textarea name="about" id="sobre" class="form-control" rows="3"></textarea>
          <small id="worker-description" class="form-text text-muted">Uma pequena descrição do funcionário.</small>
        </div>
        <!-- data file for table -->
        <span class="font-weight-bold">Foto de perfil</span>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Escolha um arquivo</label>
        </div>
          <button class="btn btn-secondary mt-3" name="cadastrar_equipe" type="submit"> Enviar</button>
      </form>
  </div>
  </div>

  <!-- workers controller need some ajusts -->
  <main role="main" class="container">
    <div class="jumbotron">
      <h1>Equipe</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nome do Membro</th>
            <th scope="col">#<th>
          </tr>
        </thead>
        <tbody>

        <?php

        $conn = new PDO("mysql:host=localhost:3325;dbname=cmd_project", 'root', '');
        $selectTeam = $conn -> prepare("SELECT id,name FROM tb_equipe");
        $selectTeam -> execute();
        $team = $selectTeam -> fetchAll();
        foreach($team as $key=>$value){
        ?>
          <tr>
            <th scope="row"><?php echo $value['id'];  ?></th>
            <td><?php echo $value["name"];?></td>
            <td><button type="button" class="btn btn-danger deletar-membro" id_membro="<?php echo $value['id'];?>">Deletar</button></td>
          </tr>
          <tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </main>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/delete.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>

