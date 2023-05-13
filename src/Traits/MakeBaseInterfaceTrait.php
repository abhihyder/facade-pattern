<?php

namespace Hyder\FacadePattern\Traits;

use Illuminate\Support\Facades\File;

trait MakeBaseInterfaceTrait
{

    protected function makeBaseInterface()
    {
        $interfaceFilePath = app_path("Patterns/Interfaces/BaseInterface.php");
        if (!file_exists($interfaceFilePath)) {
            $this->makeDirectory($interfaceFilePath);
            $interfaceContent = file_get_contents(__DIR__ . "/../Interfaces/BaseInterface.php");
            File::put($interfaceFilePath, $interfaceContent);
            $this->info('BaseInterface created successfully.');
            $this->line($this->output->getFormatter()->format("<fg=green>File path  [$interfaceFilePath]  DONE.</>"));
        }

        return true;
    }
}
