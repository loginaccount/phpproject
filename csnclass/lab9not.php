<h1>Lab 9 - OOP in PHP</h1>
<?php 
//lab9.php
include_once('lab9classes.php');
$myself = new Student('Denver','April 15, 1998','Male');
$myself->imageurl = '';
echo '<table border =1>';
$myself->displayinfo();
echo '<tr><td><table>';

$mymother = new Employee('Hazel','99/99/9999','Female');
$mymother->sector = 'self';
$mymother->employer = 'Self';
echo '<table>';
$mymother->displayinfo();
echo '</table></td><td><table>';


$myfather = new Employee('VER','99/99/9999','Male');
$myfather->sector = 'Self';
$myfather->employer = 'Self';
echo '<table>';
$myfather->displayinfo();
echo '</td></table>';
?>