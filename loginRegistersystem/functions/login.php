<?php

function validitate_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if(isset($_POST['email']) &&
   isset($_POST['password'])){
    
    $email = validitate_input($_POST['email']);
    $password = validitate_input($_POST['password']);
    if(empty($email)){
      $error = "Email is required ";
      header('Location:../pages/loginPage.php');
    }
    else if(empty($password)){
        $error = "Password is required ";
        header('Location:../pages/loginPage.php');
    }else{
        include('conn.php');
        $sql = ('SELECT * FROM users WHERE email = ?');
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
          
        }else{
            $error = "User Not Found ";
        }
    }
   }