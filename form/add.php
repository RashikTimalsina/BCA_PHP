<?php
$conn = mysqli_connect('localhost', 'root', '', 'bca'); 

if (!$conn) {
    die("Database connected failed: " . mysqli_connect_error());
}

if (!empty($_POST)) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, email, address) VALUES ('$name', '$email', '$address')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Recorded";
    } else {
        echo "Not Recorded";
    }
}
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
        <a href="student.php">Home</a> &ensp;
        <a href="add.php">Add Student</a>
        <hr>
        <form action="" method="post">
            <label for="name">Name</label> <br>
            <input type="text" name="name" required> <br>
            <label for="email">Email</label> <br>
            <input type="text" name="email" required> <br>
            <label for="address">Address</label> <br>
            <input type="text" name="address" required> <br>
            <button>Add Record</button>
        </form>
    </blockquote>
</body>

</html>
