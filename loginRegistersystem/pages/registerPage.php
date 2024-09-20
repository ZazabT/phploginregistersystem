<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Body styling */
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #f4f4f9, #e2e2e2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for the form */
        .register-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        /* Header styles */
        .register-container h1 {
            font-size: 2.5em;
            margin-bottom: 5px;
            color: #333;
        }

        .register-container h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #666;
            font-weight: 300;
        }

        /* Form and input styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-size: 14px;
            color: #333;
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 14px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 14px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Already have an account link */
        p {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            padding-left: 6px;
        }

        /* Error and success message styling */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        
        .success-message {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h1>Register</h1>
        <h2>Join Us Today!</h2>

        <form action="../functions/register.php" method="post">  
            <label for="username">Username</label>
            <input type="text" name="username" id="username" >

            <label for="email">Email</label>
            <input type="email" name="email" id="email" >

            <label for="password">Password</label>
            <input type="password" name="password" id="password" >

            <label for="confirm">Confirm Password</label>
            <input type="password" name="confirm" id="confirm" >

            <input type="submit" value="Sign Up">

            <p>Already have an account? <a href="loginPage.php">Login</a></p>

            <!-- Error message display -->
            <?php 
            if (isset($_GET['error'])) {
                echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
            }
            ?>

            <!-- Success message display -->
            <?php 
            if (isset($_GET['success'])) {
                echo '<div class="success-message">' . htmlspecialchars($_GET['success']) . '</div>';
            }
            ?>
        </form>
    </div>

</body>
</html>
