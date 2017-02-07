<?php
class Person {
	private $name = '';
	public $birthdate = '';
	public $gender = '';
	public $mother=null;
	public $father=null;
	public $imageurl='';
	public function __construct($name, $birthdate, $gender) {
		$this->setName($name);
		$this->gender = $gender;
		$this->birthdate = $birthdate;
	}
	public function setName($name) {
		$this->name = strtoupper($name);
	}
	public function getName() {
		return $this->name;
	}
	protected function displayrow($caption, $value) {
		echo "<tr><td>$caption</td><td>$value</td></tr>";
	}
	public function displayImage() {
		$img = "<img width='200' height='200' src='{$this->imageurl}'>";
		$this->displayrow('Image',$img);
		//if ($this->imageurl != '')
		//	echo "<tr><td>&nbsp;</td><td><img src=\"{$this->imageurl}\" /></td></tr>";
	}
	public function displayInfo() {
		$this->displayrow('Name', $this->name);
		$this->displayrow('Birthdate', $this->birthdate);
		$this->displayrow('Gender', $this->gender);
	}
}

class Employee extends Person {
	protected $type='Employee';
	public $employer='';
	public $sector = '';
	
	public function displayInfo() {
		parent::displayInfo();
		$this->displayrow('Type', $this->type);
		$this->displayrow('Sector', $this->sector);
		$this->displayrow('Employer', $this->employer);
	}
}

interface iFriends {
	public function addFriend($f);
	public function displayFriends();
}
	
class Student extends Person implements iFriends {
	public $school='';
	public $course='';
	public $year='';
	public $friends=array();
	public function displayInfo() {
		parent::displayInfo();
		$this->displayrow('School', $this->school);
		$this->displayrow('Course', $this->course);
		$this->displayrow('Year', $this->year);
	}
	public function addFriend($friend) {
		$this->friends[] = $friend;
	}
	public function displayFriends() {
		$i=0;
		echo '<table border="1" width="100%">';
		foreach ($this->friends as $friend) {
			if ($friend instanceof Person) {
			$i++;
			echo '<tr><th colspan=2>',$i,': Class : ', get_class($friend),'</th></tr>';
			$friend->displayInfo();
			$friend->displayImage();
			}
		}
		echo '</table><br/>';
	}
}
?>