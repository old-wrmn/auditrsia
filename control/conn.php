<?php
    session_start();
    date_default_timezone_set("Asia/Jakarta");

    // $host = "localhost";
	// $user = "postgres";
	// $pass = "root";
	// $port = "5432";
	// $dbname = "auditRSIA2";
	
	$host = "ec2-23-21-136-232.compute-1.amazonaws.com";
	$user = "fpgidazjhpbmeo";
	$pass = "fae3404f88bfe142e3a3de176e2feb3d804c35f927465c6d075ca869f18128db";
	$port = "5432";
	$dbname = "d4v437k31d598n";
	
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>