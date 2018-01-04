<?php

namespace Core\Lib\Db;

interface DeleteInterface
{
    
    public function execute();        

    public function delete($table);

    public function build();
}
