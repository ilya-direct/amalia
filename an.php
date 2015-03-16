<?php
include_once './connect.php';
$analys = @intval($_GET['analys']);

$regs=mysql_query("Select Parameter from `notum`.`parameters` 
					Where ID_an='$analys'"); 
if ($regs) {
    $num = mysql_num_rows($regs);     
    $i = 0;
    while ($i < $num) {
       $regions[$i] = mysql_fetch_assoc($regs);  
       $i++;
    }    
    $result = array('regions'=>$regions); 
}
else {
    $result = array('type'=>'error');
}
print json_encode($result);
?>