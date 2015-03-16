<?php

/*
 * Имитируем долгий и нудный ajax запрос
 */
//sleep(rand(1,3));
include_once 'connect.php';
$city_id = @intval($_GET['city_id']);

$regs=mysql_query("SELECT Symptom, ID_symp FROM `notum`.`symptoms` WHERE ID_part2=$city_id"); 
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