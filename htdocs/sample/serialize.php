<?php
/**
* serialize.php
*/
include_once("student.php");

//Serialize
$so = new Student();
$serialized = serialize($so);
file_put_contents("test.txt", $serialized);
echo $serialized; //O:7:"Student":3:{s:4:"name";s:11:"Nanhe Kumar";s:13:"Studentroll";i:1;s:6:"*age";i:16;}
?>