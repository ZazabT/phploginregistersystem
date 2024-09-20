<?php
  // start the sesstion
 session_start();

 // validitate the inputes
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
      exit();
    }
    else if(empty($password)){
        $error = "Password is required ";
        header('Location:../pages/loginPage.php'.urlencode($error));
        exit();
    }else{
        include('conn.php');
        $sql = ('SELECT * FROM users WHERE email = ?');
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
               if(password_verify($password , $user['password'])){

                // set the variables to the session
                $_SESSION['id']=$user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                header('Location:../pages/homePage.php');
                exit();
               }else{
                $error = "Wrong Password ";
               }
        }else{
            $error = "User Not Found ";
            header('Location:../pages/loginPage.php?error='. urlencode($error));
            exit();
        }
    }
   }