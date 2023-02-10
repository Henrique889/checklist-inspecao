<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){

 include 'conexao.php';
 
 //$cono = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 $Setencia = $conexao -> prepare("SELECT * FROM users WHERE email = ? and password = ?");
 $Setencia -> bind_param('ss',$email, $password);
 $Setencia-> execute();
 //$Sql_Query = "select * from users where email = '{$email}' and password = '{$password}'";
 
 $result = $Setencia->get_result();
 
 if($result->fetch_assoc()){
    echo "login";
 }
 else{
 echo "Invalid Username or Password Please Try Again";
 }
 
 }else{
 echo "Check Again";
 }
//mysqli_close($Setencia);
mysqli_close($conexao);

?>