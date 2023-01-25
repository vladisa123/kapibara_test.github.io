<?php


?>
    <pre>
<?php var_dump($_ENV); ?>
    </pre>
<?php
try {
//    $pdo = new PDO('postgres:db');
//    $pdo = new PDO('mysql:dbname=test; host=localhost', 'root', '');

    @$host = $_ENV["hostname"];
    @$user = $_ENV["username"];
    @$pass = $_ENV["password"];
    @$db = $_ENV["database"];

    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
//    $dsn = "pgsql:host=babar.db.elephantsql.com;port=5432;dbname=fzvghvjd;";
    // make a database connection
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
//    $pdo = new PDO($dsn, "fzvghvjd", "PNKNkQPU0x_noMYwKtuny1d8HBr-79fl", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
    die($e->getMessage());
}