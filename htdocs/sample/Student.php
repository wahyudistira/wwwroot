<?php
/*
* student.class.php
*/
class Student {

    public $name;
	public $nickname;
    private $roll;
    protected $age;
    static $class;

    public function __construct() {
        $this->name = "Nanhe Kumar";
		$this->nickname ="kumala dewi";
        $this->roll = 1;
        $this->age = 16;
        Student::$class = "10+2";
    }

}
?>