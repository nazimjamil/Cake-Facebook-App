<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $name = 'Index';
	public $components = array('Facebook', 'Session', 'RequestHandler');
	public $helpers = array('Html', 'Form', 'Js');

	function Index() {
		$this -> set('page_title', 'Facebook Application');
		$this -> set ('like', $this -> Facebook -> liked());
		if ($this -> request -> isMobile()) {
			echo 'this is mobile';
		}
	}
}