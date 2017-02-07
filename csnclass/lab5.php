<?php 
	define ('PAGETITTLE', 'Lab 5 - Iteration Structures');
	include_once('config.php');
	include_once('header.php'); 
?>

<div id="content">
<div class="right"> 

<h2><?php echo PAGETITTLE; ?></h2>
<div class="articles">

<?php
    
    $rnd=mt_rand(1,11);
        
        if($rnd%2==0)
        {
            $rnd+=1;
        }
        function seta($ctr)
        {
          for($i=1;$i<=$ctr;$i++)
            {
                for ($x=$i;$x<$ctr;$x++)
                {
                    echo '-';
                    
                }
                for ($y=$i;$y>=1;$y--)
                {
                    echo "&#9830;";
                    
                }
                echo '<br>';
            }       
        }
        function setb($ctr)
        {
            for($i=1;$i<=$ctr;$i++)
            {
                for ($y=$i;$y>=1;$y--)
                {
                    echo "&#9830;";
                    
                }
                    
                for($x=$i;$x<$ctr;$x++)
                {
                    echo '-';
                   
                }
                echo '<br>';
            }
        }
            
        function setc($ctr)
        {
        for($i=1;$i<=$ctr;$i++)
            {
                for($y=$i;$y>1;$y--)
                {
                    echo "-";
                    
                }
                
                for ($x=$i;$x<=$ctr;$x++)
                {
                    echo '&#9830;';
                
                }
                echo '<br>';
            }   
        }
        function setd($ctr)
        {
            for($i=1;$i<=$ctr;$i++)
            {
                for ($x=$i;$x<=$ctr;$x++)
                {
                    echo '&#9830;';
                    
                }
                for($y=$i;$y>1;$y--)
                {
                    echo "-";
                    
                }
                echo '<br>';
            }
        }
            
        function sete($ctr)
        {
            for($i=1;$i<=$ctr;$i++)
                {
                    $x=$i;
                    if($x<$ctr/2)
                    {
                        while($x<$ctr)
                        {
                            echo '-';
                            $x++;
                        }
                        $y=$i;
                        while($y>=1)
                        {
                            echo "&#9830;";
                            $y--;
                        }
                        echo '<br>';
                    }
                    else
                    {
                        $y=$i;
                        while($y>1)
                        {
                            echo "-";
                            $y--;
                        }
                        while($x<=$ctr)
                        {
                            echo '&#9830;';
                            $x++;
                        }
                        echo '<br>';
                    }
                }
        }
        function setf($ctr)
        {
            for($i=1;$i<=$ctr;$i++)
            {
                $y=$i;
                if($y<$ctr/2)
                {
                    while($y>=1)
                    {
                        echo "&#9830;";
                        $y--;
                    }
                
                    $x=$i;
                    while($x<$ctr)
                    {
                        echo '-';
                        $x++;
                    }
                    echo '<br>';
                }
                else
                {
                    $x=$i;
                    while($x<=$ctr)
                    {
                        echo '&#9830;';
                        $x++;
                    }
                    while($y>1)
                    {
                        echo "-";
                        $y--;
                    }
                    echo '<br>';
                }
            }
        }
        function setg($ctr)
        {
            for($x=1;$x<=$ctr;$x++)
                {
                    for($y=1;$y<=$ctr;$y++)
                    {
                        echo '&#9830;';
                    }
                    echo'<br>';
                    
                }
        }
        function seth($ctr)
        {
            for ($x=1;$x<=$ctr;$x++)
            {
                if($x<=$ctr/2+1)
                {
                    for ($y=1;$y<=$ctr;$y++)
                    {
                        echo '&#9830;';
                        
                    }
                    echo'<br>';
                }
                else
                {
                    for ($y=1;$y<=$ctr;$y++)
                    {
                        echo '-';
                        
                    }
                    echo'<br>';
                }
                
            }
        }
        echo '<table border="1" cellpadding="5" align="center" width="100%">';
        echo '<tr><th colspan="4" align="center">Number of Rows: ',$rnd,'</th></tr>';
        echo '<tr align="center"><th>Figure A</th><th>Figure B</th><th>Figure C</th><th>Figure D</th></tr>'; 
        echo '<tr align="center"><td><pre>',seta($rnd),'</pre></td><td><pre>',setb($rnd),'</pre></td><td><pre>',setc($rnd),'</pre></td><td><pre>',setd($rnd),'</pre></td></tr>'; 
        echo '<tr align="center"><th>Figure E</th><th>Figure F</th><th>Figure G</th><th>Figure H</th></tr>'; 
        echo '<tr align="center"><td><pre>',sete($rnd),'</pre></td><td><pre>',setf($rnd),'</pre></td><td><pre>',setg($rnd),'</pre></td><td><pre>',seth($rnd),'</pre></td></tr>'; 
        echo '<tr align="center"><td colspan="4" align="center">Click <a href="lab5.php"><strong><u>HERE</u></strong></a> to generate new set</td></tr>';
        echo '</table>';
        echo '<br/><br/>';

    
    $countries['au'] = array ('Australia', 'Sydney','+5');
    $countries['ro'] = array ('Romania', 'Bucharest' , '+2');
    $countries['qa'] = array ('Qatar', 'Saudi Arabia' , '+3');
    $countries['us'] = array('USA', 'Washington, DC','-5 to -10');
    $countries['il'] = array ('Israel', 'Tel Aviv' , '+2');
    $countries['zm'] = array ('Zambia', 'Africa' , '+2');
    $countries['ar'] = array ('Argentina', 'Buenos Aires' , '-3');

    $countries['de'] = array('Denmark', 'Copenhagen','+1');
    $countries['eg'] = array ('Egypt', 'Cairo' , '+2');
    $countries['nz'] = array ('New Zealand', 'Wellington','+12');
    $countries['vn'] = array ('Vietnam', 'Hanoi','+7');
    $countries['ec'] = array ('Ecuador', 'Quito' , '-5');
    $countries['ru'] = array ('Russia', 'Moscow' , '+3');     

    echo '<table border="1" cellpadding="5" align="center" width="100%">';
    echo '<tr align="center"><pre><th>No.</th><th>Flag</th><th>Code</th><th>Country</th><th>Capital</th><th>Time Zone</th></pre></tr>';
           
    $ctr=1;
            
            foreach ($countries as $key => $country) {
                echo '<tr>';
                echo '<td align="center"><pre>',$ctr,'</pre></td>';
                echo "<td align='center'><img src=\"/csnclass/img/flags/$key.png\" /></td>";
                echo "<td align='center'><pre>$key</pre></td>";
                echo '<td align="center" ><pre><p>', $country[0], '</p></pre></td>';
                echo '<td align="center"><pre>', $country[1], '</pre></td>';
                echo '<td align="center"><pre>', $country[2], '</pre></td>';
                echo '</tr>';
                $ctr++;
            }

            echo '</table>';
            echo '<br /><br />';
?>

Created on January 6, 2016
</div>
</div>

<?php include_once('navigation.php'); ?>

<div style="clear: both;"> </div>
</div>

<?php include_once('footer.php'); ?>