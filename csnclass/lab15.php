<?php 
	define ('PAGETITTLE', 'Lab 15 - MySQL Select');
	include_once('config.php');
	include_once('header.php');
	include_once('myfunctions.php');
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

<?php
//file content of dbconfig.php
$search = getFromPOST(K_SEARCH,$_GET['search']);
			echo '<form>';						
			echo 'Search Name or Student No. : ', generate_textbox(K_SEARCH, "");
			echo generate_submit(K_SUBMIT,'Submit'), '<br />';
			echo '</form>';
			
	    	$handle = @mysql_connect(K_SERVER,K_USERNAME,K_PASSWORD);
			if($handle==false){
			    if($PRODUCTION){
			        echo 'Database server is offline!';
			    }
			    else{
			        echo 'ERROR:',mysql_error();
			    }
			}
			else{
			    $var = mysql_select_db(K_DATABASE,$handle);
			    if(!$var){
			        if($PRODUCTION){
			            echo 'Database server is not available!';
			        }
			        else{
			            echo 'ERROR:',mysql_error();
			        }
			    }
			    else{
			        if ((isset($_GET[K_SEARCH]) && (!isset($_GET[K_SUBMIT])))){
							$searchcleaned = mysql_real_escape_string($search);
							$sql = "SELECT SN, Name, College, Course, Year 
									FROM students 
									WHERE SN   LIKE '%$searchcleaned%' OR 
										  Name LIKE '%$searchcleaned%'
									ORDER BY Name";
							$results=@mysql_query($sql,$handle);
							if($results==false){
								if($PRODUCTION){
									echo 'Unable to query database!';
								}
								else{
									echo 'ERROR:',mysql_error();
								}
							}
							else{
								if(mysql_num_rows($results)==0){
									echo mysql_num_rows($results)," record(s) found for [$search] <br>";
									echo '<br>';
								}
								else
								{
									echo mysql_num_rows($results)," record(s) found for [$search]<br>";
									echo "<table border=1 width=100%>";
									echo '<tr>';
									echo '<th>No.</th>';
									echo '<th>SN</th>';
									echo '<th>Name</th>';
									echo '<th>Course</th>';
									echo '<th>College</th>';
									echo '<th>Year</th>';
									echo '<th>Grades</th>';
									echo '</tr>';
									//mysql_affected_rows;
									for($x=1;true;$x++)
									{
										$records=mysql_fetch_array($results,MYSQL_ASSOC);
										if($records==false){
											break;
										}
										else{
											echo "<tr>";
											echo"<td>$x</td>";
											echo'<td>',$records['SN'],'</td>';
											echo'<td>',$records['Name'],'</td>';
											echo'<td>',$records['College'],'</td>';
											echo'<td>',$records['Course'],'</td>';
											echo'<td>',$records['Year'],'</td>';
											$sn = $records['SN'];
                                            $urlmode = K_MODE;
                                            $urlsearch = K_SEARCH;
											$viewlink = "<a href=\"lab16.php?sn=$sn&$urlmode=view&$urlsearch=$search\">View</a>";
											$editlink = "<a href=\"lab16.php?sn=$sn&$urlmode=edit&$urlsearch=$search\">Edit</a>";						
											echo "<td>$viewlink $editlink</td>";
											echo "</tr>";
										}
									}
									echo '</table>';
									//@mysql_free_result($results);
								}
							}
			        }
			        if(isset($_GET[K_SUBMIT])){
						if (isset($_GET[K_SEARCH])){
							if(strlen($search)>=2){
								$searchcleaned = mysql_real_escape_string($search);
								$sql = "SELECT SN, Name, College, Course, Year 
										FROM students 
										WHERE SN   LIKE '%$searchcleaned%' OR 
											  Name LIKE '%$searchcleaned%'
										ORDER BY Name";
								$results=@mysql_query($sql,$handle);
								if($results==false){
									if($PRODUCTION){
										echo 'Unable to query database!';
									}
									else{
										echo 'ERROR:',mysql_error();
									}
								}
								else{
									if(mysql_num_rows($results)==0){
									    echo mysql_num_rows($results)," record(s) found for [$search]";
									}
									else
									{
									    echo mysql_num_rows($results)," record(s) found for [$search]";
									    echo "<table border=1 width=100%>";
									    echo '<tr>';
									    echo '<th>No.</th>';
									    echo '<th>SN</th>';
									    echo '<th>Name</th>';
									    echo '<th>Course</th>';
									    echo '<th>College</th>';
									    echo '<th>Year</th>';
									    echo '<th>Grades</th>';
									    echo '</tr>';
									    //mysql_affected_rows;
									    for($x=1;true;$x++)
									    {
										    $records=mysql_fetch_array($results,MYSQL_ASSOC);
										    if($records==false){
											    break;
										    }
										    else{
											    echo "<tr>";
											    echo"<td>$x</td>";
											    echo'<td>',$records['SN'],'</td>';
											    echo'<td>',$records['Name'],'</td>';
											    echo'<td>',$records['College'],'</td>';
											    echo'<td>',$records['Course'],'</td>';
											    echo'<td>',$records['Year'],'</td>';
											    $sn = $records['SN'];
                                                $urlmode = K_MODE;
                                                $urlsearch = K_SEARCH;
											    $viewlink = "<a href=\"lab16.php?sn=$sn&$urlmode=view&$urlsearch=$search\">View</a>";
											    $editlink = "<a href=\"lab16.php?sn=$sn&$urlmode=edit&$urlsearch=$search\">Edit</a>";						
											    echo "<td>$viewlink $editlink</td>";
											    echo "</tr>";
										    }
									    }
									    echo '</table>';
									    //@mysql_free_result($results);
									}
							    }
							}
							else
							{
							    if(isset($_GET[K_SEARCH])){
								echo 'Please enter at least 2 characters of name or student number to search.';
								}
							}
						}
						else{
							if(isset($_GET[K_SEARCH])){
			                    echo 'Please enter at least 2 characters of name or student number to search.';
							}
						}
					}
			    }
			    @mysql_close($handle);
			}
		?>
<br /><br />
Created on March 23, 2016
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>