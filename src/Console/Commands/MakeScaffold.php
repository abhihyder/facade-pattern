<?php

namespace Hyder\FacadePattern\Console\Commands;

use Hyder\FacadePattern\Traits\GetFileWithPathTrait;
use Hyder\FacadePattern\Traits\MakeBaseInterfaceTrait;
use Hyder\FacadePattern\Traits\MakeDirectoryTrait;
use Hyder\FacadePattern\Traits\MakeFacadeTrait;
use Hyder\FacadePattern\Traits\MakeInterfaceTrait;
use Hyder\FacadePattern\Traits\MakeServiceTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeScaffold extends Command
{
    use MakeBaseInterfaceTrait, MakeDirectoryTrait, GetFileWithPathTrait, MakeFacadeTrait, MakeServiceTrait, MakeInterfaceTrait;

    protected $signature = 'facade-pattern:scaffold {name : The name of the facade scaffold class}';

    protected $description = 'Create a new facade scaffold classes and interfaces';

    public function handle()
    {
        $this->makeBaseInterface();

        $name = Str::studly($this->argument('name'));
        $name = $this->getBaseName($this->pathAndName($name));
        $this->createFacade("{$name}Facade", $this->pathAndName("{$name}Facade"));
        $this->createInterface("{$name}Interface", $this->pathAndName("{$name}Interface"));
        $this->createService("{$name}FacadeService", $this->pathAndName("{$name}FacadeService"));
        return true;
    }

    private function getBaseName(array $arguments)
    {
        $name = str_replace(['Service', 'Facade', 'Interface'], '', $arguments['name']);

        if (!empty(trim($arguments['path']))) {
            return $arguments['path'] . '/' . $name;
        }
        return $name;
    }
}
