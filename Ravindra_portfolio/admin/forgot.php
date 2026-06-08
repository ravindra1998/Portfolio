<?php
require __DIR__ . '/../includes/auth.php';
admin_ensure_setup();

$msg = ''; $link = ''; $isError = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $token = admin_create_reset_token($email);

  if ($token) {
    // Build the absolute reset link
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $base   = $scheme . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . dirname($_SERVER['PHP_SELF']);
    $link   = $base . '/reset.php?token=' . $token;

    // Try to email it (works only if the server has mail configured)
    $subject = 'Password reset link';
    $body    = "Use this link to reset your admin password (valid for 1 hour):\n\n{$link}";
    @mail($email, $subject, $body, "From: no-reply@" . ($_SERVER['HTTP_HOST'] ?? 'localhost'));

    $msg = 'A reset link has been generated (valid for 1 hour). If email is configured it was sent to your inbox. You can also use the link below directly:';
  } else {
    $isError = true;
    $msg = 'That email is not registered as an admin account.';
  }
}

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<style>
  body{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;
    background:#0f1419;display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0}
  .box{background:#fff;border-radius:16px;padding:38px 34px;width:380px;box-shadow:0 12px 40px rgba(0,0,0,.3)}
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
  .linkbox{word-break:break-all;background:#f4f7fb;border:1px dashed #b9c6d6;padding:10px;border-radius:8px;
    font-size:.85rem;margin-bottom:16px}
  .linkbox a{color:#1f6fd6}
  .back{display:block;text-align:center;margin-top:10px;color:#1f6fd6;font-size:.85rem;text-decoration:none}
</style>
</head>
<body>
  <div class="box">
    <h1>Forgot Password</h1>
    <p class="sub">Enter your admin email to get a reset link.</p>

    <?php if ($msg): ?>
      <div class="note <?= $isError ? 'err' : 'ok' ?>"><?= h($msg) ?></div>
    <?php endif; ?>
    <?php if ($link): ?>
      <div class="linkbox"><a href="<?= h($link) ?>"><?= h($link) ?></a></div>
    <?php endif; ?>

    <?php if (!$link): ?>
    <form method="post" action="forgot.php">
      <label>Email</label>
      <input type="email" name="email" required autofocus>
      <button type="submit">Send reset link</button>
    </form>
    <?php endif; ?>

    <a class="back" href="login.php">← Back to login</a>
  </div>
</body>
</html>
