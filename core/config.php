<?php
  // Prefixo
  define('PREFIX', 'SV_');

  //URL da App http://localhost:81/sivo/ on ubuntu
  define(PREFIX.'URL', 'http://localhost/sivo/');

  // Cominho base onde está localizado os arquivos do servidor
  define('DS', DIRECTORY_SEPARATOR);
  define('SV_BASE', strstr(__DIR__, '\\'.'core', true).'\\' );

  //bd_difiners
  define('SV_SERVER', 'localhost');
  define('SV_SERVER_USER', 'root');
  define('SV_SERVER_pass', '');
  define('SV_DB', 'Gvoto');
?>