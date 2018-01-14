<?php 
namespace Core\Lib\Db;

abstract class SqlBuilder
{
    protected $sqlBuilder;

    public $table;
    
    public function from($table) 
    {
        $this->table = $table;

        $this->sqlBuilder .= " from `{$table}`";

        return $this;
    }

    public function where(Array $where) 
    {
        $key    = array_keys($where)[0];
        $value    = $where[$key]; 
        $this->sqlBuilder .= " where `{$key}` = '{$value}'";

        return $this;
    }

    public function andWhere($where) 
    {
		if (!is_array ($where)) {
        	$this->sqlBuilder  .= " and $where";
			
			return $this;
		}

        $key    			= array_keys($where)[0];
        $value    			= $where[$key]; 
        $this->sqlBuilder  .= " and where `{$key}` = '{$value}'";

		return $this;
    }

    public function orWhere(Array $where) 
    {
    }

    private function prepareWhere(Array $where) 
    {

    }

    public abstract function buildSql();

	public function groupBy ($what) {
		$this->sqlBuilder .= " group by {$what}";

		return $this;
	}

	public function between ($field, $start, $end) {
		if (strpos ($this->sqlBuilder, 'where')) {
			$this->sqlBuilder .= " and ({$field} between {$start} and {$end})";
				
			return $this;
		}

		$this->sqlBuilder .= " where ({$field} between {$start} and {$end})";

		return $this;
	}
}
