<?php

require_once CORE_DIR . '/Lib/Entity/BaseEntity.php';
require_once CORE_DIR . '/Lib/Entity/EntityManager.php';

use Core\Lib\Entity\BaseEntity;
use Core\Lib\Entity\EntityManager;

class RunController
{
    
    public function index() 
    {
        print_r('<hr/>');
        print_r('hello world !' . "\n");
        print_r('<hr/>');

        $res = select(
            [
            'id',
            'name'
            ]
        )
        ->from('user')
        ->where(
            [
            'password' => '111111'
            ]
        )
        ->limit(1, 10)
        ->execute();

        print_r($res);

        print_r('<hr/>');

        update('user')
        ->set(
            [
            'age' => 15
            ]
        )
        ->where(
            [
            'id' => '2'
            ]
        )
        ->buildSql();
        
        print_r('<hr/>');

        delete('user')
        ->where(
            [
            'name' => 'zys'
            ]
        )
        ->buildSql();

        print_r('<hr/>');

        insert('user')
        ->values(
            [
            'name' => 'zys',
            'age'  => 18
            ]
        )
        ->buildSql();
    }

    public function test() 
    {
        $entity    = new BaseEntity('\Model\Activity\VotesModel');
        $entity = $entity->setCurrentPage(2)
            ->setPageSize(20)
            ->setReturnType('object')
            ->fetchAll();

        print_r('<pre>');
        print_r($entity);
    }

    public function walk() 
    {
        $entity    = new BaseEntity('\Model\UserModel');
        $entity = $entity->setCurrentPage(1)
            ->setPageSize(20)
            ->setReturnType('object')
            ->fetchAll();

        print_r('<pre>');
        print_r($entity);
    }

    public function doo() 
    {
    }

	public function clause()
	{
		echo '<hr/>';	

		function test($aaa) {
			return function() use ($aaa) {
				echo $aaa . "aa";
			};
		}

		$fun = test('sss');
		$fun();

		echo '<hr/>';

		\Core\Event\BaseEvent::listen('walk', function ($a) {
			echo 'walking' . $a;
		});

		\Core\Event\BaseEvent::trigger('walk', 'aa');

		echo '<hr/>';

		\Core\Event\BaseEvent::listen('say', ['A', 'say']);
		\Core\Event\BaseEvent::listen('say', 'A::say');

		\Core\Event\BaseEvent::trigger('say');
	}
}

class A {
	public static function say () {
		echo 'trigger say';
	}
}
