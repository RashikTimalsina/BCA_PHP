
<?php
if (!empty($_FILES)) {
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $upload_dir = 'images/';
    echo $upload_dir;
    
    // Ensure the directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (move_uploaded_file($tmp_name, $upload_dir . $image)) {
        echo "Upload successful!";
    } else {
        echo "Upload failed!";
    }
}
?>

<h1>Contact</h1>
<form action="" method="post" enctype="multipart/form-data">
    Image: <br>
    <input type="file" name="image"><br><br>
    <button type="submit">Submit</button>
</form>
