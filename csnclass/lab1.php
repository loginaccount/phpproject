
<?php 
	define ('PAGETITTLE', 'Lab 1 - Hello World');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

	1. Hello World from HTML.<br>
<?php
	echo '2. Hello World from PHP. <br>';
	echo 'Today is',
		date(' m/d/Y '), '<br>';
		
	echo 'Your lucky numbers are ',
		mt_rand(1,45), ' and ' ,
		mt_rand(1,45), '<br>';
?>
	<script>
		document.writeln('3. Hello World from JavaScript.');
	</script>

<br /><br />

Created on November 10, 2015 
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>
