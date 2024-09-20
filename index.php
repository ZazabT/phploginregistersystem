<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
        }

        .calculator-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: green;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="number"]{
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        select {
            width: 105%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <?php include('conn.php');?>

    <form action="calcu.php" class="calculator-form" method="post">
        <h2>Simple Calculator</h2>

        <label for="FirstNum">First Number</label>
        <input type="number" name="num1" id="num1" required>

        <label for="opra">Operation</label>
        <select name="opr" id="opr" required>
            <option value="add">Add (+)</option>
            <option value="sub">Subtract (-)</option>
            <option value="mul">Multiply (*)</option>
            <option value="div">Divide (/)</option>
            <option value="rem">Remainder (%)</option>
            <option value="pow">Power (^)</option>
        </select>

        <label for="SecondNum">Second Number</label>
        <input type="number" name="num2" id="num2" required>

        <input type="submit" class="btn-submit" value="Calculate">

        <?php
        $qurey = "select * from `users`";
        $result = mysqli_query($connection , $qurey);
        if(!$result){
          die("Error");
        }
        else{
          while($row = mysqli_fetch_assoc($result)){
            ?>
            <h1><?php echo $row["username"]?></h1>
            <h1><?php echo $row["email"]?></h1>
            <h1><?php echo $row["created_at"]?></h1>
            <?php
          }
        }
        ?>
    </form>
</body>
</html>
