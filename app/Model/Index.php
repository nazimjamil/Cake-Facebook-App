<?php

App::uses('Model', 'Model');

class Index extends AppModel {
	public $name = 'Index';
	public $hasOne = 'Users';
	public $validate = array(
		'fname' => 'alphaNumeric',
		'lname' => 'alphaNumeric',
		'email' => 'email'
	);

	function save($data) {
		$this-> Users ->create();
		if ($this -> Users -> Save($data) ) {
			return true;
		}
	}

	function showAllUsers() {
		$users = $this -> Users -> find('all');
		debug($users);
	}
}