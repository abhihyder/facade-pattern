<?php

namespace Hyder\FacadePattern\Traits;

trait GetFileWithPathTrait
{

    protected function pathAndName(string $name)
    {
        $delimiter = "/";
        $parts = explode($delimiter, $name);
        $fileName = array_pop($parts); // get the last item from the array
        $path = str_replace($delimiter, "\\", implode($delimiter, $parts));
        return ['name' => $fileName, 'path' => $path];
    }
}
