<?php

session_start();

include('../koneksi.php');

if(isset($_POST['login'])){

$username =
$_POST['username'];

$password =
md5($_POST['password']);

$cek =
mysqli_query(
$conn,
"SELECT * FROM admin
WHERE username='$username'
AND password='$password'"
);

if(mysqli_num_rows($cek)>0){

$_SESSION['admin']=true;

header("Location: dashboard.php");

exit;

}else{

echo "Login gagal";

}

}

?>

<form method="POST">

<h2>Login Admin</h2>

<input
type="text"
name="username"
placeholder="Username">

<br><br>

<input
type="password"
name="password"
placeholder="Password">

<br><br>

<button
name="login">
Login
</button>

</form>