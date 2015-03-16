<?php
    session_start();
	include "dbconnect.php";
	
	////////////////////////////////////////IDPatient//////////////////////////////////////////////////////////////////	
	if(($_SESSION['email'])!=NULL)
	    $login=$_SESSION['email'];
	
		
//////////////////////////////////Dobavit v diagnose///////////////////////////////////////////////////////////////	
	if(isset($_POST['update'])){
		$diagnos = $_POST['diag'];
		try{
			$sql_id= "SELECT ID_diag FROM `notum`.`diagnosis` 
						WHERE Diagnos='$diagnos'";
			$result_id = $pdo->query($sql_id);
			$row = $result_id->fetch();
			$iddiag = $row['ID_diag'];
			
		}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();
		}
		$date=$_POST['date'];
		try{
			$upiddiag = "INSERT INTO `notum`.`history` 
					SET ID_diag ='$iddiag', ID_pat ='$idpat', Date ='$date'";
			$ss = $pdo->prepare($upiddiag);
			$ss->execute();
		}
		catch(PDOExeption $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();	
		}
		try{
			$sql_history= "SELECT Diagnos FROM `notum`.`diagnosis` D, `notum`.`history` H 
						WHERE H.ID_diag=D.ID_diag and ID_pat='$idpat'";
			$result_history = $pdo->query($sql_history);
			while($row = $result_history->fetch()){
				$history[] = array('diag'=>$row['Diagnos']);}
		}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();
		} 
	}	

	
?>