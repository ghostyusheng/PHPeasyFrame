<?php

class RunController {
	
	public function index () {
		print_r('<hr/>');
		print_r('hello world !' . "\n");
		print_r('<hr/>');

		select([
			'name',
			'age'
		])
		->from('user')
		->where([
			'id' => '12'
		])
		->buildSql();

		print_r('<hr/>');

		update('user')
		->set([
			'age' => 15
		])
		->where([
			'id' => '2'
		])
		->buildSql();
		
		print_r('<hr/>');

		delete('user')
		->where([
			'name' => 'zys'
		])
		->buildSql();

		print_r('<hr/>');

		insert('user')
		->values([
			'name' => 'zys',
			'age'  => 18
		])
		->buildSql();
}

public function test () {
	print_r('test');
}
}
