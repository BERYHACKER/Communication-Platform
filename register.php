<?php
$conn = new mysqli("localhost", "root", "", "bersite_db");

if(isset($_POST['create_account'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (full_name, email, username, password, date_of_birth, phone_number)
            VALUES ('$full_name', '$email', '$username', '$password', '$dob', '$phone')";
    
    if($conn->query($sql)){
        echo "Account created successfully! <a href='login.html'>Login now</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
