<?php

$commands  = "";
$commands .= "c:";

// Sem : O paramêtro não aceita dados
// Com : Obriga a ter valor no paramêtro
// Com :: Fala que paramêtro é opcional
$types  = [
    "clone:",
];
$options = getopt($commands, $types);

$commands = array_key_first($options);

switch($commands){
  case 'c':
  case 'clone':
    $result = shell_exec("git clone {$options[$commands]}");
      echo "<pre>"; var_dump($result); echo "</pre>"; exit;
      
    break;
  default:
    echo 'Comando inválido';
}
