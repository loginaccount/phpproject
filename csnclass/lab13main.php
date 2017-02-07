<?php
ob_start();
session_start();
?>

<?php 
	define ('PAGETITTLE', 'Lab13 - State Management (Restricted Page)');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">



<?php
	
	if (isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$username = base64_decode($username);

	} 
	else 
	{
		$username = '';
	}
	if ($username != '')
	{
		if(isset($_POST['logout']))
		{
			$_SESSION = array();
			session_destroy();
			echo 'Thank you for using this app.<br/>';
			echo "Click <a href = lab13.php>here</a> to login.<br/>";
			
		} 
		
		else 
		{
			echo "Welcome Back $username<br/>";
			echo '<br/>';
			echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed 
			do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
			enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
			ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
			reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
			pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
			culpa qui officia deserunt mollit anim id est laborum.';
			echo '<br/>';
			echo '<br/>';
			echo '<form method = post action = lab13main.php>';
			echo '<input type = submit name = logout value = Logout>';
			echo '</form>';
			echo '<br/>';
			echo time();
		
		}
		
	} 
	
	else 
	{
		echo "Restricted page. Please <a href = lab13.php>login</a> first.<br/>";
		header('Location: lab13.php');
		return;
	}
?>
<br /><br />
Created on March 3, 2015
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>