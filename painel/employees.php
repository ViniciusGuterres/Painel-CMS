<?php

// require all php classes with autoload 
// require 'autoload.php';
require_once ('php/employeesDao.php');
require_once ('php/employees.php');
require_once ('php/connection.php');

// instance connection and excecuting the pdo function
$connection = new Connection;
$connection -> conn();

// instance employeesDao and executing the CRUD function
$employeesDao = new EmployeesDao;

//instance employees, it will pass form values to employeesDao
$employees = new Employees;


if (isset($_POST['register'])) {

    $msg = false;
    $employees -> setName($_POST['nameRegister']);
    $employees -> setRole($_POST['roleRegister']);
    $employees -> setDescription($_POST['descriptionRegister']);
    $employees -> setImage($_POST['imageRegister']);
  
    //this instance will call the create function to insert a form value
    $employeesDao -> create($employees);
  }
  
  if (isset($_POST['id_membro'])) {
      $employeesDao -> delete(($_POST['id_membro']));
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <title>Painel CMS</title>
</head>
<body>
    

  <!-- worker register (needs some ajust at front end card ) -->
  <div class="card container mt-5 ">
    <div class="card-header w-1">Cadastro</div>
    <div class="card-body">
      <form class="form-group" method="POST" name="formRegister" onSubmit="return validation(this)" enctype="multipart/form-data">
        <!-- data for table -->
        <div class="form-group">
          <label for="" class="font-weight-bold">Nome completo</label>
          <input type="text" class="form-control" name="nameRegister" required placeholder="Almeida de Carvalho">
        </div>
        <!-- data for table -->
        <div class="form-group">
          <label for="" class="font-weight-bold">Função</label>
          <select name="roleRegister" class="form-control" required>
            <option selected value="">Escolha uma função...</option>
            <option value="Administrador">Administrador</option>
            <option value="Editor">Editor</option>
            <option value="Colunista">Colunista</option>
            <option value="Design">Design</option>
          </select>
        </div>
        <!-- data for table -->
        <div class="form-group">
          <label for="" class="font-weight-bold">Descrição das atividades</label> 
          <textarea name="descriptionRegister" class="form-control" rows="3" required></textarea>
          <small id="worker-description" class="form-text text-muted">Uma pequena descrição do funcionário.</small>
        </div>
        <!-- data file for table -->
        <span class="font-weight-bold">Foto de perfil</span>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="imageRegister " name="arquivo">
          <label class="custom-file-label" for="customFile">Escolha um arquivo</label>
        </div>
          <button class="btn btn-secondary mt-3" name="register" type="submit"> Enviar</button>
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
        //will loking for registeded emplyees into the database
        foreach($employeesDao->read() as $key=>$value){
        ?>
          <tr>
            <th scope="row"><?php echo $value['id'];  ?></th>
            <td><?php echo $value["name"];?></td>
            <td><button type="button" class="btn btn-danger deletar-membro" id_membro="
            <?php 
              echo $value['id'];
            ?>">Deletar</button></td>
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
    <script src="js/validation.js"></script>
</body>
</html>