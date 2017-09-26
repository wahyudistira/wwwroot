<?php
/**
* unserialize.php
*/
include_once("student.php");
$content = file_get_contents("test.txt");
$unserialized = unserialize($content);

print_r($unserialized);//Student Object ( [name] => Nanhe Kumar [roll:Student:private] => 1 [age:protected] => 16 ) 

echo "<br>";echo "<br>";echo "<br>";
$json = json_encode($content);
echo "json-encode =>".$json;
// simpan file ke dalam file .txt
file_put_contents("json.txt", $json);
echo "<br>";

// keluar hasil .txt  dengan hasil json decode
$content_json = file_get_contents("json.txt");
$jDecode = json_decode($content_json);
echo "json decode => ".$jDecode;
echo "<br>";echo "<br>";echo "<br>";
/*
echo "<br>";
echo $x['Student'];
*/

$uns =  (array)unserialize($jDecode); 
var_dump($uns);
echo "<br>";echo "<br>";echo "<br>";
echo $uns['name']."   ".$uns['nickname'];



?>