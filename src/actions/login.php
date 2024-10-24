<?php 

require_once __DIR__.'/../helpers.php';
require_once __DIR__.'/../config.php';

$email = $_POST["email"]?? null;
$password = $_POST["password"]?? null;

if (empty($email) || empty($password)) 
{
    redirect('/index.php');
}

if(!validateEmail($email))
{
    redirect('/index.php');
}

$connect_data = getDataSettings();

$db_connect = pg_connect($connect_data);

if (!$db_connect) {
    die("Ошибка подключения: " . pg_result_error());
} 

$query = "SELECT * FROM users WHERE email = '$email'"; 

$data = pg_query($db_connect, $query);

$result = pg_fetch_row($data);

pg_close($db_connect);

$dbEmail = $result[2];
$dbPassword = $result[3];
$salt = $result[4];
$userPassword = md5($salt . $password);

if($dbEmail == $email && $userPassword == $dbPassword)
{   
    $_SESSION["user"]["id"] = $result[0];
    $_SESSION['user']['name'] = $result[1];
    redirect('/home.php'); 
}

redirect('/index.php');