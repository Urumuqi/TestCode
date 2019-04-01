<?php

$dsn = 'mysql:host=127.0.0.1;post=3306;dbname=db_test';
$user = 'root';
$passwd = 'root';
$options = array(
    PDO::ATTR_PERSISTENT => true,
);
try {
    $dbConn = new PDO($dsn, $user, $passwd, $options);
    foreach ($dbConn->query('select * from pseudohash') as $row) {
        print_r($row);
    }
} catch (PDOException $e) {
    echo 'error : ' . $e->getMessage() . PHP_EOL;
    die();
}
