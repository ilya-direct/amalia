<?php

/*
 * Имитируем долгий и нудный ajax запрос
 */
//sleep(rand(1,3));
include_once 'connect.php';
$country_id = @intval($_GET['region_id']);

$regs=mysql_query("SELECT Body3, ID_part2 FROM `notum`.`part_body2` WHERE ID_part=$country_id"); 
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
/*
 * Упаковываем данные с помощью JSON
 */
print json_encode($result);

?>