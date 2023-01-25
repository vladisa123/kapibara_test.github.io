<?php
try {
    @$host = $_ENV["hostname"];
    @$user = $_ENV["username"];
    @$pass = $_ENV["password"];
    @$db = $_ENV["database"];

    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
    die($e->getMessage());
}