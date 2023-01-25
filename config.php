<?php

try {
    $pdo = new PDO('sqlite:db');
} catch (PDOException $e) {
    die($e->getMessage());
}