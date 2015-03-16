<?php  
////////////////////////////BODY2///////////////////////////////////////////////////////////	   
	   /* try{
		  $sql4= "SELECT Body2 FROM `notum`.`part`";
		  $result_body2 = $pdo->query($sql4);
	   }
	   catch (PDOException $e){
		  $output = 'Ошибка при извлечении данных  '. $e->getMessage();
		  //include 'output.html.php';
		  exit();
	   } 
	   while ($row = $result_body2->fetch()){
	   $part[] = array('body2' => $row['Body2']);
       }*/
	   
////////////////////////BODY3//////////////////////////////////////////////////////////////////////	   
      
	  /*  try{
		  $sql5= "SELECT Body3 FROM `notum`.`part`";
		  $result_body3 = $pdo->query($sql5);
	   }
	   catch (PDOException $e){
		  $output = 'Ошибка при извлечении данных  '. $e->getMessage();
		  //include 'output.html.php';
		  exit();
	   } 
	   while ($row = $result_body3->fetch()){
	   $part1[] = array('body3' => $row['Body3']);
       }*/
	   
///////////////////////////NOTUM////////////////////////////////////////////////////////////////	
//TODO только для авторизованных пользователей   
		try{
			$sql2= "SELECT Diagnos, Date, metch FROM `notum`.`diagnosis` D, `notum`.`patient` P, `notum`.`list_notum` L
				WHERE D.ID_diag=L.ID_diag and P.ID_pat=L.ID_pat and Mail='$login'";
			$result_notum = $pdo->query($sql2);
		}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			//include 'output.html.php';
			exit();
		} 
		while ($row = $result_notum->fetch()){
			$notum[] = array('diag' => $row['Diagnos'], 'data' => $row['Date'], 'metch' => $row['metch']);
		}  
?>