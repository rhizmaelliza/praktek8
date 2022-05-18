<?php
// Membuat Koneksi Database
$host="localhost";
$user="root";
$password="";
$dbname="praktek8";
$conn=mysqli_connect($host, $user, $password, $dbname);
if(!$conn){
    echo 'Error : '.mysqli_connnect_error($conn);
}
?>