<?php
  // $url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  // $div = explode('/', $url);
  // $page = end($div);
  require_once 'core/config.php';
  require_once 'pages/includes/header.html';
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
 
  // require_once 'pages/includes/footer.html';
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
    <div class="row">

    </div>
  </div>

  <?php require_once 'pages/includes/footer.html' ?>