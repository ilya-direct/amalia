<?php
	include './dbconnect.php';
	$req = $_POST['req'];
	$city_id = $_POST['city_id'];


///////dobavleniye v request dopolnitelnogo simptoma///////////////////////////////////////////////////
	try{
			$dopreq = "INSERT INTO `notum`.`request` 
					     SET ID_part2 ='$city_id', Request ='$req'";
			$ss = $pdo->prepare($dopreq);
			$ss->execute();
		}
		catch(PDOExeption $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();	
		}
		
echo 'Симптом добавлен!';
/////////////////////////////////////////////////////////////////////	
