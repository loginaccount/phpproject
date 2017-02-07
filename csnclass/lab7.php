<?php 
	define ('PAGETITTLE', 'Lab 7 - String Manipulations');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">
<pre>
<?php

$string = isset($_POST['string']) ? $_POST['string'] : ' an online guide to html form <input> tag ';
/*
if(isset($_POST['string']))
{
	$string = $_POST['string'];
}
else 
{
	$string ='';
}
*/

echo '<form method=post action="">';
echo 'Enter a string : ';
echo '<input type="text" name="string" value="', $string, '" title="Enter a text"><br /><br />';
echo '<input type="submit" value="Apply Functions">&nbsp;';
echo '<input type="reset" value="Reset"><br />';
echo '</form>';

echo '<br>';
	if ($string !='')
	{
		echo '<table border = 1 width=100%>';
		echo '<tr>';
		echo '<td>Original String</td>';
		echo '<td>*',htmlspecialchars($string),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>1. Length of String</td>';
		echo '<td>*', htmlspecialchars(strlen($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>2. Number of Words</td>';
		echo '<td>*', htmlspecialchars(str_word_count($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>3. First Character to Uppercase</td>';
		echo '<td>*', htmlspecialchars(ucfirst($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>4. Proper Case</td>';
		echo '<td>*', htmlspecialchars(ucwords($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>5. To Lower Case</td>';
		echo '<td>*', htmlspecialchars(strtolower($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>6. To Upper Case</td>';
		echo '<td>*', htmlspecialchars(strtoupper($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>7. Without Leading spaces</td>';
		echo '<td>*', htmlspecialchars(ltrim($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>8. Without Trailing spaces</td>';
		echo '<td>*', htmlspecialchars(rtrim($string)),'*</td>';
		echo '</tr>';
		
	
		
		echo '<tr>';
		echo '<td>9. Without leading and trailing spaces</td>';
		echo '<td>*', htmlspecialchars(trim($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>10. md5</td>';
		echo '<td>*', (md5($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>11. sha1</td>';
		echo '<td>*', (sha1($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>12. base64_encode</td>';
		echo '<td>*', (base64_encode($string)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>13. First 16 characters</td>';
		echo '<td>*', (substr($string,0,16)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>14. Last 4 characters</td>';
		echo '<td>*', (substr($string,-4)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>15. 4 characters starting from the 20th character</td>';
		echo '<td>*', (substr($string,20,4)),'*</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>16. Position of the word "guide"</td>';
		echo '<td>', var_dump(strpos($string,'guide')) ,'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>17. Position of the word "UE"</td>';
		echo '<td>', var_dump(strpos($string,'UE')) ,'</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td>18. All vowels in uppercase</td>';
		echo '<td>*',htmlspecialchars(str_ireplace(array('a','e','i','o','u'),array('A','E','I','O','U'),$string)),'*</td>';
		echo '</tr>';
		
		$newString = trim($string);
	    $arrString = explode(" ", $newString);
		
		echo '<tr>';
    	echo '<td>19. Strings converted to array</td>';
    	echo '<td>';
    	foreach($arrString as $word)
    	{
        	echo '*',htmlspecialchars($word),'* <br>';
		}
		echo '</td>';
        echo '</tr>';
	
	
		echo '</table>';

	}

?>
</pre>

<br /><br />
Created on January 14, 2016
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>