🌐 Two-Tier Web Application (Frontend +PHP + AWS RDS MySQL) with     Arkan Tandel

This project demonstrates a Two-Tier Architecture using Linux (EC2) for the web server and AWS RDS (MySQL) for the database layer.
It’s a beginner-friendly yet professional setup that mirrors how real-world cloud applications are deployed. 

________________________________________
🧱 Project Overview
The goal of this project was to build a simple data submission web app using:
•	Frontend: HTML Form (form.html)
•	Backend: PHP Script (submit.php)
•	Database: AWS RDS (MySQL)
•	Server: Linux-based EC2 instance
Users can fill out a form that sends data to the PHP backend, which then stores it securely inside a MySQL database hosted on AWS RDS.
________________________________________
🗂️ Project Structure
project-folder/
│
├── form.html          # Frontend form for user input
├── submit.php         # Backend script for handling form submission
└── README.md          # Documentation file
________________________________________
⚙️ How It Works (Architecture Flow)
Here’s a simplified visual of the Two-Tier Architecture:
        +-----------------------+
        |     User Browser      |
        +----------+------------+
                   |
                   v
        +-----------------------+
        |   Web Server (EC2)    |
        |  - Linux OS           |
        |  - Apache / HTTPD     |
        |  - PHP Backend        |
        +----------+------------+
                   |
        Connection (via Endpoint)
                   |
                   v
        +-----------------------+
        |   AWS RDS (MySQL)     |
        |  - Stores form data   |
        +-----------------------+
________________________________________
🚀 Step-by-Step Setup
1️⃣ Launch a Linux EC2 Instance
•	Create a new EC2 instance using Amazon Linux or Ubuntu.
•	Install Apache and PHP:
•	sudo apt update
•	sudo apt install apache2 php php-mysql -y
•	Start and enable Apache:
•	sudo systemctl start apache2
•	sudo systemctl enable apache2
2️⃣ Create form.html
Example:
<!DOCTYPE html>
<html>
<head>
  <title>Data Form</title>
</head>
<body>
  <form action="submit.php" method="POST">
    <label>Name:</label><input type="text" name="name"><br>
    <label>Email:</label><input type="email" name="email"><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
3️⃣ Create AWS RDS MySQL Database
•	Go to AWS RDS → Create Database → Select MySQL.
•	Choose public accessibility if needed.
•	Note down the RDS Endpoint, Username, and Password.
4️⃣ Connect PHP to RDS (submit.php)
Example:
<?php
$servername = "your-rds-endpoint.amazonaws.com";
$username = "admin";
$password = "yourpassword";
$dbname = "yourdatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
if ($conn->query($sql) === TRUE) {
  echo "Data inserted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
________________________________________
🧩 Architecture Layers (2-Tier Breakdown)
Tier	Component	Description
Tier 1 (Presentation)	HTML Form + PHP on EC2	Handles user input and sends it to backend
Tier 2 (Data)	AWS RDS MySQL	Stores and retrieves application data
________________________________________
📈 Workflow Diagram
User Input → form.html → submit.php → MySQL (RDS) → Response Displayed
________________________________________
💡 Key Features
•	Real-time data submission using PHP.
•	Secure RDS connection using endpoint.
•	Scalable cloud-based MySQL backend.
•	Lightweight and reliable architecture.
•	Deployed on Linux-based server for high stability.
________________________________________
🧰 Tech Stack
•	Frontend: HTML
•	Backend: PHP
•	Server: Apache on Linux (EC2)
•	Database: MySQL (AWS RDS)
•	Platform: Amazon Web Services (AWS)
________________________________________
🧠 Learning Outcome
•	Understood the working of Two-Tier Architecture.
•	Learned to connect a web server to AWS RDS.
•	Implemented PHP database connectivity.
•	Practiced basic cloud deployment.
________________________________________
🖼️ Future Enhancements
•	Add validation and CSS styling.
•	Secure the PHP script using prepared statements.
•	Move towards a 3-Tier Architecture by adding an application layer.
•	Integrate a Load Balancer (ALB) for scaling.
________________________________________
🏁 Conclusion
This project is a foundational step towards mastering cloud-based web applications.
It demonstrates how to connect and deploy a fully functional web app using Linux + PHP + AWS RDS.
________________________________________
Author: Arkan Tandel
LinkedIn link : linkedin.com/in/arkan-tandel-81709b360
Project Type: AWS Cloud | Two-Tier Architecture
Version: 1.0
License: MIT

