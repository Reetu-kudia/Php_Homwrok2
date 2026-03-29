<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <Form method="POST">
    Employe Name:
    <input type="text" name="name" id="name">
    <br>
    Job Title:
    <input type="text" name="job_title" id="job_title">
    <br>
    Salary:
    <input type="text" name="salary" id="salary">
    <br>
  <button type="submit" name="action" value="insert">Insert</button>
<button type="submit" name="action" value="update">Update</button>
<button type="submit" name="action" value="delete">Delete</button>
<button type="submit" name="action" value="show">Show</button>
</Form>

</body>
</html>

<?php
include "Q1dbconnection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $job_title = $_POST["job_title"];
    $salary = $_POST["salary"];
    $action = $_POST["action"];

    // INSERT
    if($action == "insert"){
        $sql = $conn->prepare("INSERT INTO Employe VALUES(?,?,?)");
        $sql->bind_param("ssi", $name, $job_title, $salary);

        if($sql->execute()){
            echo "Data Inserted";
        }
    }

    // UPDATE
    if($action == "update"){
        $sql = $conn->prepare("UPDATE Employe SET job_title=?, salary=? WHERE name=?");
        $sql->bind_param("sis", $job_title, $salary, $name);

        if($sql->execute()){
            echo "Data Updated";
        }
    }

    // DELETE
    if($action == "delete"){
        $sql = $conn->prepare("DELETE FROM Employe WHERE name=?");
        $sql->bind_param("s", $name);

        if($sql->execute()){
            echo "Data Deleted";
        }
    }

    // SHOW
    if($action == "show"){
        $result = $conn->query("SELECT * FROM Employe");

        while($row = $result->fetch_assoc()){
            echo $row["name"] . " - " . $row["job_title"] . " - " . $row["salary"] . "<br>";
        }
    }
}
?>