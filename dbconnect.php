<?php	
	try{
		$pdo = new PDO('mysql:host=Localhost; dbname=notum','root', '');
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // АТРИБУТУ, УПРАВЛЯЮЩЕМУ ВЫВОДОМ ОШИБОК, ЗАДАЕТСЯ РЕЖИМ ВЫБРОСА ИСКЛЮЧЕНИЙ
        $pdo->exec('SET NAMES "utf8"');
	}
	catch (PDOException $e){
		$output='Ошибка подключения'.$e->getMessage();
		//include 'output.html.php';
		exit();
	}
?>