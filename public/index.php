<?php
include '../engine/main.php';
include '../engine/ajax.php';

require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();

try{
  $sql = 'SELECT * FROM goods ORDER BY id DESC LIMIT 5';
  $result = $db->query($sql);
  
  while($row = $result->fetchObject()){
    $data[] = $row;
  }
  
  unset($db);

  $loader = new Twig_Loader_Filesystem('../templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('index.tmpl');

  $content = $template->render(array(
    'data' => $data,
    'year' => $year,
    'title' => $title
  ));

  echo $content;
}
catch(Exception $e){
  die('ERROR: '.$e->getMessage());
}