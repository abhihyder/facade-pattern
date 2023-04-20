<?php

namespace Hyder\FacadePattern\Console\Commands;

use Hyder\FacadePattern\Traits\GetFileWithPathTrait;
use Hyder\FacadePattern\Traits\MakeBaseInterfaceTrait;
use Hyder\FacadePattern\Traits\MakeDirectoryTrait;
use Hyder\FacadePattern\Traits\MakeInterfaceTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeInterface extends Command
{
    use MakeBaseInterfaceTrait, MakeInterfaceTrait, MakeDirectoryTrait, GetFileWithPathTrait;

    protected $signature = 'facade-pattern:interface {name : The name of the interface}';

    protected $description = 'Create a new interface';

    public function handle()
    {
        $this->makeBaseInterface();

        $interfaceName = Str::studly($this->argument('name'));
        $this->createInterface($interfaceName, $this->pathAndName($interfaceName));
        return true;
    }
}
