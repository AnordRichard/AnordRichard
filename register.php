<?php
// Kuweka connection na database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passenger_management";

// Unda connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Angalia connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kitendo cha Usajili
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Funga connection baada ya shughuli kukamilika
?>

<!-- HTML ya fomu ya usajili -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-image: url(bg.jpg); }
        .container { max-width: 400px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        label { display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="password"],input[type="email"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px; text-align: center; }
        .btn:hover { background-color: #0056b3; }
    </style>
 </head>
 <body>
    <div class="container">
        <h2>Register Now</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit" name="register" class="btn">Register</button>
</form><p><a href="login.php">Sign in</a></p>
</div>
</body>
</html>
