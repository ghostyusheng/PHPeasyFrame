<?php

namespace Core\Model;

class BaseModel
{

    public function __construct($obj = null) 
    {
        if (!$obj) {
            return;
        }

        foreach ($obj as $attr => $val) {
            $this->$attr = $val;
        }
    }  

    public function __set($attr, $val) 
    {
        if (is_numeric($attr)) {
            return;
        }   
        $this->$attr = $val;    
    } 
    
}
