<?php
    require "Shorten.php";
    
    
 //Creating object to
   //$url = new Shorten('bit.ly'); $url->auth(); //Usando oAuth
   //$url = new Shorten('bitw.in'); //Funcionando em 30/05/2013
   //$url = new Shorten('clipe.me'); //Não existe mais
   //$url = new Shorten('goo.gl'); //Exigindo autenticação
   //$url = new Shorten('is.gd'); //Funcionando em 30/05/2013
   //$url = new Shorten('migre.me'); //Funcionando em 30/05/2013
   //$url = new Shorten('miud.in'); //Funcionando em 30/05/2013
   //$url = new Shorten('pra.la'); //Funcionando em 30/05/2013
   //$url = new Shorten('tinyurl'); //Funcionando em 30/05/2013
   //$url = new Shorten('toma.ai'); //Retornando erro "temporariamente indisponível" em 30/05/2013
   //$url = new Shorten('zip.net'); //Funcionando em 30/05/2013
   //$url = new Shorten('adf.ly'); $url->auth('4235730', '9a0c27a44c975089bb52295b0971d44c');


   
   //Showing messages
   $url->logging = true;
   
   //Getting the short url
   echo $url->toShort('http://www.google.com');
   
   
   
   //Getting Qrcode url image
   //echo '<img src="' . $url->qrcode() . '" />';
  
   //Using with authentication
   //$url = new Shorten('bit.ly');
   //echo $url->auth('klawdyo', 'R_sad86dfs8sdf5sd5f7ds57d6s987asdds')->toShort('http://www.google.com')
  
