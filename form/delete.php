<?php
$conn = mysqli_connect('localhost', 'root', '', 'bca');  

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


// Checking if the student ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    // Fetching the existing student record from the database
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);



    // Checking if the student record exists
    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);      // Fetch the student record
    } else {
        die("Student not found.");               // Stop execution if the student is not found
    }


    // Deleting the student record when 'Delete' button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $deleteSql = "DELETE FROM students WHERE id = $id";
        $deleteResult = mysqli_query($conn, $deleteSql);

        if ($deleteResult) {
            echo "Record deleted successfully!";
            header("Location: student.php");      // redirect to student.php after deleting the record
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
} else {
    die("Student ID is not provided.");        // Stop execution if no student ID is passed in the URL
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
</head>
<body>
    <blockquote>
        <a href="student.php">Home</a> &ensp;
        <hr>
        <h1>Are you sure you want to delete this record?</h1>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
            <tr>
                <td><?php echo htmlentities($student['name']); ?></td>
                <td><?php echo htmlentities($student['email']); ?></td>
                <td><?php echo htmlentities($student['address']); ?></td>
            </tr>
        </table>
        <form action="" method="post"><br>
            <button type="submit">Delete Record</button>
            <button type="button" onclick="window.location='student.php'">Cancel</button>   <!--Redirect to student.php-->
        </form>
    </blockquote>
</body>
</html>
