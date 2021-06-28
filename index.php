<?php
  // $url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  // $div = explode('/', $url);
  // $page = end($div);
  require_once 'core/config.php';
  require_once 'pages/includes/header.html';
  // $pages = [
  //   'consult' => "http://localhost/sivo/pages/consult",
  //   "register" => "http://localhost/sivo/pages/register"
  // ];
  $page = ( empty($_GET['url']) OR !isset($_GET['url'])) ? 'home' : $_GET['url'];
  if (!file_exists(__DIR__.'\\'.'pages'.'\\'.$page.'.html') )
	{
	   require_once(__DIR__.'\\'.'pages'.'\\'.'erro.html');
	}
	else 
	{	
    require_once(__DIR__.'\\'.'pages'.'\\'.$page.'.html');
	}
 
  require_once 'pages/includes/footer.html';

?>