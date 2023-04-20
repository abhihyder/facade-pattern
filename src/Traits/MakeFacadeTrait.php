<?php

namespace Hyder\FacadePattern\Traits;

use Illuminate\Support\Facades\File;

trait MakeFacadeTrait
{

    protected function createFacade(string $name, array $arguments)
    {
        $slug = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $arguments['name']));

        $facadeFilePath = app_path("Repositories/Facades/{$name}.php");

        if (!file_exists($facadeFilePath)) {
            $this->makeDirectory($facadeFilePath);
            $facadeContent = file_get_contents(__DIR__ . "/../Facades/ExampleFacade.php");
            $facadeContent = str_replace("ExampleFacade", $arguments['name'], $facadeContent);
            $facadeContent = str_replace("example-facade", $slug, $facadeContent);

            if (!empty(trim($arguments['path']))) {
                $oldNamespace = "namespace App\Repositories\Facades";
                $newNamespace = "namespace App\Repositories\Facades\\{$arguments['path']}";
                $facadeContent = str_replace($oldNamespace, $newNamespace, $facadeContent);
            }

            File::put($facadeFilePath, $facadeContent);

            $this->info("{$arguments['name']} created successfully.");
            $this->line($this->output->getFormatter()->format("<fg=green>File path  [$facadeFilePath]  DONE.</>"));
        } else {
            $this->line($this->output->getFormatter()->format("<fg=yellow>File [$facadeFilePath] already exists.</>"));
        }

        return true;
    }
}
