<?php

$files = array_slice(scandir('img'), 2);

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  
  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('index.html');

  $content = $template->render(array(
    'files' => $files
  ));
  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}