<?php
require "bootstrap.php";

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS users (
        user_id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        role VARCHAR(100) NOT NULL,
        first_name VARCHAR(100),
        last_name VARCHAR(100),
        PRIMARY KEY(user_id)
    );

    INSERT INTO users VALUES (
        1,
        'admin',
        'admin',
        'admin',
        'admin',
        'admin'
    )
EOS;

try {
    $dbConnection->exec($statement);
    echo "MIGRATION SUCCESSFUL\n";
} catch(\PDOException $e) {
    exit($e->getMessage());
}
