<?php
$conn = mysqli_connect('localhost', 'root', '', 'bca'); // Updated to reflect the empty password

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Checking if the student ID is provided in the URL or not
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetching the existing student record from the database
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Checking if the student record exists
    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
    } else {
        die("Student not found."); // Stop execution if the student is not found
    }
} else {
    die("Student ID is not provided."); // Stop execution if no student ID is passed in the URL
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get updated values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Update the record in the database
    $updateSql = "UPDATE students SET name = '$name', email = '$email', address = '$address' WHERE id = $id";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>

<body>

    <blockquote>
        <a href="student.php">Home</a> &ensp;
        <hr>
        <form action="" method="post">
            <label for="name">Name</label> <br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required> <br>

            <label for="email">Email</label> <br>
            <input type="text" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required> <br>

            <label for="address">Address</label> <br>
            <input type="text" name="address" value="<?php echo htmlspecialchars($student['address']); ?>" required> <br>
            <br>
            <button type="submit">Update Record</button>
        </form>
    </blockquote>

</body>

</html>
