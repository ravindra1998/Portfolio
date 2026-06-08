<?php
/* ============================================================
   Database connection (MySQL via PDO)
   ---> EDIT the four values below to match your phpMyAdmin DB.
   ============================================================ */
$DB_HOST = '127.0.0.1';
$DB_NAME = 'portfolio';
$DB_USER = 'root';      // default local user
$DB_PASS = '';                   // your MySQL password ('' for local XAMPP/WAMP)

function get_db() {
  global $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS;
  static $pdo = null;
  if ($pdo === null) {
    $dsn = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4";
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
  }
  return $pdo;
}
