<?php

try {
    $pdo = new PDO('sqlite:https://github.com/vladisa123/kapibara_test.github.io/blob/dd89da64c9ea72799074e434fa82b8bccdc4c54b/db');
} catch (PDOException $e) {
    die($e->getMessage());
}