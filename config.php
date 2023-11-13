<?php
$host = 'localhost';
$db = 'CV';
$user = 'ammara';
$pwd = '0612';

$conn = mysqli_connect($host, $user, $pwd, $db); // true | false

if (!$conn) {
  die('Gagal terhubung ke database. '. mysqli_connect_error());
}
