<?php
$host = getenv('PGHOST');
$port = getenv('PGPORT') ?: 5432;
$db = getenv('PGDATABASE');
$user = getenv('PGUSER');
$pass = getenv('PGPASSWORD');

if (!$host || !$db || !$user || !$pass) {
    die("Database environment variables not set");
}

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


