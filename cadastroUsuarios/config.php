<?php

$db_name = 'cadastroUsuarios';
$db_host = 'localhost';
$db_user = 'postgres';
$db_pass = '12345678';

$pdo = new PDO("pgsql:dbname=".$db_name.";host=".$db_host,$db_user,$db_pass);
