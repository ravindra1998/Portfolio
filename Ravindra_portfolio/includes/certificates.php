<!-- CERTIFICATES -->
<div class="wrap"><section id="certificates" style="border-top:1px solid var(--border)">
  <h2>Certificates</h2>
  <p class="lead">Credentials and continuing education.</p>
  <div class="grid">
    <?php foreach ($certificates as $c): ?>
    <div class="card">
      <div class="when" style="color:var(--muted);font-size:.85rem"><?= e($c['year']) ?></div>
      <h3 style="margin-top:6px"><?= e($c['title']) ?></h3>
      <p><?= e($c['issuer']) ?></p>
      <?php if (!empty($c['url']) && $c['url'] !== '#'): ?>
      <p style="margin-top:12px"><a href="<?= e($c['url']) ?>" target="_blank" rel="noopener">View credential →</a></p>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section></div>
