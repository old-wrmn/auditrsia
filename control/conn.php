<?php
    session_start();
    date_default_timezone_set("Asia/Jakarta");

    $host = "localhost";
	$user = "postgres";
	$pass = "root";
	$port = "5432";
	$dbname = "auditRSIA2";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>