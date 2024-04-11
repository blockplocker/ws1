<?php

/**
 * PDO-connector
 *
 * @param [string] $host
 * @param [string] $db
 * @param [string] $user
 * @param [string] $pass
 * @param string $charset
 * @return pdo
 */
function connectToDb(): PDO
{
    $host = "127.0.0.1";
    $db = "bilar";
    $user = "root";
    $pass = "hemligt";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (PDOException $e) {
        throw new PDOException("Connection failed: " . $e->getMessage());
    }
}