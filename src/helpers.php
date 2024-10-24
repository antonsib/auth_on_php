<?php 

session_start();

function redirect(string $path) : void
{
    header("Location: $path");
    die();
}

function checkAuth() : void
{
    if (!isset($_SESSION['user']['id']))
    {
      redirect('/index.php');
    }
}

function checkGuest() : void
{
    if (isset($_SESSION['user']['id']))
    {
        redirect('/index.php');
    }
}

function getUserName() :string 
{
    return $_SESSION['user']['name'];
}

function validateEmail(string $email) 
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateName(string $name)
{
    return preg_match(" /^[a-zA-Zа-яА-Я]+$/", $name);
}

