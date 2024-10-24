<?php 

require_once __DIR__.'/../helpers.php';
require_once __DIR__.'/../config.php';

function generateSalt()
{
	$salt = '';
	$saltLength = 16; 
		
	for($i = 0; $i < $saltLength; $i++) {
		$salt .= chr(mt_rand(33, 126));
	}
		
	return $salt;
}

$name = $_POST["name"] ?? null;
$email = $_POST["email"]?? null;
$password = $_POST["password"]?? null;
$passwordConfirmation = $_POST["password_confirmation"]?? null;

if (empty($name) || empty($email) || empty($password) || empty($passwordConfirmation)) 
{
    redirect('/register.php');
}

if ($password != $passwordConfirmation) 
{
    redirect('/register.php');
}

if (!validateName($name))
{
    redirect('/register.php');
}

if(!validateEmail($email))
{
    redirect('/register.php');
}

$connect_data = getDataSettings();

$db_connect = pg_connect($connect_data);

if (!$db_connect) {
    die("Ошибка подключения: " . pg_result_error());
} 

$query = "SELECT * FROM users WHERE email = '$email'"; 

$data = pg_query($db_connect, $query);

$result = pg_fetch_row($data);

if ($result[1]!=NULL || $result[3]!=NULL)
{
    redirect('/register.php');
}

$salt = generateSalt();

$hashPassword = md5($salt . $password);

$query = "insert into users values(DEFAULT, '$name' , '$email', '$hashPassword', '$salt')";

$res = pg_query($db_connect, $query);

pg_close($db_connect);

redirect('/index.php');