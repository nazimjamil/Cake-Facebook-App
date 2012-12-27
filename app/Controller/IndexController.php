<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $name = 'Index';
	public $components = array('Facebook', 'Session', 'RequestHandler');
	public $helpers = array('Html', 'Form', 'Js');

	function Index() {
		$this -> set('page_title', 'Facebook Application');
		// $this -> Facebook -> permissions();
		$this -> set ('like', $this -> Facebook -> liked());
		$this -> Index -> showAllUsers();
		if ($this -> request -> isMobile()) {
			echo 'this is mobile';
		}
	}

	function ajax() {
		header('Content-Type: application/json');
		$this->disableCache();
		$this -> autoRender = false;
		$this -> layout = false;
		$data = $this -> request -> query;
		if ($this -> Index -> save($data)) {
			echo 'success';
		} else {
			echo 'fail';
		}
	}

	function form() {
		$this -> layout = 'form';
		echo 'hello';
	}
}