<?php

namespace Core\Lib\Entity;

interface CommandInterface
{
    public function create($obj, $classname);
}
