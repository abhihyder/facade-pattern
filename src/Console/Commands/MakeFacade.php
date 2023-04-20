<?php

namespace Hyder\FacadePattern\Console\Commands;

use Hyder\FacadePattern\Traits\GetFileWithPathTrait;
use Hyder\FacadePattern\Traits\MakeDirectoryTrait;
use Hyder\FacadePattern\Traits\MakeFacadeTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeFacade extends Command
{
    use MakeFacadeTrait, MakeDirectoryTrait, GetFileWithPathTrait;

    protected $signature = 'facade-pattern:facade {name : The name of the facade scaffold class}';

    protected $description = 'Create a new facade class';

    public function handle()
    {

        $facadeClassName = Str::studly($this->argument('name'));
        $this->createFacade($facadeClassName, $this->pathAndName($facadeClassName));
        return true;
    }
}
