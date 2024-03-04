<?php

namespace Src\Commands;

use Src\Interface\DefaultCommandInterface;

class CommandHelp implements DefaultCommandInterface{

  //String para retornar todas os help das classes
  private $help = '';

  public function Help() : string{
    $this->getAllClasses();
    return $this->help;
  }

  private function getAllClasses() : void{
    //Identifica o caminho atual
    $path = __DIR__;
    
    //Obtém o diretório
    $directory = dir($path);

    //Abre o arquivo para leitura
    while($archive = $directory->read()){
      // Verificar se o arquivo possui extensão .php
      if(pathinfo($archive, PATHINFO_EXTENSION) === 'php' && $archive != "CommandHelp.php") {        
        $this->instanceClass($archive);
      }
    }
    //Fecha o arquivo
    $directory->close();
  }

  private function instanceClass(string $archive) : void{
    //Namespace base para a classe
    $className = '\\Src\\Commands\\' . pathinfo($archive, PATHINFO_FILENAME);
    //instancia a classe
    $instance = new $className();
    
    //Atribue a variavel help
    $this->help .= $instance->Help() . PHP_EOL; 
  }
}