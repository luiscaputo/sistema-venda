<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Pagina Inicial</title>
</head>
<body style="background-color: #202024; color: white; font-size: 13pt;">
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 mb-4">
    <div class="container-fluid">
      <strong><a class="navbar-brand" href="#" style="margin-left: 150px;">SIVO</a></strong>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/sivo/index#regi">Pagina Inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="http://localhost/sivo/index#regi">Cadastrar-se</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../aboutUs.html" tabindex="-1" aria-disabled="true">Sobre Nós</a>
          </li>
        </ul>
        <form class="d-flex" style="margin-right: 150px;" name="" action="consult.php" method="post">
          <input class="form-control me-2" type="search" placeholder="Consultar código de Voto" aria-label="Search" name="data" required>
          <button class="btn btn-outline-success" type="submit" name="consult">Consultar</button>
        </form>
      </div>
    </div>
  </nav>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.js"></script>
</body>
</html>