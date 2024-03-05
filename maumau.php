#!/usr/bin/php
<?php

require_once __DIR__ . "/vendor/autoload.php";

use Src\Commands\CommandAlias;
use Src\Commands\CommandClone;
use Src\Commands\CommandHelp;
use Src\Commands\CommandInit;
use Src\Commands\CommandVersion;

$short  = "";
$short .= "c:b:a::";

// Sem : O paramêtro não aceita dados
// Com : Obriga a ter valor no paramêtro
// Com :: Fala que paramêtro é opcional
$long  = [
    "clone:",
    "branch:",
    "build",
    "init",
    "alias::",
    "version",
    "help"
];
$options = getopt($short, $long);

$command = array_key_first($options);

switch($command){
  case 'c':
  case 'clone':    
    echo (new CommandClone)->Clone($options[$command]);      
    break;

  case 'init':
    echo (new CommandInit)->Init($options);
    break;

  case 'build':
    echo "Em manutenção!" . PHP_EOL;
    break;

  case 'a':
  case 'alias':
        
    echo (new CommandAlias)->Alias($options[$command]);
    break;

  case 'version':
    echo (new CommandVersion)->Version();
    break;
  
  case 'help':
    echo (new CommandHelp)->Help();
    break;

  default:
    echo 'Comando inválido'. PHP_EOL;
}
