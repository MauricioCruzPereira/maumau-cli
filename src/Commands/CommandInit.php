<?php

namespace Src\Commands;

use Src\Interface\DefaultCommandInterface;

class CommandInit implements DefaultCommandInterface{

  public function Init():string{
    $branch = 'main';
    if(isset($options['b']) || isset($options['branch'])){
      $branch = $options['b'] ? $options['b'] : $options['branch'];
    }
    
    shell_exec("git clone --branch {$branch} https://github.com/MauricioCruzPereira/core-maumau-cli.git");
    
    return "Comando init executado com sucesso!" . PHP_EOL;
  }


  public function Help():string {
    return '';
  }
}