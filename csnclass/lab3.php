<?php 
	define ('PAGETITTLE', 'Lab 3 - Data Types, Operators, Expressions and Array');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

<?php
$intDecimal            	=	100;			
$intOctal              	=	0100;			
$intHexDecimal         	=	0x100;			
$dblNumber             	=	19.46;			
$strSingle              =   '$intDecimal apples';
$strDouble              =  	"$intDecimal apples";
$blnFALSE              	=	FALSE;
$blnTRUE               	=	TRUE;
$nothing               	=	NULL;
$arrNumbers            	=	array(1,2,3);
$arrMixed              	=	array(1,1.2,true,null,'CSN');
$arrEmpty				=	array();

	echo '<table border = 1 cellspacing = "1" width="800px">';
    echo '<tr><th colspan = 3>1. PHP Data Types</th></tr>';
    echo "<tr><th>No.</td><th>Expression</th><th>var_dump()Output</th></tr>";
    echo '<tr><td>1.1</td><td>$intDecimal</td><td>',var_dump($intDecimal),'</td></tr>'; 
	echo '<tr><td>1.2</td><td>$intOctal</td><td>',var_dump($intOctal),'</td></tr>'; 
	echo '<tr><td>1.3</td><td>$intHexDecimal</td><td>',var_dump($intHexDecimal),'</td></tr>';
	echo '<tr><td>1.4</td><td>$dblNumber</td><td>',var_dump($dblNumber),'</td></tr>'; 
	echo '<tr><td>1.5</td><td>$strSingle</td><td>',var_dump($strSingle),'</td></tr>'; 
	echo '<tr><td>1.6</td><td>$strDouble</td><td>',var_dump($strDouble ),'</td></tr>'; 
	echo '<tr><td>1.7</td><td>$nothing </td><td>',var_dump($nothing ),'</td></tr>'; 
	echo '<tr><td>1.8</td><td>$arrNumbers</td><td>',var_dump($arrNumbers),'</td></tr>'; 
	echo '<tr><td>1.9</td><td>$intHexDecimal</td><td>',var_dump($intHexDecimal),'</td></tr>';
	echo '<tr><td>1.10</td><td>$arrNumbers</td><td>',var_dump($arrNumbers),'</td></tr>'; 
	echo '<tr><td>1.11</td><td>$arrMixed </td><td>',var_dump($arrMixed ),'</td></tr>'; 
	echo '<tr><td>1.12</td><td>$arrEmpty</td><td>',var_dump($arrEmpty),'</td></tr>'; 
	
	echo '<tr><th colspan=3>2.Compound Assignment Operators</th></tr>';
	echo '<tr><td>2.1</td><td>$intDecimal</td><td>', var_dump($intDecimal), '</td></tr>';
	echo '<tr><td>2.2</td><td>$intDecimal += 4</td><td>', var_dump($intDecimal += 4), '</td></tr>';	
    echo '<tr><td>2.3</td><td>$intDecimal -= 6</td><td>', var_dump($intDecimal -= 6), '</td></tr>';	
    echo '<tr><td>2.4</td><td>$intDecimal *= 2</td><td>', var_dump($intDecimal *= 2), '</td></tr>';	
    echo '<tr><td>2.5</td><td>$intDecimal /= 2</td><td>', var_dump($intDecimal /= 2), '</td></tr>';	
    
	
	echo '<tr><th colspan=3>3. PHP Arithmetic Operators</th></tr>';
	echo '<tr><td>3.1</td><td>$intDecimal</td><td>', var_dump($intDecimal), '</td></tr>';
	echo '<tr><td>3.2</td><td>$intDecimal + 2</td><td>', var_dump($intDecimal + 2), '</td></tr>';	
    echo '<tr><td>3.3</td><td>$intDecimal - 2</td><td>', var_dump($intDecimal - 2), '</td></tr>';	
    echo '<tr><td>3.4</td><td>$intDecimal * 2</td><td>', var_dump($intDecimal * 2), '</td></tr>';	
    echo '<tr><td>3.5</td><td>$intDecimal / 2</td><td>', var_dump($intDecimal / 2), '</td></tr>';	
    echo '<tr><td>3.6</td><td>$intDecimal  % 2</td><td>', var_dump($intDecimal  % 2), '</td></tr>';	
    echo '<tr><td>3.7</td><td>$intDecimal++</td><td>', var_dump($intDecimal++), '</td></tr>';	
    echo '<tr><td>3.8</td><td>++$intDecimal</td><td>', var_dump(++$intDecimal), '</td></tr>';	
    echo '<tr><td>3.9</td><td>14 + $strDouble</td><td>', var_dump(14 + $strDouble), '</td></tr>';	
    echo '<tr><td>3.10</td><td>14 + $strSingle</td><td>', var_dump(14 + $strSingle), '</td></tr>';	
    echo '<tr><td>3.11</td><td>14 + $blnFALSE</td><td>', var_dump(14 + $blnFALSE), '</td></tr>';	
    echo '<tr><td>3.12</td><td>14 + $blnTRUE</td><td>', var_dump(14 + $blnTRUE), '</td></tr>';
    echo '<tr><td>3.13</td><td>14 + $nothing</td><td>', var_dump(14 + $nothing), '</td></tr>';	
 
    echo '<tr><th colspan=3>4. Bitwise Operator</th></tr>';
	echo '<tr><td>4.1</td><td>$intDecimal</td><td>', var_dump($intDecimal), '</td></tr>';
    echo '<tr><td>4.2</td><td>$intDecimal & 2</td><td>', var_dump($intDecimal & 2), '</td></tr>';
    echo '<tr><td>4.3</td><td>$intDecimal | 2</td><td>', var_dump($intDecimal | 2), '</td></tr>';
    echo '<tr><td>4.4</td><td>$intDecimal << 1</td><td>', var_dump($intDecimal), '</td></tr>';
    echo '<tr><td>4.5</td><td>$intDecimal  >> 1</td><td>', var_dump($intDecimal  >> 1), '</td></tr>';
    
    echo '<tr><th colspan=3>5. Comparison Operator</th></tr>';
	echo '<tr><td>5.1</td><td>$intDecimal</td><td>', var_dump($intDecimal), '</td></tr>';
    echo '<tr><td>5.2</td><td>$strDouble</td><td>', var_dump($strDouble), '</td></tr>';
    echo '<tr><td>5.3</td><td>$intDecimal == 100</td><td>', var_dump($intDecimal == 100), '</td></tr>';
    echo '<tr><td>5.4</td><td>$intDecimal > 100</td><td>', var_dump($intDecimal > 100), '</td></tr>';
    echo '<tr><td>5.5</td><td>$intDecimal < 100</td><td>', var_dump($intDecimal < 100), '</td></tr>';
    echo '<tr><td>5.6</td><td>$intDecimal >= 100</td><td>', var_dump($intDecimal>= 100), '</td></tr>';
    echo '<tr><td>5.7</td><td>$intDecimal  <= 100</td><td>', var_dump($intDecimal  <= 100), '</td></tr>';
    echo '<tr><td>5.8</td><td>$strDouble  == 100</td><td>', var_dump($strDouble  == 100), '</td></tr>';
    echo '<tr><td>5.9</td><td>$strDouble === 100</td><td>', var_dump($intDecimal===100), '</td></tr>';
    echo '<tr><td>5.10</td><td>$strDouble != 100</td><td>', var_dump($strDouble != 100), '</td></tr>';
    echo '<tr><td>5.11</td><td>$strDouble <> 100</td><td>', var_dump($strDouble <> 100), '</td></tr>';
    echo '<tr><td>5.12</td><td>$strDouble !== 100</td><td>', var_dump($strDouble !== 100), '</td></tr>';
   	
   	echo '<tr><th colspan=3>6. Logical Operator</th></tr>';
	echo '<tr><td>6.1</td><td>$intDecimal >= 100 || $intDecimal <= 100</td><td>', var_dump($intDecimal >= 100 || $intDecimal <= 100), '</td></tr>';
    echo '<tr><td>6.2</td><td>$intDecimal >= 100 or $intDecimal <= 100</td><td>', var_dump($intDecimal >= 100 or $intDecimal <= 100), '</td></tr>';
    echo '<tr><td>6.3</td><td>$intDecimal >= 100 && $intDecimal >= 200</td><td>', var_dump($intDecimal >= 100 && $intDecimal >= 200), '</td></tr>';
    echo '<tr><td>6.4</td><td>$intDecimal >= 100 and $intDecimal >= 200</td><td>', var_dump($intDecimal >= 100 and $intDecimal >= 200), '</td></tr>';
    echo '<tr><td>6.5</td><td>$blnTRUE || $blnFALSE</td><td>', var_dump($blnTRUE || $blnFALSE), '</td></tr>';
    echo '<tr><td>6.6</td><td>$blnTRUE && $blnFALSE</td><td>', var_dump($blnTRUE && $blnFALSE), '</td></tr>';
    echo '<tr><td>6.7</td><td>$blnTRUE xor $blnTRUE</td><td>', var_dump($blnTRUE xor $blnTRUE), '</td></tr>';
    echo '<tr><td>6.8</td><td>$blnFALSE xor $blnFALSE/td><td>', var_dump($blnFALSE xor $blnFALSE), '</td></tr>';
    echo '<tr><td>6.9</td><td>$blnTRUE xor $blnFALSE</td><td>', var_dump($blnTRUE xor $blnFALSE), '</td></tr>';
    echo '<tr><td>6.10</td><td>$blnFALSE xor $blnTRUE</td><td>', var_dump($blnFALSE xor $blnTRUE), '</td></tr>';
   
    echo '<tr><th colspan=3>7. Type Casting</th></tr>';
	echo '<tr><td>7.1</td><td>(int) $strDouble</td><td>', var_dump((int) $strDouble), '</td></tr>';
    echo '<tr><td>7.2</td><td>(int) $strSingle</td><td>', var_dump((int) $strSingle), '</td></tr>';
    echo '<tr><td>7.3</td><td>(float) $strDouble</td><td>', var_dump((float) $strDouble), '</td></tr>';
    echo '<tr><td>7.4</td><td>(float) $strSingle</td><td>', var_dump((float) $strSingle), '</td></tr>';
    echo '<tr><td>7.5</td><td>(boolean) $intDecimal</td><td>', var_dump((boolean) $intDecimal), '</td></tr>';
    echo '<tr><td>7.6</td><td>(boolean) $strDouble</td><td>', var_dump((boolean) $strDouble), '</td></tr>';
    echo '<tr><td>7.7</td><td>(boolean) $nothing</td><td>', var_dump((boolean) $nothing), '</td></tr>';
    echo '<tr><td>7.8</td><td>(boolean) $arrNumbers</td><td>', var_dump((boolean) $arrNumbers), '</td></tr>';
    echo '<tr><td>7.9</td><td>(boolean) $arrEmpty</td><td>', var_dump((boolean) $arrEmpty), '</td></tr>';
   	
    
    
	echo '</table>';
?>

<br /><br />
Created on November 26, 2015
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>