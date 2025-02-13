<?php
$conn = mysqli_connect('localhost', 'root', 'CLEB2d@mysql', 'bca');

if (!$conn) {
    echo "Database connected";
}
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <blockquote>
        <h1>Student Record</h1>
        <a href="student.php">Home</a>
        <a href="add.php">Add Student</a>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
                <?php foreach ($result as $students) { ?>
                    <tr>
                        <td><?= $students['id'] ?></td>
                        <td><?= $students['name'] ?></td>
                        <td><?= $students['email'] ?></td>
                        <td><?= $students['address'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $students['id'] ?>">Edit</a>
                            <a href="delete.php?id=<?= $students['id'] ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </thead>
        </table>
    </blockquote>
</body>

</html>