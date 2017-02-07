
<?php 
	define ('PAGETITTLE', 'Lab 2 - Creating Basic PHP Script');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

<?php

    $product_id = 1001;
    $product_name = 'OSVR Hacker Dev Kit v1.3';
    $description = 'Open Source Virtual Reality Head mounted Display';
    $price = 299.99;
    $sku_number = '1001';
    $stock_on_hand = 100;
    $unit = 'pcs';
    $image_url = $product_id . ".png";

    echo '<table border = 1>';
    echo '<tr><td colspan = 2><strong>Product Details</strong></td></tr>';
    echo "<tr><td>Product ID</td><td>$product_id</td></tr>";
    echo "<tr><td>Product Name</td><td>$product_name</td></tr>";
    echo "<tr><td>Description</td><td>$description</td></tr>";
    echo "<tr><td>Price</td><td>$price USD</td></tr>";
    echo "<tr><td>SKU No.</td><td>$sku_number</td></tr>";
    echo "<tr><td>Quantity</td><td>$stock_on_hand $unit</td></tr>";
    echo "<tr><td>Image</td><td><img src='1001.png' width='250' height='250'></td></tr>";    
    echo '</table>';
?>

<br /><br />
Created on November 12, 2015
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>
