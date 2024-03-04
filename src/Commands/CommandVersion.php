<?php

namespace Src\Commands;

use Src\Interface\DefaultCommandInterface;

class CommandVersion implements DefaultCommandInterface{


  public function Version() : string{
    return 'v1.0.0' . PHP_EOL;
  }

  public function Help():string{
    return 'Version';
  }
}