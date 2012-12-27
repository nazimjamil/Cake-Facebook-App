<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $name = 'Index';
	public $components = array('Facebook', 'Session', 'RequestHandler');
	public $helpers = array('Html', 'Form', 'Js');

	function Index() {
		$this -> layout = 'default';
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
		$this -> disableCache();
		$this -> autoRender = false;
		$this -> layout = false;
		if ($this -> Index -> save($this -> data)) {
			$this -> Session -> setFlash('Data saved');
			$this -> redirect('/index/form');
		} else {
			$this -> Session -> setFlash('Data NOT saved');
			$this -> redirect('/index/form');
		}
		
	}

	function form() {
		$this -> layout = 'default';
		$this -> set ('page_title', 'Form');
	}
}