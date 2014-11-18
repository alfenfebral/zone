<?php
// Value Database
$host = "localhost"; //Host yang dipakai
$username = "root"; // Nama Pengguna
$password = ""; // Kata Sandi
$database = "promhs"; // Nama database

// Database
mysql_connect($host, $username, $password) or die ('FS: Error pada user SQL');
mysql_select_db($database) or die ('Tidak dapat memilih database');
?>