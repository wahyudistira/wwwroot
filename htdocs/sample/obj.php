<?php

class obj {
	public $id='test';
	public $name='test1';
	public $desc='test2';
	public $user='test3';

	function __toString(){
	   return json_encode((array)$this);
	}

}

// $obj = new obj();
// $x = $obj->toString();


$obj = new obj();
$x  = serialize($obj);
print_r($x);
echo "<br>";
$j=unserialize($obj);
print_r($j);