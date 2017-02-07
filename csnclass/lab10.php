<?php 
	define ('PAGETITTLE', 'Lab 10 - Form Handling');
	include_once('config.php');
	include_once('header.php'); 
?>

<style type="text/css">

input,
textarea,
select
{
	background-color:#ffffff;
	color:#000000;	
	
}
input[class=Error]
{
	font-weight: bold;
	background-color: #EE0000;
	color:#000000;
}

			
</style>


<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">
<pre>
<form method='post'>

<?php
$errormessages 		= '';
$firstname 			= '';
$lastname 			= '';
$middlename 		= '';
$username			= '';
$emailaddress 		= '';
$password 			= '';
$confirmpassword 	= '';
$birthyear 			= '';
$comments			= '';
$agree				= '';
$yearList = range(date('Y'),1900);

$firstnameremarks 			= '';
$lastnameremarks 			= '';
$middlenameremarks 		= '';
$usernameremarks			= '';
$emailaddressremarks 		= '';
$passwordremarks 			= '';
$confirmpasswordremarks 	= '';

$agreeremarks				= '';


$firstnameclass 			= '';
$lastnameclass 			= '';
$middlenameclass 		= '';
$usernameclass			= '';
$emailaddressclass 		= '';
$passwordclass 			= '';
$confirmpasswordclass 	= '';



if (isset($_POST['btnSubmit'])){
	$lastname 			= trim($_POST['txtLastname']);
	$firstname 			= trim($_POST['txtFirstname']);
	$middlename 		= trim($_POST['txtMiddlename']);
	$emailaddress 		= trim($_POST['txtEmailAddress']);
	$username			= trim($_POST['txtUsername']);
	$birthyear          = $_POST['ddlBirthYear'];
	$password 			= trim($_POST['txtPassword']);
	$confirmpassword	= trim($_POST['txtConfirmPassword']);
	$comments            = trim($_POST['txtComments']);
	$agree 				= (isset($_POST['chkAgree'])) ? "Agree" : "";
	
	if($lastname == ''){
		$errormessages .= 'Invalid Last Name.<br>';
		$lastnameremarks = '*';
		$lastnameclass = 'Error';
	}

	if($firstname == ''){
		$errormessages .= 'Invalid First Name.<br>';
		$firstnameremarks = '*';
		$firstnameclass = 'Error';
	}

	if($username == ''){
		$errormessages .= 'Invalid Username.<br>' ;
		$usernameremarks = '*';
		$usernameclass = 'Error';
	}
	if(strlen($password) < 6){
		$errormessages .= 'Invalid Password.<br>';
		$passwordremarks = '*';
		$passwordclass = 'Error';
	}

	if($password != $confirmpassword){
		$errormessages .= 'Password Mismatched.<br>';
		$confirmpasswordremarks = '*';
		$confirmpasswordclass = 'Error';
	}

	if(preg_match('/^[a-z0-9_\-.]+@[a-z0-9_.\-]+$/i',$emailaddress) == ''){
		$errormessages .= 'Invalid Email Address.<br>';
		$emailaddressremarks = '*';
		$emailaddressclass = 'Error';
	}

	if(!isset($_POST['chkAgree'])){
		$errormessages .= 'You must agree.';
		$agreeremarks = '*';
	}

	if ($errormessages != ''){
		echo "<b>ERROR:</b> <br>$errormessages<br>";
	}
	
	
}

	if( ($errormessages == '') && (count($_POST) > 0) ){
		echo '<table border="1" width="80%">';
		echo '<td><table border="1" width="100%">';
		echo "<tr><th colspan='2'align = center>User Registration Form</th></tr>";
		echo "<tr><td colspan='2'align = center><b>Data accepted<b></td></tr>";
		echo "<tr><td colspan='2'><b>Your information:<b></td></tr>";
		_tr('Last Name :', $lastname);
		_tr('First Name :',$firstname);
		_tr('Middle Name :', $middlename);
		_tr('Birth Year', $yearList[$birthyear]);
		_tr('Email Address :', $emailaddress);
		_tr('Username :', $username);
		_tr('Comments :',$comments);
		echo '</table></td>';
		echo '</table>';
	}
	else{
		echo "<table border='1' >";
		echo "<tr><th colspan='2' align=center>User Registration Form</th></tr>";
		_tr('Last Name', "<input class=$lastnameclass type=text  name=txtLastname   value='$lastname' /> $lastnameremarks");
		_tr('First Name', "<input class=$firstnameclass type=text name=txtFirstname value='$firstname' /> $firstnameremarks");
		_tr('Middle Name', "<input class=$middlenameclass type=text name=txtMiddlename value='$middlename' />$middlenameremarks");
		_tr('Birth Year', generate_dropdown('ddlBirthYear', $birthyear, $yearList) );
		_tr('Email Address', "<input class=$emailaddressclass type=text name=txtEmailAddress value='$emailaddress' /> $emailaddressremarks" );
		_tr('Username', "<input class=$usernameclass type=text name=txtUsername value='$username'/> $usernameremarks");
		_tr('Password', "<input type=password name=txtPassword class=$passwordclass  value='$password'> $passwordremarks");
		_tr('Confirm', "<input type=password name=txtConfirmPassword class=$confirmpasswordclass  value='$confirmpassword'/> $confirmpasswordremarks");
		_tr('Comments', generate_textarea('txtComments', $comments));
		_tr('I agree on 
Terms and Conditions', "<input  type=checkbox name=chkAgree value='$agree' />");
		_tr("&nbsp;" , "<input type=submit name=btnSubmit onclick='return confirm(\"Do you want to submit data?\")' /> <input type=reset name=btnReset />");
		
		echo "</table>";
		
	}
function _tr($td1,$td2){
	echo "<tr>";
	echo "<td>$td1</td>";
	echo "<td>$td2</td>";
}

function generate_dropdown($name, $currentvalue, $values) 
{
	$html = "<select name=\"$name\" >";
	foreach ($values as $key => $caption) {
		$selected = ($key == $currentvalue) ? 'selected=selected' : '';
		$html .= "<option $selected value=\"$key\">$caption</option>";
	}
	$html .= '</select>';	
	return $html;
}

function generate_textarea($name, $value) {
	return '<textarea cols="22" name="' . $name . '">' . $value . '</textarea>';
}
?>

</form>
</pre>

<br /><br />
Created on February 6, 2016
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>