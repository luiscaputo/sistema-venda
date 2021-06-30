<?php
    // $url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // $div = explode('/', $url);
    // $page = end($div);
    require_once 'core/config.php';
    require_once 'pages/includes/header.html';
    require_once 'core/conection.php';

    // // $pages = [
    // //   'consult' => "http://localhost/sivo/pages/consult",
    // //   "register" => "http://localhost/sivo/pages/register"
    // // ];
    // $page = ( empty($_GET['url']) OR !isset($_GET['url'])) ? 'home' : $_GET['url'];
    // if (!file_exists(__DIR__.'\\'.'pages'.'\\'.$page.'.html') )
    // {
    //    require_once(__DIR__.'\\'.'pages'.'\\'.'erro.html');
    // }
    // else 
    // {	
    //   require_once(__DIR__.'\\'.'pages'.'\\'.$page.'.html');
    // }
  if(isset($_POST['register_bi']))
  {
    $nome = $_POST['name'];
    $bi = $_POST['bi'];

    if(empty($nome)){
      echo "<script>alert('Digite Seu nome para continuar.')</script>";
    }elseif(empty($bi)){
      echo "<script>alert('Digite Seu BI para continuar.')</script>";
    }
    else
    {
      $verBi = $pdo->prepare("SELECT * FROM voters WHERE codVoter = '$bi'");
      $verBi->execute();
      if($verBi->rowCount() > 0){
        echo "<script>alert('Cadastramento não Efectuado, esse BI já foi registrado!')</script>";
      }else {
        $save = $pdo->prepare("INSERT INTO voters(name, codVoter) VALUES ('$nome', '$bi')");
        $save->execute();

        if($save->rowCount() > 0){
          echo "<script>alert('Cadastramento Efectuado')</script>";
        }else {
          echo 'Erro ao salvar cadastramento';
        }
    }
  }
  }
if(isset($_POST['gerar']))
{
    $nome = filter_input(INPUT_POST, 'name');
    $birth = filter_input(INPUT_POST, 'year');
    $province = filter_input(INPUT_POST, 'province');
    if($nome == '' || empty($birth) || empty($province)){
      echo "<script>alert('Por favor todos devem estar preenchidos!')</script>";
    }else
      {
        $data = '20'.date('y');
        $p1 = $birth[0];
        $p2 = $birth[1];
        $p3 = $birth[2];
        $p4 = $birth[3];

        $dt = $p1.$p2.$p3.$p4;
        $yearBirth = $data - $dt; 
        if($dt >= $data){
          echo "<script>alert('Data de Nascimento inválida! Verifique e tente novamente.')</script>";
        }else{
          if($yearBirth < 18){
            echo "<script>alert('Você ainda é menor de Idade e não pode Votar!')</script>";
          }else{
            $div = explode(' ', $nome);
            $last = end($div);
            $F = $nome[0];
            $l = $last[0];
            $gera = rand(1000, 9999);
            $codV = $F.$l.$gera.$data;
            
            $save = $pdo->prepare("INSERT INTO voters(name, codVoter) VALUES ('$nome', '$codV')");
            $save->execute();

            if($save->rowCount() > 0){
              echo "<script>alert('Sr. `{$data}` seu cadastro foi feito com sucesso, seu código de voto é `{$codV}` Anote-o ou faça uma captura de ecrã! E leve ele consigo para validar o seu voto. Lembra, votar é direito de todos!')</script>";
            }else
            {
              echo 'BUG - Try Again Later';
            }
          }
        }
      }
  }
?>
<div class="container text-center p-3">
    <div class="row p-5 mt-4">
      <h4><strong>SISTEMA INTEGRADO DE CADASTRAMENTO PARA VOTAÇÃO</strong></h4>
      <div class="" style="margin-top:30px;">
        <img src="assets/img/voter.svg" alt=""><br><br>
        <p>Sistema integrado de votação, cadastra-se cá no sistema e vá apenas a um dos postos <br> 
            da CNE com teu número do Bilhete, somos a favor da não transmissão do covid <br> portanto
            cadastre-se aqui para garantir seu direito de votar.
        </p>
      </div>
    </div>
</div>
    <hr>
<div class="container">
  <div class="row"> <!-- <h4><strong>CADASTRE-SE AQUI</strong></h4> -->  
    <form method="post" id="regi" class="form-control text-justify p-3 mt-13" style="color: white; background-color:#323238; border:none; width:48%; margin-left:25%;">
      <strong class="text-center">CADASTRE-SE AQUI - PREENCHA TODOS OS CAMPOS</strong>
      <hr>
      <div class="mb-0">
        <label for="exampleInputEmail1" class="form-label"></label>
        <input type="text" class="form-control" id="nome" name="name" aria-describedby="Nome" placeholder="Nome Completo">
      </div>
      <div class="mb-3">
        <label for="yearOld" class="form-label"></label>
        <input type="date" class="form-control" name="year">
      </div>
      <div class="input-group mb-3">
        <label for="exampleInputEmail1" class="form-label"></label>
        <select name="province" id="" class="form-control">
          <option value="" selected>Selecione sua província</option>
          <option value="Luanda">Luanda</option>
          <option value="Lunda-Sul">Lunda-Sul</option>
          <option value="Lunda-Norte">Lunda-Norte</option>
          <option value="Kwanza-Sul">Kwanza-Sul</option>
          <option value="Kwanza-Norte">Kwanza-Norte</option>
          <option value="Moxico">Moxico</option>
          <option value="Bengo">Bengo</option>
          <option value="Uíge">Uíge</option>
          <option value="Huíla">Huíla</option>
          <option value="Benguela">Benguela</option>
          <option value="Namibe">Namibe</option>
          <option value="Cunene">Cunene</option>
          <option value="Cuando-Cubango">Cuando-Cubango</option>
          <option value="Bié">Bié</option>
          <option value="Malange">Malange</option>
          <option value="Cabinda">Cabinda</option>
          <option value="Zaire">Zaire</option>
          <option value="Huambo">Huambo</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success form-control" id="register_bi" name="gerar">Gerar Meu Código Eleitoral</button><br><br>
    </form>
  </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="src/registerBi.js"></script> -->
  <?php require_once 'pages/includes/footer.html' ?>