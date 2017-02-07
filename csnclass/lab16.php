<?php 
	define ('PAGETITTLE', 'Lab 16 - MySQL Insert/Update/Delete');
	include_once('config.php');
	include_once('header.php'); 
	include_once('myfunctions.php');
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

<?php
$search = getFromPOST(K_SEARCH,$_GET['search']);
            $sn = getFromPOST(K_SN,$_GET['sn']);
            $mode = getFromPOST(K_MODE,$_GET['mode']);

			$validgrades['1.00'] = '1.00';
            $validgrades['1.25'] = '1.25';
            $validgrades['1.50'] = '1.50';
            $validgrades['1.75'] = '1.75';
            $validgrades['2.00'] = '2.00';
            $validgrades['2.25'] = '2.25';
            $validgrades['2.50'] = '2.50';
            $validgrades['2.75'] = '2.75';
            $validgrades['3.00'] = '3.00';
            $validgrades['5.00'] = '5.00';
            $validgrades['LFR'] = 'LFR';
            $validgrades['D'] = 'D';
            $validgrades['W'] = 'W';
            if ($sn!="") {
                $handle = @mysql_connect(K_SERVER,K_USERNAME,K_PASSWORD);
                if (!$handle) {
                    if(PRODUCTION){
			            echo 'Database server is offline!';
			        }
			        else{
			            echo 'ERROR:',mysql_error();
			        }
                }
                else {
                    if (!mysql_select_db(K_DATABASE,$handle)) {
                       if(PRODUCTION){
			                echo 'Database server is not available!';
			            }
			            else{
			                echo 'ERROR:',mysql_error();
			            }
                    }
                    else {
                        echo '<form method="post">';
                        if (displaystudentinfo($handle, $sn)) {
                            if (isset($_POST[K_UPDATE]))
                                updatestudentgrades($handle);
                            elseif (isset($_POST[K_DELETE]) && isset($_POST[K_SELECTED]))
                                deleteselected($handle);
                            elseif (isset($_POST[K_SAVE]))
                                savenewrecord($handle, $sn);
                            displaystudentgrades($handle, $mode, $sn, $validgrades);
                            displaynewform($handle, $sn, $validgrades);
                        }
                        echo '</form>';
                    }
                    @mysql_close($handle);
                    echo "<a href=\"lab15.php?", K_SEARCH,"=$search\">Back</a> ";
                    echo "<a href=\"lab15.php\">New Search</a><br />";
                }
            }
            else {
                echo "Please use <a href=lab15.php>search</a> page first.";
            }
		?>

<br /><br />

</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>