<?php
/* ============================================================
   Database connection (MySQL via PDO)
   ---> EDIT the four values below to match your phpMyAdmin DB.
   ============================================================ */
$DB_HOST = 'sql113.infinityfree.com';          // usually 'localhost'
$DB_NAME = 'if0_42104284_portfolio';          // the database name you created in phpMyAdmin
$DB_USER = 'if0_42104284';               // your MySQL username
$DB_PASS = '7568565831';                   // your MySQL password ('' for local XAMPP/WAMP)

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