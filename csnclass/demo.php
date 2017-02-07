
<?php

	/**
	$names = array();
	$names[0] = 'denver';
	$names[1] = 'esquivel';
	$names[2] = 'arquiza';
	echo 'Initial Array:<br> ';
	print_r($names);
	
	
	
	//Start of array manipulations
	
	array_unshift($names,'Leinard','Mark','Gilvonne');
	
	array_push($names,'Andrea','Princess','Michelle');
	//End of array manipulations
	
	array_shift($names); //removes first element
	
	array_pop($names); //removes last element
	
	array_splice($names,2,0,'UE'); //inserts
	
	array_splice($names,3,0,'Warriors'); // inserts
	
	array_splice($names,4,3,array('DENVER','ESQUIVEL','ARQUIZA')); //inserts form 4, then 3 elements
	
	//array_push($names,'CSN');
	
	$names[1946] = 'CSN';
	
	//arsort($names);
	//asort($names);
	//sort($names);
	//rsort($names);
	//rsort($names);

	
	//shuffle($names);
    
	//$newnames = array_unique($names);
	

	
	echo '<hr> Final Array:<br>';
	print_r($names);
		**/
		
		
	$colors = array('red','blue','green','yellow','black','magenta');
	
	next($colors);
	next($colors);
	next($colors);
	next($colors);
	next($colors);
	next($colors);
	next($colors);
	
	end($colors);
	
	var_dump (current($colors));
	
?>
