<?php
echo 'trolorlolol';
$body = @intval($_GET['body']);
echo $body;
include './dbconnect.php';

 try{
		  $regs= "SELECT Body2, ID_part FROM `notum`.`part` where ID_body='$body'";
		  $result_body2 = $pdo->query($regs);
	   }
	   catch (PDOException $e){
		  $output = 'Ошибка при извлечении данных  '. $e->getMessage();
		  //include 'output.html.php';
		  exit();
	   } 
	   while ($row = $result_body2->fetch()){
	   $result[] = array('body2' => $row['Body2'],'id'=>$row['ID_part']);
       }



print json_encode($result);

?>