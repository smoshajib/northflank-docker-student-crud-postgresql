<?php
$host = getenv('PGHOST');
$port = getenv('PGPORT');
$db = getenv('PGDATABASE');
$user = getenv('PGUSER');
$pass = getenv('PGPASSWORD');

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $sql = "CREATE TABLE IF NOT EXISTS students (
        id SERIAL PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        phone VARCHAR(20)
    )";
    $pdo->exec($sql);
    echo "✅ Table 'students' created successfully with name, email, phone columns.";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
