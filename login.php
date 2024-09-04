<?php
session_start();

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

// Kitendo cha Kuingia
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: test.html");
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with that username or email!";
    }
}

$conn->close(); // Funga connection baada ya shughuli kukamilika
?>

<!-- HTML ya fomu ya kuingia -->
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
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px; text-align: center; }
        .btn:hover { background-color: #0056b3; }
    </style>
 </head>
 <body>
    <div class="container">
        <h2>Login</h2>
<form method="post">
    Username or Email: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit" name="login" class="btn">Login</button>
</form><p>Forgot Pssword <a href="register.php">SignUp</a></p>
</div>
</body>
</html>
