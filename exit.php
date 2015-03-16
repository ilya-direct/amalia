<?php
	if (isset($_REQUEST['exit'])){
		unset ($_SESSION['email']);
		unset ($_SESSION['epassword']);
		unset ($_SESSION['password']);
		include 'index.html';
		exit();
	}
?>