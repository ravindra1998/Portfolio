<!-- EXPERIENCE -->
<div class="wrap"><section id="resume" style="border-top:1px solid var(--border)">
  <h2>Experience</h2>
  <p class="lead">A quick career snapshot. <a href="assets/resume.pdf" download>Download full CV →</a></p>
  <div class="timeline">
    <?php foreach ($jobs as $j): ?>
    <div class="job">
      <div class="when"><?= e($j['when']) ?></div>
      <h3><?= e($j['title']) ?> · <span class="co"><?= e($j['co']) ?></span></h3>
      <ul><?php foreach ($j['points'] as $pt): ?><li><?= e($pt) ?></li><?php endforeach; ?></ul>
    </div>
    <?php endforeach; ?>
  </div>
</section></div>

<!-- BLOG -->
<div class="wrap"><section id="blog" style="border-top:1px solid var(--border)">
  <h2>Tech Blog</h2>
  <p class="lead">Insights on engineering, career growth, and data science.</p>
  <div class="grid">
    <?php foreach ($posts as $post): ?>
    <?php $hasLink = !empty($post['url']) && $post['url'] !== '#'; ?>
    <div class="card">
      <div class="when" style="font-size:.85rem"><?= e($post['date'] ?? 'Coming soon') ?></div>
      <h3 style="margin-top:6px"><?= e($post['title']) ?></h3>
      <p><?= e($post['desc']) ?></p>
      <?php if ($hasLink): ?>
      <p style="margin-top:12px"><a href="<?= e($post['url']) ?>">Read →</a></p>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section></div>
