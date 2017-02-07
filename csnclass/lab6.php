<?php 
	define ('PAGETITTLE', 'Lab 6 -  Array Manipulation');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">
<?php

echo 'Use the following text for testing: <br><br>


So let freedom ring from the prodigious hilltops of New Hampshire. Let freedom ring from the mighty mountains of New York. Let freedom ring from the heightening Alleghenies of Pennsylvania! Let freedom ring from the snowcapped Rockies of Colorado!';
echo'<br><br>';

$text = (isset($_POST['text'])) ? $_POST['text'] : '';
echo '<form method="post">';
echo 'Enter text:<br>';
echo '<textarea name="text" style="width:500px">';
echo $text;
echo '</textarea><br>';
echo '<input type=submit value="Process">&nbsp;';
echo '<input type=reset>&nbsp;';
echo '</form>';
$text = preg_replace('/[^a-zA-Z0-9Ññ ]/','',trim($text));

$colors[] = '#00ff00';
// No 1. Add color red (#ff0000) at the BEGINING of the array $colors
array_unshift($colors, "#ff0000");


// No 2. Add color blue (#0000ff) at the END of the array $colors
array_push($colors, "#0000ff");

// at this point the array $colors must contain (red, green and blue)

// No 3. Add at least 8 color values to array $colors
array_push($colors, '#FFFFFF', '#FFCCFF','#FF9933','#CCFFFF','#CCFF99','#FF9999','#FFCC66','#CC9966','#00CCFF','#9999FF');

if ($text <> '') {
    $text = strtolower($text);
    $allwords = explode(' ', $text);  

    // No. 4. Remove duplicate items and assign to $uniquewordlist
    $uniquewordlist = array_unique($allwords);  

 // No. 5. sort the array $uniquewordlist
    asort($uniquewordlist);  

 // No. 6. Retrieve the first element of $uniquewordlist and 
 // check if equal to empty string
    if ($text == '') {       
        // No. 7. Remove the first element from $uniquewordlist
	     $deleteditem = array_shift($uniquewordlist);
    }

    foreach ($uniquewordlist as $word) 
        $counter[$word] = 0;

    $totalwords = 0;
    foreach ($allwords as $word) {
        if ($word != '') {
            $counter[$word]++;
            $totalwords++;
        }
    }
    
    echo '<table border=1>';
    echo '<tr><td>No.</td><td>Word</td><td>Frequency</td><td>Percent</td></tr>';
    $i=1;
    foreach ($uniquewordlist as $word) {
           // No. 8. Get the current element of array $colors (IAP function)
        $color = current($colors);

        $length = number_format($counter[$word] / $totalwords * 100.00,2);
        echo '<tr>';
        echo '<td>',$i, '.</td>';
        echo '<td>', $word, '</td>';
        echo '<td>', $counter[$word],'</td>';
        echo '<td style="background:',$color,'">',$length,'%</td>';
        echo '</tr>';

        // No. 9. Move the internal array pointer of $colors to next element
        next($colors);

        if (current($colors) == false) {
            // No. 10. Reset internal array pointer of $colors
            reset($colors);
        }
        $i++;
    }
    echo '</table>';
}
?>

<br /><br />
Created on January 12, 2016
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>