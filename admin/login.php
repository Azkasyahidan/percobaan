<?php
session_start();
require 'config/koneksi.php';

if(isset($_POST['login']))
{

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn,
"SELECT * FROM admin
WHERE username='$username'
AND password='$password'");

if(mysqli_num_rows($query)>0)
{
$_SESSION['admin']=true;

header("Location: admin/dashboard.php");
}
else
{
echo "Login Gagal";
}

}
?>

<form method="POST">

<input type="text"
name="username"
placeholder="Username">

<input type="password"
name="password"
placeholder="Password">

<button name="login">
Login
</button>

</form>