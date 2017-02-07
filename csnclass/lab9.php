<?php 
	define ('PAGETITTLE', 'Lab 9 - OOP In PHP');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

<?php
	include_once('lab9classes.php');
	
	echo "<h3>Me</h3><br>";
	$myself = new Student('ARQUIZA, Denver E.','April 15, 1998','Male');
	$myself->imageurl = 'imglab9/me.jpg';
	$myself->school = "University of the East";
	$myself->course = "Computer Science";
	$myself->year = "2nd";
	echo '<table border=1 width=100%>';
	$myself->displayinfo();
	$myself->displayImage();
	echo'</table>';
	
	echo "<br><br>";
	
	echo "<h3>My Parents</h3><br>";
	echo "<table border=1 width=100%>";
	$mymother = new Employee('Hazel E. Arquiza','November 15, 1978','Female');
	$mymother->imageurl = 'imglab9/mom.jpg';
	$mymother->sector   = 'Public';
	$mymother->employer = 'Self';
	echo '<tr><th>Mother<br></th><th>Father<br>(Employee Object)</th></tr>';
	echo '<tr><td>';
	echo '<table border=1 width=100%>';
	$mymother->displayinfo();
	$mymother->displayImage();
	echo'</table></td>';
	echo'</td>';
	
	$myfather = new Employee('My Dad','October 16','Male');
	$myfather->imageurl = 'imglab9/dad.jpg';
	$myfather->sector   = 'Public';
	$myfather->employer = 'Self';	
	echo '<td>';
	echo '<table border=1 width=100%>';
	$myfather->displayinfo();
	$myfather->displayImage();
	echo'</table></td>';
	echo'</td></tr>';
	echo "</table>";
	echo '<br><br>';
	
	$friends[10] = new Person('Eminem', 'October 17, 1972', 'Male');
	$friends[10]-> imageurl = 'imglab9/Eminem.jpg';
	$friends[9] = new Person('Katheryn Elizabeth "Katy" Hudson', 'October 25, 1984' , 'Female');
	$friends[9]-> imageurl = 'imglab9/katy.jpg';
	$friends[8] = new Person('Taylor Alison Swift ', 'December 13, 1989', 'Female');
	$friends[8]-> imageurl = 'imglab9/Taylor.jpg';
	$friends[7] = new Person('Justin Drew Bieber', 'March 1, 1994', 'Male');
	$friends[7]-> imageurl = 'imglab9/jus.jpg';
	$friends[6] = new Person('Robyn Rihanna Fenty', 'February 20, 1988', 'Female');
	$friends[6]-> imageurl = 'imglab9/rih.jpg';
	$friends[5] = new Person('One Direction', 'The X Factor in 2010', 'Boy Band');
	$friends[5]-> imageurl = 'imglab9/one.jpg';
	$friends[4] = new Person('Smosh', '2003', 'Male');
	$friends[4]-> imageurl = 'imglab9/Smosh.jpg';
	$friends[3] = new Employee('Ian Andrew Hecox', 'November 30, 1987', 'Male');
	$friends[3]-> imageurl = 'imglab9/Ian.jpg';
	$friends[3]->sector = 'Private';
	$friends[3]->employer = 'Smosh';
	$friends[2] = new Employee('YouTube', 'February 14, 2005', 'Internet');
	$friends[2]-> imageurl = 'imglab9/you.jpg';
	$friends[2]->sector = 'Private';
	$friends[2]->employer = 'YouTube';
	$friends[1] = new Person('German Garmendia', 'April 25,1990', 'Male');
	$friends[1]-> imageurl = 'imglab9/ger.jpg';
	$friends[0] = new Person('Felix Arvid Ulf Kjellberg', 'October 24,1989', 'Male');
	$friends[0]-> imageurl = 'imglab9/pewds.jpg';
	

	for ($i=0; $i<count($friends); $i++) {
		$myself->addFriend($friends[$i]);
	}
	echo '<h3>My Friends</h3><br>';
	echo '<h3>The most subscribed users on YouTube</h3><br>';
	$myself->displayFriends();
	
	echo 'Source: <a href="https://en.wikipedia.org/wiki/List_of_the_most_subscribed_users_on_YouTube">https://en.wikipedia.org/wiki/List_of_the_most_subscribed_users_on_YouTube</a>';
?>


<br /><br />
Created on February 3, 2016
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>