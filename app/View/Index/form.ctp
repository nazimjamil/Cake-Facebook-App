<?php
	echo $this->Form->create();

	echo $this->Form->input('fbuid');   //text
	echo $this->Form->input('fname');   //password
	echo $this->Form->input('lname');   //day, month, year, hour, minute, meridian
	echo $this->Form->input('email');      //textarea

	echo $this->Form->end('save');
?>