<?php

abstract class BaseService
{
    protected $_instance;

    public function getInstance() 
    {
        if (BaseService::$_intance) {
            return $BaseService::getInstance();
        }

        return new BaseServce();
    }
}
