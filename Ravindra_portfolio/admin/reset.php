<?php
require __DIR__ . '/../includes/auth.php';
admin_ensure_setup();

$token = $_GET['token'] ?? ($_POST['token'] ?? '');
$email = $token ? admin_email_for_token($token) : null;
$msg = ''; $isError = false; $done = false;

if (!$email) {
  $isError = true;
  $msg = 'This reset link is invalid or has expired. Please request a new one.';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $p1 = $_POST['password'] ?? '';
  $p2 = $_POST['password2'] ?? '';
  if (strlen($p1) < 6) {
    $isError = true; $msg = 'Password must be at least 6 characters.';
  } elseif ($p1 !== $p2) {
    $isError = true; $msg = 'The two passwords do not match.';
  } else {
    admin_set_password($email, $p1);
    admin_consume_token($token);
    $done = true;
    $msg = 'Your password has been updated. You can now log in.';
  }
}

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<style>
  body{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;
    background:#0f1419;display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0}
  .box{background:#fff;border-radius:16px;padding:38px 34px;width:360px;box-shadow:0 12px 40px rgba(0,0,0,.3)}
  .box h1{font-size:1.3rem;color:#1f2730;margin:0 0 4px}
  .box p.sub{color:#6b7682;font-size:.9rem;margin:0 0 22px}
  .box label{display:block;font-size:.85rem;font-weight:600;color:#1f2730;margin-bottom:6px}
  .box input{width:100%;padding:11px 13px;border:1px solid #d4dae1;border-radius:9px;
    background:#f7f9fc;font-size:.95rem;margin-bottom:16px;box-sizing:border-box}
  .box button{width:100%;padding:12px;border:0;border-radius:9px;background:#1f6fd6;color:#fff;
    font-weight:700;font-size:.95rem;cursor:pointer}
  .box button:hover{background:#1a5fb8}
  .note{padding:12px;border-radius:8px;font-size:.88rem;margin-bottom:16px}
  .note.ok{background:#e7f6ef;color:#0a8f6a}
  .note.err{background:#fde8e7;color:#d6453d}
  .back{display:block;text-align:center;margin-top:10px;color:#1f6fd6;font-size:.85rem;text-decoration:none}
</style>
</head>
<body>
  <div class="box">
    <h1>Reset Password</h1>
    <?php if ($email && !$done): ?><p class="sub">Set a new password for <?= h($email) ?>.</p><?php endif; ?>

    <?php if ($msg): ?>
      <div class="note <?= $isError ? 'err' : 'ok' ?>"><?= h($msg) ?></div>
    <?php endif; ?>

    <?php if ($email && !$done): ?>
    <form method="post" action="reset.php">
      <input type="hidden" name="token" value="<?= h($token) ?>">
      <label>New password</label>
      <input type="password" name="password" required autofocus>
      <label>Confirm new password</label>
      <input type="password" name="password2" required>
      <button type="submit">Update password</button>
    </form>
    <?php endif; ?>

    <a class="back" href="login.php">← Back to login</a>
  </div>
</body>
</html>
