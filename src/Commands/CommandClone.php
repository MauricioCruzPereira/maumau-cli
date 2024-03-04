<?php

namespace Src\Commands;

use Src\Interface\DefaultCommandInterface;

class CommandClone implements DefaultCommandInterface{

  public function Clone(string $url) : string{
    $urlGit = '/^(git|https?|ssh):\/\//';

    if(preg_match($urlGit, $url)){
      shell_exec("git clone {$url}");
      return "Comando clone executado com sucesso!" . PHP_EOL;
    }

    return "Repositório não encontrado" . PHP_EOL;
  }

  public function Help() : string{
    return '';
  }
}