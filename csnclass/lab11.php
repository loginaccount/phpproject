<?php 
	define ('PAGETITTLE', 'Lab 11 - Form Handling');
	include_once('config.php');
	include_once('header.php'); 
	include_once('productsdata.php');
	$products = getProducts();
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">
<pre>

<?php
			
			$numMatches = 0;

			echo '<form method=get action=lab11.php>';
			echo 'Enter Product ID or Description ';
			echo '<input type=text name=txtSearch>&nbsp;';
			echo '<input type=submit name=btnSearch>';
			echo '</form>';

			//form data retrieval
			$txtSearch = '';
			if (isset($_GET['txtSearch']))
				$txtSearch = trim($_GET['txtSearch']);
				
			if ($txtSearch != '') {
				echo "<br>Search result for <b>$txtSearch</b>";
				echo '<form method=post action=lab11process.php>';
				echo '<table border=1 width=100%>';
				echo '<tr><td>Image</td><td>ID</td><td>Description</td><td>Amount</td><td>Buy</td></tr>';
				foreach ($products as $index => $details) {
					$image       = $details[0];
					$id          = $details[1];
					$description = $details[2];
					$price       = $details[3];
					$matched     = false;
					$url = "/csnclass/img/products/$image";
					
					
					if (stripos($description, $txtSearch) !== false)
						$matched = true;
						
					if (stripos($id, $txtSearch) !== false)
						$matched = true;
						
					if (stripos($price, $txtSearch) !== false)
						$matched = true;
						
					if ($matched == true) {
						$numMatches += 1;
						echo '<tr>';
						echo "<td><img src='$url'></td>";
						echo "<td>$id</td>";
						echo "<td>$description</td>";
						echo "<td>$price</td>";
						echo "<td><input type=checkbox name=selected[] value=$id></td>";
						echo '<tr>';
					}
				}
				
				echo '<tr>';
				echo '<td colspan=5>';
				if ($numMatches == 0)
					echo "No matching products found for <b>$txtSearch</b>";
				else {
					echo "$numMatches records found for <b>$txtSearch</b>";
					echo '<br><br>';
					echo '<input type=submit name=btnBuy value="Buy Selected">';
				}
				echo '</td>';
				echo '</tr>';
				echo '</table>';
				echo '</form>';
			}
			
			?>
</pre>

<br /><br />
Created on  February 16, 2015
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>