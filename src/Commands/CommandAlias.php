<?php

namespace Src\Commands;

use Src\Interface\DefaultCommandInterface;

class CommandAlias implements DefaultCommandInterface{
  public function Alias(string $command):string{
    $bashrcPath = getenv("HOME") . "/.bashrc";

    if($command == 'remove'){
      shell_exec("sed -i '/alias maumau/d' $bashrcPath");
      return 'Alias removido com sucesso!' . PHP_EOL;
    }
    
    return shell_exec("grep 'alias maumau' $bashrcPath");
  }

  public function Help():string{
    return 'Alias';
  }
}