<?php
// // require all php classes with autoload 
// // require 'autoload.php';
require_once ('php/Clblog.php');
require_once ('php/blogDao.php');
require_once ('php/connection.php');

// // instance connection and excecuting the pdo function
$connection = new Connection;
$connection -> conn();

// instance the blogDao class to use into the hole page
$blogDao = new blogDao();

if (isset($_POST['blogRegister'])) {
  $blog = new Blog();
  $blog -> setTitle($_POST['titleBlog']);
  $blog -> setText($_POST['textBlog']);

  $blogDao -> create($blog);

  // when you refresh the page it will not insert the saved forms data again
  echo "<meta http-equiv='refresh' content='0'>";

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <title>Painel CMS </title>
</head>
<body>

    <!-- text blog register -->
    <div class="card container mt-5 ">
    <div class="card-header w-1">Blog</div>
    <div class="card-body">
      <form class="form-group" method="POST" name="blogRegister" onSubmit="return validation(this)">
        <div class="form-group">
          <input type="text" class="form-control" name="titleBlog" required placeholder="Título">
          <label for="" class="font-weight-bold">Seu texto aqui</label>
          <textarea name="textBlog" class="form-control" rows="3" required></textarea>
          <button class="btn btn-secondary mt-3" name="blogRegister" type="submit"> Enviar</button>
        </div>
    </div>
  </div>

  <!-- Table for edit blog's -->
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Data</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody>
          <?php 
            foreach ($blogDao->read() as $value) {
              echo '<tr> <td>'.$value['titulo']. '</td>'.'<td>'.$value['text'].'</td> </tr>';	
            }
          ?>
      </tbody>
    </table>
  </div>

          
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/delete.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/validation.js"></script>
</body>
</html>

