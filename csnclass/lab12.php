<?php 
	define ('PAGETITTLE', 'Lab 12 - Dynamic Content Using URL Token');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">
<?php
$page = 0;

if(isset($_GET['page']))
{
	$page = $_GET['page'];
}
if(($page<0)||($page>10))
{
	$page=0;
}
if($page==0)
{
	TOC();
}
else
{
	echo "<a href=?page=0>| Index |</a>";
	echo "<a href=?page=1> First |</a>";
	$prev = $page - 1;
	echo "<a href=?page=$prev> Prev |</a>";
	$next = $page + 1;
	echo "<a href=?page=$next> Next |</a>";
	echo "<a href=?page=10> Last |</a>";
	
	$filename = "lab12\lab12page$page.php";
	
	if(@is_readable($filename))
	{
		@include_once($filename);
	}
	
	else
	{
		echo 'ERROR 404. File not found';
	}




	echo '<br>';
	echo "<a href=?page0>Index</a> | ";
	for ($i=1; $i<=10; $i++) 
	{
		echo "<a href=?page=$i>$i.</a> | ";
	}

	echo '<br>';
	echo '<form>';
	echo '<select name=page onchange="this.parentNode.submit()">';
	echo "<option value=0>Index</option>";
	for ($i=1; $i<=10; $i++) 
	{
		echo "<option value=$i>Page $i</option>";
		
	}
	echo '</form>';
	echo '</select>';


}




	function TOC()
	{
		echo '<table border =2>';
		echo '<tr><td colspan =2>TOP 10 MUSICIANS OF ALL TIME</td></tr>';
		echo '<tr><td>1.</td><td><a href="?page=1">William Hung</td></a></tr>';
		echo '<tr><td>2.</td><td><a href="?page=2">Ludwig van Beethoven</td></a></tr>';
		echo '<tr><td>3.</td><td><a href="?page=3">The Beatles</td></a></tr>';
		echo '<tr><td>4.</td><td><a href="?page=4">Michael Jackson</td></a></tr>';
		echo '<tr><td>5.</td><td><a href="?page=5">Louis Armstrong</td></a></tr>';
		echo '<tr><td>6.</td><td><a href="?page=6">Elvis Presley</td></a></tr>';
		echo '<tr><td>7.</td><td><a href="?page=7">Wolfgang Amadeus Mozart</td></a></tr>';
		echo '<tr><td>8.</td><td><a href="?page=8">Bob Dylan</td></a></tr>';
		echo '<tr><td>9.</td><td><a href="?page=9">Robert Johnson</td></a></tr>';
		echo '<tr><td>10.</td><td><a href="?page=10">Guido of Arezzo</td></a></tr>';
		echo '</table>';
		echo '<br>';

		echo '<table border=2>';
		echo '<tr>';
			echo '<td><a href="?page=1"><img src="lab12/lab12images/william.jpg" width="150" height="100"></a></td>';
			echo '<td><a href="?page=2"><img src="lab12/lab12images/ludwig.jpg" width="150" height="100"></a></td>';
			echo '<td><a href="?page=3"><img src="lab12/lab12images/the.jpg" width="150" height="100"></a></td>';
			echo '<td><a href="?page=4"><img src="lab12/lab12images/mj.jpg" width="150" height="100"></a></td>';
			echo '<td><a href="?page=5"><img src="lab12/lab12images/louis.jpg" width="150" height="100"></a></td>';
		echo '</tr>';
		echo '<tr>';
			echo '<td><a href="?page=6"><img src="lab12/lab12images/elvis.jpg" width="150" height="100"></a></td>';
			echo '<td><a href="?page=7"><img src="lab12/lab12images/mozart.jpg" width="150" height="100"></a></td>';
			echo '<td><a href="?page=8"><img src="lab12/lab12images/bob.jpg" width="150" height="100"></a></td>';
			echo '<td><a href="?page=9"><img src="lab12/lab12images/robert.jpg" width="150" height="100"></a></td>';
			echo '<td><a href="?page=10"><img src="lab12/lab12images/guido.jpg" width="150" height="100"></a></td>';;
		echo '</tr>';
		echo '</table>';

	echo '<br>';
	echo '<form>';
	echo '<select name=page onchange="this.parentNode.submit()">';
	echo "<option value=0>Index</option>";
	for ($i=1; $i<=10; $i++) 
	{
		echo "<option value=$i>Page $i</option>";
		
	}
	echo '</form>';
	echo '</select>';


	
	}

		echo '<br>';
		echo '<br>';
		echo 'Source: <a href="http://www.laweekly.com/music/top-20-musicians-of-all-time-in-any-genre-the-complete-list-2401986">http://www.laweekly.com/music/top-20-musicians-of-all-time</a>';


?>
<br /><br />
Created on Febuary 18, 2016
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>