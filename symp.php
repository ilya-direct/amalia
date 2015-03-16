<?php
	session_start();
	include './dbconnect.php';
	$login=$_SESSION['login'];
	$check1 = $_POST['check1'];
	
////////////vivod iz symptoms simptoma po id////////////////////////////////////////////
	try{
		$sql_idsymp= "SELECT Symptom FROM `notum`.`symptoms` 
					WHERE ID_symp='$check1'";
		$result_idsymp = $pdo->query($sql_idsymp);
		$row1 = $result_idsymp->fetch();
		$idsymp = $row1['Symptom'];
	}
	catch (PDOException $e){
		$output = 'Ошибка при извлечении данных  '. $e->getMessage();
		exit();
	}	
	echo $idsymp;
////////id sessiii/////////////////////////////////////////////////////////////////////
	try{
		$sql_idses= "SELECT ID_Ses FROM `notum`.`patient` P,  `notum`.`session` S
					WHERE P.ID_pat=S.ID_pat and Mail='$login'";
		$result_idses = $pdo->query($sql_idses);
		$row = $result_idses->fetch();
		$idses = $row['ID_Ses'];
	}
	catch (PDOException $e){
		$output = 'Ошибка при извлечении данных  '. $e->getMessage();
	exit();}
///////dobavleniye v in_symp simptoma///////////////////////////////////////////////////
	try{
			$upidses = "INSERT INTO `notum`.`in_symp` 
					     SET ID_symp ='$check1', ID_Ses ='$idses'";
			$ss = $pdo->prepare($upidses);
			$ss->execute();
		}
		catch(PDOExeption $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();	
		}
		

/////////////////////////////////////////////////////////////////////	

?>