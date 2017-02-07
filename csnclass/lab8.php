<?php 
	define ('PAGETITTLE', 'Lab 8 - Regular Expression');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">
<?php
$patterns[] = array('String containing "PHP"', 'PHP');		
$patterns[] = array('Starting with "PHP"', '^PHP');              
$patterns[] = array('Ends with "PHP"', 'PHP$');                  


$patterns[] = array('Word starting with letter "C"',         '^C'); // pattern 4  Ex. Cat, Car, Cab
$patterns[] = array('Non-empty lowercase string',            '^[a-z]+$'); // pattern 5  Ex. abcdefg
$patterns[] = array('Non-empty uppercase string',            '^[A-Z]+$'); // pattern 6  Ex. ABCDEFG
$patterns[] = array('Minimum 10 letters maximum 20 letters', '[a-zA-Z0-9]{10,20}'); // pattern 7  Ex. ABcDEfgHIJ, AAAAAAAAAABBBBBBBBBB
$patterns[] = array('Minimum 10 digits maximum 20 digits',   '\d{10,20}'); // pattern 8  Ex. 1234567890, 12345678901234567890
$patterns[] = array('Valid PHP variable name',               '^[\$][_a-zA-Z]+$'); // pattern 9  Ex. $_, $a, $_abc, $_ABC123, 
$patterns[] = array('Valid PHP constant name (UPPERCASE)',   '^[A-Z]+$'); // pattern 10 Ex. TAX, PI, WALANGFOREVER 
$patterns[] = array('Valid decimal (base-10) integer',       ' ^(-)?[0-9]+$'); // pattern 11 Ex. 123, 
$patterns[] = array('Valid float number',                    '^(-)?[0-9]+\.[0-9]+$'); // pattern 12 Ex, 0.00, 0.000, 1.001, 1.0, 10.100
$patterns[] = array('5 characters',                          ' ^.{5}$'); // pattern 13 Ex. 12345, 99999, ABCDE, #ABcd
$patterns[] = array('5 characters (digits only)',            '^\d{5}$'); // pattern 14 Ex. 12345, 99999
$patterns[] = array('5 non-alphanumeric characters',         '^\W{5}$'); // pattern 15 Ex. !@#$%, $%^&*
$patterns[] = array('Base64 string (letters, digits, +, /)', '^[a-zA-Z0-9\/\+]+$'); // pattern 16 Ex.  ABCDE, ABcd091/+
$patterns[] = array('Passing Grade',                         '([1-2]\.[0257][05])|3.00'); // pattern 17 Ex .1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00
$patterns[] = array('Sub-domain Name',                       '(\.[a-zA-Z]+)+'); // pattern 18 Ex. .com, .com.ph, .edu, .edu.ph, .google.com, .google.com.ph
$patterns[] = array('Email address',                         '^[\_\-a-zA-Z0-9]+@[a-zA-Z]+(\.[a-zA-Z]+)+$'); // pattern 19 Ex. cnuarin@gmail.com
$patterns[] = array('Any text containing hashtag',           '\#'); // pattern 20 Ex. I Love #PHP and #SQL

$i=1;
echo '<form method="post">';
echo '<table border=1>';
echo '<tr><td colspan=4 align=center><strong>Regular Expression Test</strong></td></tr>';
echo '<tr><td>No.</td><td>Description</td><td>String</td><td>Result</td></tr>';
foreach ($patterns as $pattern_item) {
    $description = $pattern_item[0];
    $pattern     = $pattern_item[1];
    $value       = isset($_POST["field$i"]) ? $_POST["field$i"] : '';
    if ($pattern == '') {
        $result = 'Missing pattern';
        $pattern = '&nbsp;';
    }
    else {
        $pattern     = '/' . $pattern . '/';
        if (preg_match($pattern, $value))
            $result = 'Valid';
        else
            $result = 'Invalid';
    }
    echo "<tr>";
    echo "<td rowspan=2>$i.</td><td>$description</td>";
    echo "<td><input type=text name=\"field$i\" value=\"$value\"></td>";
    echo "<td>$result</td>";
    echo "</tr>";
    echo "<tr><td colspan=3>Pattern: $pattern</td></tr>";
    $i++;
}
echo '</table><br />';
echo '<input type="submit" name="validate" value="Validate Data">&nbsp';
echo '<input type="reset" value="Reset">&nbsp';
echo '</form>';
?>


<br /><br />
Created on January 30, 2016
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>