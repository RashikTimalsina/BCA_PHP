
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        blockquote{
            width: 50%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
            border-radius: 10px;
        }
        h1{
            text-align: center;
            margin-bottom: 50px;
        }
        hr{
            margin-top: 20px;
        }
        input{
            margin-bottom: 10px;
           
        }
        button{
            margin-top: 10px;
        }
        label{
            margin: 20px;
            width: 100px;
        }
        #name{
            margin-left: 75px;
            width: 200px;
        }
        #f_name{
            margin-left: 20px;
            width: 200px;
        }
        #m_name{
            margin-left: 15px;
            width: 200px;
        }
        #email{
            margin-left: 75px;
            width: 200px;
        }
        #phone{
            margin-left: 75px;
            width: 200px;
        }
        #gender{
            margin-left: 50px;
            width: 50px;

        }
        #DOB{
            margin-left: 40px;
            width: 200px;
        }
        #address{
            margin-left: 65px;
            width:200px;
        }
        #blood_group{
            margin-left: 33px;
            width:100px;   
        }
        #department{
            margin-left: 40px;
            width: 50px;
        }
        #course{
            margin-left: 50px;
            width: 50px;
       }
        #photo{
            margin-left: 80px;
        }

        button{
            margin-left: 20px;
            margin-bottom: 72px;
        }
        .form {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            background: blue;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }
        


    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $father_name = $_POST['father_name'] ?? '';
    $mother_name = $_POST['mother_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $DOB = $_POST['DOB'] ?? '';
    $address = $_POST['address'] ?? '';
    $blood_group = $_POST['blood_group'] ?? '';
    $department = $_POST['department'] ?? '';
    $course = $_POST['course'] ?? '';
    

    if (isset($_FILES['photo'])) {
        $photo = $_FILES['photo'];

        $photo_path = "uploads/" . basename($photo['name']);
        move_uploaded_file($photo['tmp_name'], $photo_path);
    }


    echo "<h2>Submitted User Data:</h2>";
    echo "Name: " . $username . "<br>";
    echo "Father's Name: " . $father_name . "<br>";
    echo "Mother's Name: " . $mother_name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Phone: " . $phone . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Date of Birth: " . $DOB . "<br>";
    echo "Address: " . $address . "<br>";
    echo "Blood Group: " . $blood_group . "<br>";
    echo "Department: " . $department . "<br>";
    echo "Course: " . $course . "<br>";
    echo "Photo: " . (isset($photo_path) ? $photo_path : 'No photo uploaded') . "<br>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
?>


    <blockquote>
        <h1>Contact Page</h1>
        <form action="contact.php" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="username" placeholder="Enter full name" id="name" name="name"><br><br>

    <label for="father_name">Father's Name:</label>
    <input type="text" name="father_name" id="f_name" name="f_name"><br><br>

    <label for="mother_name">Mother's Name:</label>
    <input type="text" name="mother_name" id="m_name" name="m_name"><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" name="email"><br><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" name="phone"><br><br>

    <label for="gender">Gender:</label>
    <input type="radio" name="gender" id="gender" value="Male">Male
    <input type="radio" name="gender" id="gender" value="Female">Female
    <input type="radio" name="gender" id="gender" value="Other">Other<br><br>

    <label for="DOB">Date of Birth:</label>
    <input type="date" name="DOB" id="DOB" name="DOB"><br><br>

    <label for="address">Address:</label>
    <input type="text" name="address" placeholder="Street:   House:    Road:" id="address" name="address"><br><br>

    <label for="blood_group">Blood Group:</label>
    <select name="blood_group" id="blood_group" name="blood_group" required>
        <option value="" selected disabled>Select</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select><br><br>

    <label for="department">Department:</label>
    <input type="radio" name="department" id="department" value="CSE">CSE
    <input type="radio" name="department" id="department" value="BBA">BBA
    <input type="radio" name="department" id="department" value="BCA">BCA<br><br>

    <label for="course">Course:</label>
    <input type="checkbox" name="course" id="course" value="C">C
    <input type="checkbox" name="course" id="course" value="C++">C++
    <input type="checkbox" name="course" id="course" value="JAVA">JAVA
    <input type="checkbox" name="course" id="course" value="AI">AI<br><br>


    <label for="photo">Photo:</label>
    <input type="file" name="photo" id="photo" name="photo"><br><br>

    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>

    </blockquote>
    
   



</body>
</html>