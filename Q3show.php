
<?php
include "db_1.php";

$result = $conn->query("SELECT * FROM Emp");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="01" align="center" style="background: linear-gradient(lightpink , lightblue, lightgreen);">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["position"]; ?></td>
                <td><?php echo $row["salary"]; ?></td>
            </tr>
            <?php } ?>
    </table>
</body>
</html>
