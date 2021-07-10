<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultando</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body style="background-color: #202024; color: white; font-size: 13pt;">
  <div class="container p-3 t-3 text-center">
    <h4 class="p-3"><strong>STATUS DAS VOTAÇÕES</strong></h4>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Partido</th>
      <th scope="col">Total de Votos</th>
      <th scope="col">EXTRA</th>
    </tr>
  </thead>
  <tbody>
<?php 
  include_once '../core/conection.php';
  $votacoes = $pdo->prepare("SELECT * FROM votacao");
  $votacoes->execute();

  while($res = $votacoes->fetch(PDO::FETCH_ASSOC)){
    echo '
        <th scope="row">'.$res["id"].'</th>
        <td>'.$res["idPartido"].'</td>
        <td>'.$res["idPartido"].'</td>
        <td>'.$res["idPartido"].'</td>

    ';
  }
?>

  </tbody>
</table><br>
<div class="text-center">
  <a href="../index" class="text-center">
    <img src="../assets/img/return.png" alt="Voltar" width="50" style="color: white;">
  </a></div>
  </div>
</body>
</html>