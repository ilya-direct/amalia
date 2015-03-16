<?php 
		//Обязательные данные для страниы два
		/////////////////////BODY////Jalobi//////////////////////////////////////////////////////	
		try{
			$sql= "SELECT * FROM `notum`.`body`";
			$result_body = $pdo->query($sql);
		}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			//include 'output.html.php';
			exit();
	   } 
		while ($row = $result_body->fetch()){
				$body[] = array('id' => $row['ID_body'],
							    'body' => $row['Body1']);
		}
		
		///////////////////ANALYSIS/////////////////////////////////////////////////////////////////////////////
		try{
			$sql3= "SELECT Analys, ID_an FROM `notum`.`analysis`";
			$result_an = $pdo->query($sql3);
		}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			//include 'output.html.php';
			exit();
		} 
		while ($row = $result_an->fetch()){
			$analys[] = array('an' => $row['Analys'], 'id' => $row['ID_an']);
		}
		
		///////////////////////////////////Diagnoz///////////////////////////////////////////////////////////	   
		try{
			$sql1= "SELECT Diagnos, ID_diag FROM `notum`.`diagnosis`";
			$result_diag = $pdo->query($sql1);
		}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			//include 'output.html.php';
			exit();
		} 
		while ($row = $result_diag->fetch()){
			$diag[] = array('diag' => $row['Diagnos'], 'id'=>$row['ID_diag']);
		}
?>