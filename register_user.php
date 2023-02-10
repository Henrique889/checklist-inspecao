<?php
include 'conexao.php';
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
//if (!isset($username) || !isset($email) || !isset($password)) {
        
    $response = array();

    $user_check_query = "SELECT * FROM users WHERE name LIKE '$username' OR email LIKE '$email'";
    $result = mysqli_query($conexao, $user_check_query);
    
    if(mysqli_num_rows($result) > 0){
        echo "User is already registered";
    }else{
        $sql = "INSERT INTO users (id, name, email, password) VALUES ('','$username', '$email', '$password')";
        $sod = mysqli_query($conexao,$sql);
        if($sod){
            echo "User registered successfully";
        }
        else{
            echo "Failed to register";
        }
    }
     
/* }else{
     $response['error'] = true; 
     $response['message'] = 'required parameters are not available'; 
     echo json_encode($response);
 }*/
     
?>