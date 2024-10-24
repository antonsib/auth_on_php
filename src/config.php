<?php 

function getDataSettings() 
{
    $db_data = " 
    host = 127.0.0.1 
    port = 5432 
    dbname = auth_users 
    user = postgres 
    password = 12345
    ";

    return $db_data;
}