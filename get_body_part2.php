<?php
	include_once 'dbconnect.php';
	$part = @intval($_GET['part']);
	$regs=mysql_query("SELECT Body3, ID_part2 FROM city WHERE ID_part='$part'");
 
	if ($regs) {
		$num = mysql_num_rows($regs);     
		$i = 0;
		while ($i < $num) {
			$part2[$i] = mysql_fetch_assoc($regs);  
			$i++;
		}    
		$result = array('Body3'=>$part2); 
		
	}
	else {
		$result = array('type'=>'error');
	}
	print json_encode($result);
?>