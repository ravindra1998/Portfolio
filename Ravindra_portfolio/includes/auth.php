<?php

   /* ============================================================
   Admin authentication (session based, credentials in database)
   ------------------------------------------------------------
   - On first run this auto-creates two tables (admin_users,
     password_resets) and seeds the default admin account below.
   - After that, the password can be changed via the
     "Forgot password" flow, and the new one is stored in the DB.

   ------------------------------------------------------------
   To change the login email/password:
     - Email: edit ADMIN_EMAIL below.
     - Password: generate a new hash and paste it into ADMIN_PASS_HASH.
       Easiest way to make a hash — create a temp file with:
         <?php echo password_hash('YourNewPassword', PASSWORD_DEFAULT);
       open it in the browser, copy the output, then delete the file.
   Current login:  email = your email,  password = Ravindra@123

   Default login (used only to seed the account the first time):
     Email:    ravindradeeg95@gmail.com
     Password: Ravindra@123
   ============================================================ */
require_once __DIR__ . '/db.php';


const SEED_ADMIN_EMAIL     = 'ravindradeeg95@gmail.com';
const SEED_ADMIN_HASH = '$2b$12$yumRw1rZaeYBz4R5vzgglehwpzqp1tp8ONnsCAtVEW4vSoPB5ZmKa';  // = Ravindra@123

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
/* Create tables + seed the admin account if needed. Safe to call often. */
function admin_ensure_setup(): void {
  $pdo = get_db();
  $pdo->exec("CREATE TABLE IF NOT EXISTS admin_users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      email VARCHAR(180) NOT NULL UNIQUE,
      password_hash VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
  $pdo->exec("CREATE TABLE IF NOT EXISTS password_resets (
      id INT AUTO_INCREMENT PRIMARY KEY,
      email VARCHAR(180) NOT NULL,
      token_hash VARCHAR(64) NOT NULL,
      expires_at DATETIME NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
  $count = (int) $pdo->query("SELECT COUNT(*) FROM admin_users")->fetchColumn();
  if ($count === 0) {
    $stmt = $pdo->prepare("INSERT INTO admin_users (email, password_hash) VALUES (?, ?)");
    $stmt->execute([SEED_ADMIN_EMAIL, SEED_ADMIN_HASH]);
  }
}

function admin_get_user(string $email): ?array {
  $stmt = get_db()->prepare("SELECT * FROM admin_users WHERE email = ? LIMIT 1");
  $stmt->execute([strtolower(trim($email))]);
  $row = $stmt->fetch();
  return $row ?: null;
}

function admin_check_login(string $email, string $password): bool {
  $user = admin_get_user($email);
  return $user && password_verify($password, $user['password_hash']);
}

function admin_set_password(string $email, string $newPassword): void {
  $hash = password_hash($newPassword, PASSWORD_DEFAULT);
  $stmt = get_db()->prepare("UPDATE admin_users SET password_hash = ? WHERE email = ?");
  $stmt->execute([$hash, strtolower(trim($email))]);
}

/* ---- Password reset tokens ---- */
function admin_create_reset_token(string $email): ?string {
  $user = admin_get_user($email);
  if (!$user) return null;                       // email not an admin
  $token = bin2hex(random_bytes(32));            // raw token (goes in the link)
  $hash  = hash('sha256', $token);               // store only the hash
  $pdo = get_db();
  $pdo->prepare("DELETE FROM password_resets WHERE email = ?")->execute([$user['email']]);
  $stmt = $pdo->prepare("INSERT INTO password_resets (email, token_hash, expires_at)
                         VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
  $stmt->execute([$user['email'], $hash]);
  return $token;
}

function admin_email_for_token(string $token): ?string {
  $hash = hash('sha256', $token);
  $stmt = get_db()->prepare("SELECT email FROM password_resets
                             WHERE token_hash = ? AND expires_at > NOW() LIMIT 1");
  $stmt->execute([$hash]);
  $email = $stmt->fetchColumn();
  return $email ?: null;
}

function admin_consume_token(string $token): void {
  $hash = hash('sha256', $token);
  get_db()->prepare("DELETE FROM password_resets WHERE token_hash = ?")->execute([$hash]);
}

/* ---- Session helpers ---- */
function admin_is_logged_in(): bool { return !empty($_SESSION['admin_logged_in']); }

function admin_require_login(): void {
  if (!admin_is_logged_in()) { header('Location: login.php'); exit; }
}

function admin_logout(): void { $_SESSION = []; session_destroy(); }
