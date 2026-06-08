<?php
/* ============================================================
   Admin view of contact submissions.
   Protected by a simple password in the URL: ?key=YOUR_SECRET
   ---> CHANGE the secret below before going live.
   ============================================================ */
require __DIR__ . '/../includes/auth.php';
admin_require_login(); 

// $ADMIN_KEY = 'Ravindra@123';

// if (($_GET['key'] ?? '') !== $ADMIN_KEY) {
//   http_response_code(403);
//   exit('Access denied. Add ?key=YOUR_SECRET to the URL.');
// }

require_once __DIR__ . '/../includes/db.php';
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

$rows = [];
$error = '';
try {
  $rows = get_db()->query("SELECT * FROM contacts ORDER BY created_at DESC")->fetchAll();
} catch (Throwable $e) {
  $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Submissions</title>
<style>
  body{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;background:#f4f7fb;color:#1f2730;margin:0;padding:30px}
  .topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:6px}
  h1{font-size:1.4rem;margin:0}
  .topbar a{color:#1f6fd6;text-decoration:none;font-size:.9rem;font-weight:600}
  .topbar a.logout{background:#1f6fd6;color:#fff;padding:8px 14px;border-radius:8px}
  .count{color:#6b7682;margin-bottom:20px;font-size:.9rem}
  table{width:100%;border-collapse:collapse;background:#fff;box-shadow:0 4px 16px rgba(0,0,0,.06);border-radius:10px;overflow:hidden}
  th,td{padding:11px 13px;border-bottom:1px solid #e3e8ee;text-align:left;font-size:.9rem;vertical-align:top}
  th{background:#1f6fd6;color:#fff;font-weight:600}
  tr:nth-child(even) td{background:#fafbfc}
  td.msg{max-width:340px;white-space:pre-wrap}
  .empty{color:#6b7682;padding:20px 0}
  .err{color:#d6453d}
</style>
</head>
<body>
  <div class="topbar">
    <h1>Contact Submissions</h1>
    <div>
      <a href="../index.php">← Back to site</a>
      &nbsp;&nbsp;
      <a class="logout" href="logout.php">Log out</a>
    </div>
  </div>
  <?php if ($error): ?>
    <p class="err">Database error: <?= h($error) ?></p>
  <?php else: ?>
    <p class="count"><?= count($rows) ?> total</p>
    <?php if (!$rows): ?>
      <p class="empty">No submissions yet.</p>
    <?php else: ?>
      <table>
        <thead><tr>
          <th>#</th><th>Date</th><th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>Message</th><th>IP</th>
        </tr></thead>
        <tbody>
        <?php foreach ($rows as $r): ?>
          <tr>
            <td><?= h($r['id']) ?></td>
            <td><?= h($r['created_at']) ?></td>
            <td><?= h($r['name']) ?></td>
            <td><a href="mailto:<?= h($r['email']) ?>"><?= h($r['email']) ?></a></td>
            <td><?= h($r['phone']) ?></td>
            <td><?= h($r['service_type']) ?></td>
            <td class="msg"><?= h($r['message']) ?></td>
            <td><?= h($r['ip_address']) ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  <?php endif; ?>
</body>
</html>
