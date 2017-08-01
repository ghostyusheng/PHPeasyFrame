<?php

namespace Core\Lib\Db;

require_once 'SqlBuilder.php';
require_once 'InsertInterface.php';

class InsertBuilder extends SqlBuilder implements InsertInterface
{

    public function insert($table) 
    {
        $this->sqlBuilder .= "insert into `{$table}`";

        return $this;
    }

    public function values(Array $values) 
    {
        $this->sqlBuilder .= '(';

        $this->prepareKeys(array_keys($values));
        $this->prepareValues($values);

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

    private function prepareKeys(Array $keys) 
    {
        $keys = implode(',', $keys);

        $this->sqlBuilder .= $keys;

        $this->sqlBuilder .= ') ';
    }

    private function prepareValues(Array $values) 
    {
        $values = array_map(
            function ($v) {
                return "'{$v}'";
            }, $values
        ); 

        $this->sqlBuilder .= ' values(';
        $this->sqlBuilder .= implode(',', $values);
        $this->sqlBuilder .= ')';
    }
}
