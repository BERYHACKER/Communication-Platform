<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bersite_db");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: home.php"); // Redirect to home page
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No account found with this email!";
    }
}
?>
