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

			
			$imagepath = '/csnclass/img/products/';
			echo '<a href="lab11.php">Search Products</a>';
			echo ' >> Checkout<br /><br />';
			$found = false;
			$total = 0;
			if (isset($_POST['selected'])) {
				echo '<table border=1 width=100%>';
				echo "<tr><th colspan=3>Selected Products for Checkout</th></tr>";
				foreach ($_POST['selected'] as $productcode) {
					if (isset($products[$productcode])) {
					$product = $products[$productcode];
					$filename = $product[0];
					$productcode = $product[1];
					$description = $product[2];
					$amount = $product[3];
					$url = "<img src='$imagepath$filename' width='40' height='40'>"; 
					$total = $total + preg_replace("/[^0-9.]+/", "", $amount); 
					echo "<tr>";
					echo "<td>$url</td>";
					echo "<td>$productcode - $description</td>";
					echo "<td>$amount</td>";
					echo "</tr>";
					$found = true;	
					}
				}
				echo "<tr><td colspan=2 style=\"text-align:right\">Total Price</td><td style=\"text-align:right\">Php $total</td></tr>";
				echo '</table><br />';
			}
			if (!$found)
				echo "No products selected";
			echo '<form method="post" action="lab11.php">';
			echo '<input type="submit" name="btnSearch" value="Search Products"> ';
			if ($found)
				echo ' <input type="button" name=btnBuy value="Buy Products">';
			echo '</form>';
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