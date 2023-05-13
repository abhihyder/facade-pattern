<?php

namespace Hyder\FacadePattern\Traits;

use Illuminate\Support\Facades\File;

trait MakeServiceTrait
{

    protected function createService(string $name, array $arguments, string $implement = "BaseInterface")
    {

        $serviceFilePath = app_path("Patterns/Services/{$name}.php");

        if (!file_exists($serviceFilePath)) {
            $this->makeDirectory($serviceFilePath);
            $serviceContent = file_get_contents(__DIR__ . "/../Services/ExampleService.php");
            $serviceContent = str_replace("ExampleService", $arguments['name'], $serviceContent);

            if (!empty(trim($arguments['path']))) {
                $oldNamespace = "namespace App\Patterns\Services";
                $newNamespace = "namespace App\Patterns\Services\\{$arguments['path']}";
                $serviceContent = str_replace($oldNamespace, $newNamespace, $serviceContent);
            }

            if ($implement != "BaseInterface") {
                $oldUse = "use App\Patterns\Interfaces\BaseInterface";

                if (!empty(trim($arguments['path']))) {
                    $newUse = "use App\Patterns\Interfaces\\{$arguments['path']}\\{$implement}";
                } else {
                    $newUse = "use App\Patterns\Interfaces\\{$implement}";
                }

                $serviceContent = str_replace([$oldUse, "BaseInterface"], [$newUse, $implement], $serviceContent);
            }

            File::put($serviceFilePath, $serviceContent);
            $this->info("{$arguments['name']} created successfully.");
            $this->line($this->output->getFormatter()->format("<fg=green>File path  [$serviceFilePath]  DONE.</>"));
        } else {
            $this->line($this->output->getFormatter()->format("<fg=yellow>File [$serviceFilePath] already exists.</>"));
        }

        return true;
    }
}
