<?php 
	define ('PAGETITTLE', 'Lab 4 - Functions and Control Structures');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

<?php 
			$card1 = mt_rand(1,52);
			$card2 = mt_rand(1,52);
			
			$card3 = mt_rand(1,52);
			$card4 = mt_rand(1,52);
			
			$card5 = mt_rand(1,52);
			$card6 = mt_rand(1,52);
			
			$card7 = mt_rand(1,52);
			$card8 = mt_rand(1,52);
			
			$result1=NULL;
			$result2=NULL;
			$result3=NULL;
			$result4=NULL;
			
function showcard($cardnumber)
{
	echo "<td>$cardnumber<br>";
	$value = $cardnumber % 2;
	$face = $cardnumber % 2;
	
	if ($cardnumber == 1 OR $cardnumber == 14 OR $cardnumber == 27 OR $cardnumber == 40)
		$cardvalue = 'Ace';
	if ($cardnumber == 2 OR $cardnumber == 15 OR $cardnumber == 28 OR $cardnumber == 41)
		$cardvalue = 'Two';
	if ($cardnumber == 3 OR $cardnumber == 16 OR $cardnumber == 29 OR $cardnumber == 42)
		$cardvalue = 'Three';
	if ($cardnumber == 4 OR $cardnumber == 17 OR $cardnumber == 30 OR $cardnumber == 43)
		$cardvalue = 'Four';
	if ($cardnumber == 5 OR $cardnumber == 18 OR $cardnumber == 31 OR $cardnumber == 44)
		$cardvalue = 'Five';
	if ($cardnumber == 6 OR $cardnumber == 19 OR $cardnumber == 32 OR $cardnumber == 45)
		$cardvalue = 'Six';
	if ($cardnumber == 7 OR $cardnumber == 20 OR $cardnumber == 33 OR $cardnumber == 46)
		$cardvalue = 'Seven';
	if ($cardnumber == 8 OR $cardnumber == 21 OR $cardnumber == 34 OR $cardnumber == 47)
		$cardvalue = 'Eight';
	if ($cardnumber == 9 OR $cardnumber == 22 OR $cardnumber == 35 OR $cardnumber == 48)
		$cardvalue = 'Nine';
	if ($cardnumber == 10 OR $cardnumber == 23 OR $cardnumber == 36 OR $cardnumber == 49)
		$cardvalue = 'Ten';
	if ($cardnumber == 11 OR $cardnumber == 24 OR $cardnumber == 37 OR $cardnumber == 50)
		$cardvalue = 'Jack';
	if ($cardnumber == 12 OR $cardnumber == 25 OR $cardnumber == 38 OR $cardnumber == 51)
		$cardvalue = 'Queen';
	if ($cardnumber == 13 OR $cardnumber == 26 OR $cardnumber == 39 OR $cardnumber == 52)
		$cardvalue = 'King';		
	
	if ($cardnumber <= 13)
		$face = 'Clubs';
	if ($cardnumber <= 26)
		$face = 'Spades';
	if ($cardnumber <= 39)
		$face = 'Diamonds';
	if ($cardnumber <= 52)
		$face = 'Hearts';
	echo $cardvalue, ' of ', $face;
	echo '</td>';
}
			
			
			function getcardvalue($cardnumber){
				switch($cardnumber){
					case 1:
					case 14:
					case 27:
					case 40:
						return 1;
						break;
					case 2:
					case 15:
					case 28:
					case 41:
						return 2;
						break;
					case 3:
					case 16:
					case 29:
					case 42:
						return 3;
						break;
					case 4:
					case 17:
					case 30:
					case 43:
						return 4;
						break;
					case 5:
					case 18:
					case 31:
					case 44:
						return 5;
						break;
					case 6:
					case 19:
					case 32:
					case 45:
						return 6;
						break;
					case 7:
					case 20:
					case 33:
					case 46:
						return 7;
						break;
					case 8:
					case 21:
					case 34:
					case 47:
						return 8;
						break;
					case 9:
					case 22:
					case 35:
					case 48:
						return 9;
						break;
					default:
						return 0;
						break;
				}
			}
			
			
			
			function gettotal($card9,$card0){
				$total = getcardvalue($card9) + getcardvalue($card0);
				if($total>=10)
				{
					$total-=10;
					return $total;
				}
				else
				{
					return $total;
				}
			}
			
			$total1 = gettotal($card1,$card2);
			$total2 = gettotal($card3,$card4);
			$total3 = gettotal($card5,$card6);
			$total4 = gettotal($card7,$card8);
			
			$highest_number = max($total1,$total2,$total3,$total4);
			if($highest_number==$total1)
			{
				$result1="<strong>Winner!</strong>";
				if($highest_number==$total2)
				{
					$result2="<strong>Winner!</strong>";
					if($highest_number==$total3)
					{
						$result3="<strong>Winner!</strong>";
						if($highest_number==$total4)
						{
							$result4="<strong>Winner!</strong>";
						}
						else
						{
							$result4="Loser!";
						}
					}
					elseif($highest_number==$total4)
					{
						$result3="Loser!";
						$result4="<strong>Winner!</strong>";
					}
					else
					{
						$result3="Loser!";
						$result4="Loser!";
					}
				}
				elseif($highest_number==$total3)
				{
					$result2="Loser!";
					$result3="<strong>Winner!</strong>";
					if($highest_number==$total4)
					{
						$result4="<strong>Winner!</strong>";
					}
					else
					{
						$result4="Loser!";
					}
				}
				elseif($highest_number==$total4)
				{
					$result2="Loser!";
					$result3="Loser!";
					$result4="<strong>Winner!</strong>";
				}
				else
				{
					$result2="Loser!";
					$result3="Loser!";
					$result4="Loser!";
				}
			}
			elseif($highest_number==$total2)
			{
				$result1="Loser!";
				$result2="<strong>Winner!</strong>";
				if($highest_number==$total3)
				{
					$result3="<strong>Winner!</strong>";
					if($highest_number==$total4)
					{
						$result4="<strong>Winner!</strong>";
					}
					else
					{
						$result4="Loser!";
					}
				}
				elseif($highest_number==$total4)
				{
					$result3="Loser!";
					$result4="<strong>Winner!</strong>";
				}
				else
				{
					$result3="Loser!";
					$result4="Loser!";
				}
			}
			elseif($highest_number==$total3)
			{
				$result1="Loser!";
				$result2="Loser!";
				$result3="<strong>Winner!</strong>";
				if($highest_number==$total4)
				{
					$result4="<strong>Winner!</strong>";
				}
				else
				{
					$result4="Loser!";
				}
			}
			else
			{
				$result1="Loser!";
				$result2="Loser!";
				$result3="Loser!";
				$result4="<strong>Winner!</strong>";
			}
			
			echo '<table border=1 cellspacing = "1" width="500px">';
			echo '<tr>';
			echo '<th>Player 1</th>';
			echo '<th>Player 2</th>';
			echo '<th>Player 3</th>';
			echo '<th>Player 4</th>';
			echo '</tr>';

			echo '<tr>';
			echo '<td><img src="cards/',$card1,'.png"/></td>';
			echo '<td><img src="cards/',$card3,'.png"/></td>';
			echo '<td><img src="cards/',$card5,'.png"/></td>';
			echo '<td><img src="cards/',$card7,'.png"/></td>';
			echo '</tr>';
			
			echo '<tr>';
            showcard($card1);
            showcard($card3);
            showcard($card5);
            showcard($card7);
            echo '</tr>';
            			
			echo '<tr>';
			echo '<td><img src="cards/',$card2,'.png"/></td>';
			echo '<td><img src="cards/',$card4,'.png"/></td>';
			echo '<td><img src="cards/',$card6,'.png"/></td>';
			echo '<td><img src="cards/',$card8,'.png"/></td>';
			echo '</tr>';
			
			echo '<tr>';
            showcard($card2);
            showcard($card4);
            showcard($card6);
            showcard($card8);
            echo '</tr>';
			
			echo '<tr>';
			echo "<td>Total: $total1</td>";
			echo "<td>Total: $total2</td>";
			echo "<td>Total: $total3</td>";
			echo "<td>Total: $total4</td>";
			echo '</tr>';
			
			echo '<tr>';
			echo "<td>$result1</td>";
			echo "<td>$result2</td>";
			echo "<td>$result3</td>";
			echo "<td>$result4</td>";
			echo '</tr>';
			
			echo '<tr><td colspan="4">Click <a href="lab4.php"><strong><u>HERE</u></strong></a> to generate new set</td></tr>';
			echo '</table>';
			
			
			
		?>
<br /><br />
Created on December 7, 2015
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>