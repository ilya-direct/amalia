<?php
 $db =mysql_connect("localhost", "root", ""); // Подключаемся к базе данных
 mysql_select_db ("notum", $db);

 switch($_POST['funct']){
    case 'name': $sql_query=mysql_query("Select Mail from patient where Mail='".$_POST['name']."'");
    if(mysql_num_rows($sql_query)!=0){
       echo 0;
   } else{
       echo 1;
}
    break;	
	case 'pass':  $sql_query=mysql_query("Select Mail, Password from users where Mail='".$_POST['name']."'");
	              $data=mysql_fetch_assoc($sql_query);
				  
				  if($_POST['name']==$data['Mail'] && md5($_POST['pass'])==$data['Password']){
				     echo 0;
   } else{
       echo 1;
}
	break;
}	
?>