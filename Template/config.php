<?php

$sever      = 'localhost';
$user       = 'root';
$pass       = 'password';
$database   = 'gogame';

$connect = mysqli_connect($sever, $user, $pass, $database);

if (!$connect)
{
    die('<script>alert("Gagal terhubung dengan database.")</script>');
}

?>