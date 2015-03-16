<?php 
	session_start();
	include "./dbconnect.php";
		
	if (isset($_POST['unenter'])){
		$login = "-";
		$is_disabled = "disabled='disabled'";
		include $_SERVER['DOCUMENT_ROOT'].'/NOTUM/preparation.php';
		include 'index1.html';
		exit();
	}
	
///////////////////////Регистрация////////////////////////////////////////////////////////	
	if (isset($_POST['enter'])){
		$_SESSION['password'] = $_REQUEST['password'];
		$_SESSION['email'] = $_REQUEST['login'];
		$name=$_REQUEST['name'];
		$scrambled = md5($_SESSION['password']);
		try{
			//$name = "Василий"; //TODO имя из $_POST
			$login = $_SESSION['email'];
			$sql = 'INSERT INTO `notum`.`patient`
					SET Password=:spass, Mail=:semail, Pills="0"';
			$ss = $pdo->prepare($sql);
			$ss-> bindValue(':spass', $scrambled);
			$ss-> bindValue(':semail', $_SESSION['email']);
			$ss->execute();
			include $_SERVER['DOCUMENT_ROOT'].'/NOTUM/preparation.php';
			//include $_SERVER['DOCUMENT_ROOT'].'/NOTUM/getUserData.php';
			include 'index1.html';
			exit();
		}
		catch(PDOExeption $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			exit();	
		}
	}
	
////////////////////Вход////////////////////////////////////////////////////////////	
	if (isset($_POST['enter1'])){ 
		$_SESSION['epassword'] = $_REQUEST['epassword'];
		$_SESSION['login'] = $_REQUEST['login'];
		$login=$_SESSION['login'];
		$scrambled = md5($_SESSION['epassword']);
		try{
			$sql1= "SELECT Password, Birthday, Name, Sex FROM `notum`.`patient` WHERE Mail='$login'";
			$result = $pdo->query($sql1);
    	}
		catch (PDOException $e){
			$output = 'Ошибка при извлечении данных  '. $e->getMessage();
			echo "Вы ввели неправильный login"; //TODO обработка ошибки
			exit();
		} 
		$row = $result->fetch();
		$password = $row['Password'];
		$name = $row['Name'];
		$sex = $row['Sex'];
		$birthday = $row['Birthday'];
		if ($password == $scrambled){
			include $_SERVER['DOCUMENT_ROOT'].'/NOTUM/button.php';
			//include $_SERVER['DOCUMENT_ROOT'].'/NOTUM/getUserData.php';
			include $_SERVER['DOCUMENT_ROOT'].'/NOTUM/preparation.php';
			include 'index1.html';
			exit();
		} 
		else{
			include "index.html";
			exit();
		}
	}
////////////////Вход без регистрации//////////////////////////////////////////////////////	
include 'index.html';
?>