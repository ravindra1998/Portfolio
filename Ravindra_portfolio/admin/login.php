<?php
require __DIR__ . '/../includes/auth.php';
admin_ensure_setup();   // creates tables + seeds admin on first run

// Already logged in? Go straight to submissions.
if (admin_is_logged_in()) { header('Location: submissions.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $pass  = $_POST['password'] ?? '';
  if (admin_check_login($email, $pass)) {
    session_regenerate_id(true);
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_email'] = strtolower(trim($email));
    header('Location: submissions.php');
    exit;
  }
  $error = 'Invalid email or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<style>
  body{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;
    background:#e3e8ee;
    display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0}
  /* .login{border:1px solid #e3e8ee} */
  .login{background:#fff;border-radius:16px;padding:38px 34px;width:340px;box-shadow:0 12px 40px rgba(0,0,0,.3)}
  .login h1{font-size:1.3rem;color:#1f2730;margin:0 0 4px}
  .login p{color:#6b7682;font-size:.9rem;margin:0 0 22px}
  .login label{display:block;font-size:.85rem;font-weight:600;color:#1f2730;margin-bottom:6px}
  .login input{width:100%;padding:11px 13px;border:1px solid #d4dae1;border-radius:9px;
    background:#f7f9fc;font-size:.95rem;margin-bottom:16px;box-sizing:border-box}
  .login button{width:100%;padding:12px;border:0;border-radius:9px;background:#1f6fd6;color:#fff;
    font-weight:700;font-size:.95rem;cursor:pointer}
  .login button:hover{background:#1a5fb8}
  .err{background:#fde8e7;color:#d6453d;padding:10px 12px;border-radius:8px;font-size:.88rem;margin-bottom:16px}
  .back{display:block;text-align:center;margin-top:16px;color:#1f6fd6;font-size:.85rem;text-decoration:none}
</style>
</head>
<body>
  <form class="login" method="post" action="login.php">
    <h1>Admin Login</h1>
    <p>Sign in to view contact submissions.</p>
    <?php if ($error): ?><div class="err"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <label>Email</label>
    <input type="email" name="email" required autofocus>
    <label>Password</label>
    <input type="password" name="password" required>
    <button type="submit">Log In</button>
    <a class="back" href="forgot.php">Forgot password?</a>
    <a class="back" href="../index.php">← Back to site</a>
  </form>
</body>
</html>
