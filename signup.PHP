<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database connection
    $con = new mysqli("localhost", "root", "", "ebook_db");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Insert user data
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>

<html>
    <head>
        <title>Register Page</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back</a><br><br>
        <form action="signup.php" method="POST">
           Enter Username: <input type="text" name="username" required="required"><br>
           Enter Password: <input type="password" name="password" required="required"><br>
           <input type="submit" value="Register">
        </form>
    </body>
</html>
