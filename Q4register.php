
<?php
include "db_1.php";
$result = $conn->query("SELECT * FROM Emp");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

<form method="POST">
Full Name:
<input type="text" name="name"><br>
Email:
<input type="text" name="email"><br>
Password:
<input type="password" name="password"><br>
Confirm Password:
<input type="password" name="confirm_password"><br>
Job Title:
<input type="text" name="job_title"><br>
<button type="submit" name="action" value="register">Register</button>
</form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"]; 
    $job_title = $_POST["job_title"];

    if(empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($job_title)){
        echo "<script>alert('All fields are required');</script>";
        exit;   
    }
    else if($password !== $confirm_password){
        echo "<script>alert('Passwords do not match');</script>";
        exit;   
    }
    else {
        echo "<script>alert('Form Submitted Successfully!');</script>";
    }
}
?>
