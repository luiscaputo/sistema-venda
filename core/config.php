<?php
  // Prefixo
  define('PREFIX', 'SV_');

  //URL da App http://localhost:81/sivo/ on ubuntu
  define(PREFIX.'URL', 'http://localhost/sivo/');

  // Cominho base onde está localizado os arquivos do servidor
  define('DS', DIRECTORY_SEPARATOR);
  define('KP_BASE', strstr(__DIR__, '\\'.'core', true).'\\' );

  //bd_difiners
  define('KP_SERVER', 'localhost');
  define('KP_SERVER_USER', 'root');
  define('KP_SERVER_pass', '');
  define('KP_DB', 'kapay_db');
?>