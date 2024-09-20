<?php
function validitate_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['username']) &&
   isset($_POST['email']) &&
   isset($_POST['password']) &&
   isset($_POST['confirm'])) {

    $name = validitate_input($_POST['username']);
    $email = validitate_input($_POST['email']);
    $password = validitate_input($_POST['password']);
    $confirm = validitate_input($_POST['confirm']);

    // Validation checks
    if (empty($name)) {
        $error = "User name is required";
        header("Location: ../pages/registerPage.php?error=" . urlencode($error));
        exit;
    } elseif (empty($email)) {
        $error = "Email is required";
        header("Location: ../pages/registerPage.php?error=" . urlencode($error));
        exit;
    } elseif (empty($password)) {
        $error = "Password is required";
        header("Location: ../pages/registerPage.php?error=" . urlencode($error));
        exit;
    } elseif (empty($confirm)) {
        $error = "Confirm password is required";
        header("Location: ../pages/registerPage.php?error=" . urlencode($error));
        exit;
    } elseif ($confirm != $password) {
        $error = "Passwords don't match";
        header("Location: ../pages/registerPage.php?error=" . urlencode($error));
        exit;
    } else {
        include('conn.php');

        // Check if the email already exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $error = "Email already exists, try to log in";
            header("Location: ../pages/registerPage.php?error=" . urlencode($error));
            exit;
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert the new user into the database
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $email, $hashed_password]);

            // Redirect to login page with success message
            $success = "You have successfully registered. Now, please login!";
            header("Location: ../pages/loginPage.php?success=" . urlencode($success));
            exit;
        }
    }
} else {
    $error = "All fields are required";
    header("Location: ../pages/registerPage.php?error=" . urlencode($error));
    exit;
}
?>
