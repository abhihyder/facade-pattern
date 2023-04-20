<?php

namespace Hyder\FacadePattern\Traits;

trait MakeDirectoryTrait
{

    protected function makeDirectory($path)
    {
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }
    }
}
