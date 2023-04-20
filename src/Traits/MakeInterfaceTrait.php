<?php

namespace Hyder\FacadePattern\Traits;

use Illuminate\Support\Facades\File;

trait MakeInterfaceTrait
{

    protected function createInterface(string $name, array $arguments)
    {
        $interfaceFilePath = app_path("Repositories/Interfaces/{$name}.php");

        if (!file_exists($interfaceFilePath)) {
            $this->makeDirectory($interfaceFilePath);
         
            if (!empty(trim($arguments['path']))) {
                $namespace = "namespace App\Repositories\Interfaces\\{$arguments['path']};\n\nuse App\Repositories\Interfaces\BaseInterface;";
            } else {

                $namespace = "namespace App\Repositories\Interfaces;";
            }

            // Create the interface file content
            $interfaceContent = "<?php\n\n{$namespace}\n\ninterface {$arguments['name']} extends BaseInterface\n{\n    // Define your methods here\n}\n";

            File::put($interfaceFilePath, $interfaceContent);
            $this->info("{$arguments['name']} created successfully.");
            $this->line($this->output->getFormatter()->format("<fg=green>File path  [$interfaceFilePath]  DONE.</>"));
        } else {
            $this->line($this->output->getFormatter()->format("<fg=yellow>File [$interfaceFilePath] already exists.</>"));
        }

        return true;
    }
}
