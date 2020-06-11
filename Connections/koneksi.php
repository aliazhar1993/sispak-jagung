<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_koneksi = "localhost";
$database_koneksi = "dbtani";
$username_koneksi = "root";
$password_koneksi = "";
$koneksi = new mysqli($hostname_koneksi,$username_koneksi,$password_koneksi,$database_koneksi);
$koneksi = mysqli_connect($hostname_koneksi, $username_koneksi, $password_koneksi, $database_koneksi);
if (!$koneksi){
        die("Connection Failed:".mysqli_connect_error());
    }

?>