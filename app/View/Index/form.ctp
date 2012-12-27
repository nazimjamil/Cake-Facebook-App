<?php
	echo $this -> Session -> flash();
	echo $this -> Form -> create('Users', array('action' => '../index/ajax'));

	echo $this -> Form -> input('fbuid');
	echo $this -> Form -> input('fname');
	echo $this -> Form -> input('lname');
	echo $this -> Form -> input('email');
	echo $this -> Form -> checkbox('tnc', array('hiddenField' => false));

	echo $this -> Form -> end('save');
?>