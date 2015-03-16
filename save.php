<?php
	session_start();
	include 'dbconnect.php';
	$login=$_SESSION['login'];
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$birth = $_POST['birth'];
	try{
			$sql = "UPDATE `notum`.`patient`
					SET Sex='$sex', Birthday='$birth', Name='$name'
					Where Mail='$login'";
			$ss1 = $pdo->prepare($sql);
			$ss1->execute();
	}
	catch(PDOExeption $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();	
	}
	/////////dostaem iz bazi id pacienta//////////////////////////
	try{
			$sql_id= "SELECT ID_pat FROM `notum`.`patient` 
						WHERE Mail='$login'";
			$result_id = $pdo->query($sql_id);
			$row = $result_id->fetch();
			
			
		}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();
		}
	$idpat = $row['ID_pat'];
	///////////////////////////dobavlyam  danniye v sessiyu///////////////////////////////////////
	try{
			$sql1 = "INSERT INTO `notum`.`session`
					SET Sex='$sex', Birthday='$birth', Pills='0', ID_pat='$idpat'";
			$ss = $pdo->prepare($sql1);
			$ss->execute();
	}
	catch(PDOExeption $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();	
	}
	echo 'Данные сохранены!!!';
?>