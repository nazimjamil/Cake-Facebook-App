<?php

App::uses('Model', 'Model');

class Index extends Model {
	public $name = 'Index';
	public $hasOne = 'Users';
	public $validate = array('email' => array('email', 'required' => true));

	function save($data = null) {
		$this-> Users ->create();
		if ($this -> Users -> Save($data)) {
			return true;
		} else {
			header('HTTP/1.1 500 Internal Server Error');
		}
	}

	function showAllUsers() {
		$users = $this -> Users -> find('all');
		debug($users);
	}
}