<?php
require_once "config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$q = mysqli_query($koneksi, 
    "SELECT * FROM users WHERE username='$username' AND password='$password'"
);

$data = mysqli_fetch_assoc($q);

if ($data) {

    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    header("Location: home.php");
} else {
    echo "<script>alert('Login gagal');window.location='login.php';</script>";
}
?>