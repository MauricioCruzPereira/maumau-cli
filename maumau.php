#!/usr/bin/php
<?php

$RED    = "\033[0;31m"; //VERMELHO
$GREEN  = "\033[0;32m"; //VERDE
$YELLOW = "\033[0;33m"; //AMARELO
$BLUE   = "\033[0;34m"; //AZUL
$NC     = "\033[0m"; //BRANCO

$short  = "";
$short .= "c:b:";

// Sem : O paramêtro não aceita dados
// Com : Obriga a ter valor no paramêtro
// Com :: Fala que paramêtro é opcional
$long  = [
    "clone:",
    "branch:",
    "init",
    "version"
];
$options = getopt($short, $long);

$short = array_key_first($options);

switch($short){
  case 'c':
  case 'clone':
    shell_exec("git clone {$options[$short]}");
    echo "{$GREEN}Comando clone executado com sucesso!" . PHP_EOL;
      
    break;

  case 'init':
    $branch = 'main';
    if(isset($options['b']) || isset($options['branch'])){
      $branch = $options['b'] ? $options['b'] : $options['branch'];
    }
    
    shell_exec("git clone --branch {$branch} https://github.com/MauricioCruzPereira/core-maumau-cli.git");
    echo "{$GREEN}Comando init executado com sucesso!" . PHP_EOL;
    break;

  case 'version':
    echo 'v1.0.0' . PHP_EOL;
    break;
    
  default:
    echo 'Comando inválido'. PHP_EOL;
}
