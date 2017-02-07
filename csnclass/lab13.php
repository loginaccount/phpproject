<?php
	ob_start();
	session_start();
?>
<?php 
	define ('PAGETITTLE', 'Lab 13 - State Management (Login Page)');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

<?php
/*
if(isset($_COOKIE['X']))
{
	$x = $_COOKIE['X'];
}
else
{
	$x = 0;
}
$x = $x + 1;
setcookie('X',$x, time() + 30);
var_dump($x);
*/
echo'Session ID ',session_id(),'<br>';

$username = '';
$password = '';
$rememberme = false;
if(isset($_POST['login'])==false)
{	
	if(isset($_COOKIE['username']))
	{
		$username = $_COOKIE['username'];
		$rememberme = true;
	}
	
}

if(isset($_POST['login']))
{

	$username = $_POST['username'];
	$password = $_POST['password'];
	$rememberme = isset($_POST['rememberme']);
	if(authenticate($username,$password))
	{
		echo 'User Authenticated';
		if($rememberme)
		{
			setcookie('username',$username, time()+60*60*24*30);
		}
		else
		{
			setcookie('username','',0);
		}
		$_SESSION['username'] = base64_encode($username);
		header('Location: lab13main.php');
		return;
	}
	else
	{
		echo 'Invalid Username or Password';
		
	}
}

showloginform($username,$password,$rememberme);

function showloginform($username,$password ,$rememberme)
{
	if($rememberme)
	{
		$checked = 'checked';
	}
	
	else
	{
		$checked = '';
	}
	echo '<table border=0>';
	echo '<tr>';
	echo '<form method =post>';
	echo "<td>Username: </td><td><input type=text name=username value='$username'></td>";
	echo '</tr>';
	echo '<tr>';
	echo "<td>Password: </td><td><input type=password name=password></td>";
	echo '</tr>';
	echo '<tr>';
	echo "<td></td><td><input type =checkbox name=rememberme $checked>Remember me on this browser</td>";
	echo '</tr>';
	echo '<tr>';
    echo "<td></td><td><input type=submit value=login name=login></td>";
    echo '</tr>';
	echo '</form>';
	echo '</table>';
}
function authenticate($username,$password)
{
	if(($username!='')&($password =='12345'))
	{
		return true;
	}
	return false;
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