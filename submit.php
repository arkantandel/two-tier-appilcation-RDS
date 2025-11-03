<?php
// ---------- AWS RDS Connection Details ----------
$servername = "your-rds-endpoint.amazonaws.com";  // 🔹 Replace with your RDS endpoint
$username   = "admin";                            // 🔹 Your RDS username
$password   = "YourPassword";                     // 🔹 Your RDS password
$dbname     = "yourdatabase";                     // 🔹 Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<h3>❌ Database Connection Failed:</h3> " . $conn->connect_error);
}

// ---------- Get Form Data ----------
$name  = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// ---------- Insert Data ----------
$sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>✅ Data Inserted Successfully!</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone: $phone</p>";
    echo "<br><a href='form.html'>Go Back</a>";
} else {
    echo "<h3>❌ Error Inserting Data:</h3> " . $conn->error;
}

// Close connection
$conn->close();
?>
