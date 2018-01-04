<?php

namespace Core\Lib\Db;

require_once 'SqlBuilder.php';
require_once 'UpdateInterface.php';

class UpdateBuilder extends SqlBuilder implements UpdateInterface
{

    public function update($table) 
    {
        $this->sqlBuilder .= "update {$table}";

        return $this;
    }

    public function set(Array $fields) 
    {
        $key    = array_keys($fields)[0];
        $value    = $fields[$key];

        $this->sqlBuilder .= " set `{$key}` = '{$value}'";

        return $this;
    }

    public function build() 
    {
        
    }

    public function execute() 
    {

    }

    public function buildSql() 
    {
        echo $this->sqlBuilder;
    }

}
