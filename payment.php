<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passenger_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passenger_id = $_POST['passenger_id'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    
    // Insert payment into the database
    $sql = "INSERT INTO payments (passenger_id, amount, payment_method) VALUES ('$passenger_id', '$amount', '$payment_method')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: status.php");
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-image: url(bg.jpg); }
        .container { max-width: 500px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        label { display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px; text-align: center; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Form</h2>
        <form method="post" action="">
            <label for="passenger_id">Passenger ID:</label>
            <input type="text" id="passenger_id" name="passenger_id" required>
            
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>
            
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="">Select Payment Method</option>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
                <option value="Bank Transfer">Bank Transfer</option>
            </select>
            
            <input type="submit" value="Submit Payment" class="btn">
        </form>
    </div>
</body>
</html>
