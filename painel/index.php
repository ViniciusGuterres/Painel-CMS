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
    <link rel="stylesheet" href="bootstrap/bootstrap-4.4.1-dist/css/bootstrap.css">
    <title>Painel CMS </title>
</head>
<body>


  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>

  <main role="main" class="container">
    <div class="jumbotron">
      <h1>Cadastrar equipe</h1>
      <form action="" method="POST">
        <h4>Nome do membro</h4>
        <input type="text" name="team-worker"><br><br>
        <h4>Descrição do membro</h4> 
        <textarea name="about" id="sobre" cols="140" rows="10"></textarea>
        <input type="submit" name='cadastrar_equipe'>
        <!-- <button class="btn btn-lg btn-primary" name="cadastrar_equipe" type="submit"> Enviar</button> -->
      </form>
    </div>
  </main>

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
</body>
</html>

