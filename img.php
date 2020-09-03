<?php

$file = stripcslashes($_GET['photo']);
if (!file_exists('img/'.$file)) throw new Exception ('Фото отсутсвует');

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  
  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('img.html');
  
  $content = $template->render(array(
    'file' => $file
  ));
  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}