<?php

namespace Hyder\FacadePattern\Console\Commands;

use Hyder\FacadePattern\Traits\GetFileWithPathTrait;
use Hyder\FacadePattern\Traits\MakeBaseInterfaceTrait;
use Hyder\FacadePattern\Traits\MakeDirectoryTrait;
use Hyder\FacadePattern\Traits\MakeServiceTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeService extends Command
{
    use MakeBaseInterfaceTrait, MakeServiceTrait, MakeDirectoryTrait, GetFileWithPathTrait;

    protected $signature = 'facade-pattern:service {name : The name of the service class}';

    protected $description = 'Create a new service class';

    public function handle()
    {
        $serviceClassName = Str::studly($this->argument('name'));
        $this->createService($serviceClassName, $this->pathAndName($serviceClassName));
        return true;
    }
}
