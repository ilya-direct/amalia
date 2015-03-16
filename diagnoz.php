<?php
	session_start();
	include 'dbconnect.php';
	$login=$_SESSION['login'];
	$diag = $_get['diag'];
	$date = $_get['date'];
	////////////////////////////id pacienta////////////////////////////////////////////////
	try{
		$sql_idpat= "SELECT ID_pat FROM `notum`.`patient` 
					WHERE Mail='$login'";
		$result_idpat = $pdo->query($sql_idpat);
		$row = $result_idpat->fetch();
		$idpat = $row['ID_pat'];
	}
	catch (PDOException $e){
		$output = 'Ошибка при извлечении данных  '. $e->getMessage();
		exit();
	}
	

	/////////////dobavleniye diagnoza v tablicu history//////////////////////////////////////////////////////////
	try{
			$upiddiag = "INSERT INTO `notum`.`history` 
					SET ID_diag ='$diag', ID_pat ='$idpat', Date ='$date'";
			$ss = $pdo->prepare($upiddiag);
			$ss->execute();
		}
		catch(PDOExeption $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();	
		}
		
	/////////////////////////	
	try{
		$sql_history= "SELECT Diagnos, Date FROM `notum`.`diagnosis` D, `notum`.`history` H 
						WHERE H.ID_diag=D.ID_diag and ID_pat='$idpat'";
		$result_history = $pdo->query($sql_history);
		
		}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();
		} 
	while($row = $result_history->fetch()){
			$history[] = array('diag'=>$row['Diagnos'], 'date'=>$row['Date']) ;
			  
			}
print json_encode($history);
	
	
?>