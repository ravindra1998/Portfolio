<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($profile['name']) ?> — Data Scientist</title>
<meta name="description" content="Data Scientist with 3+ years of experience in machine learning and analytics.">
<link rel="stylesheet" href="css/style.css?v=22">
</head>
<body>
<header>
  <div class="wrap"><nav>
    <div class="brand">Ravindra<span>&nbsp;Singh</span></div>
    <div class="navlinks" id="nav">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#projects">Project</a>
      <a href="#certificates">Certificates</a>
      <a href="<?= e($profile['github']) ?>" target="_blank" rel="noopener">GitHub</a>
      <a href="<?= e($profile['linkedin']) ?>" target="_blank" rel="noopener">LinkedIn</a>
      <a href="assets/resume.pdf" download>Resume</a>
      <a href="#blog">Blog</a>
      <a href="#contact">Contact</a>
      <a href="admin/login.php" class="nav-admin">Admin</a>
    </div>
    <button class="menu-btn" onclick="document.getElementById('nav').classList.toggle('open')">☰</button>
  </nav></div>
</header>


<!-- HERO -->
<div class="wrap"><section class="hero" id="home">
  <div>
    <div class="tag"><?= e($profile['role']) ?></div>
    <h1><?= e($profile['tagline']) ?></h1>
    <p><?= e($profile['intro']) ?></p>
    <div class="cta">
      <a class="btn primary" href="#projects">View my work</a>
      <a class="btn ghost" href="assets/resume.pdf" download>Download CV</a>
    </div>
    <div class="skills">
      <?php foreach ($skills as $s): ?><span class="chip"><?= e($s) ?></span><?php endforeach; ?>
    </div>
  </div>
  <div class="avatar">
    <?php if (!empty($profile['photo']) && file_exists(__DIR__ . '/../' . $profile['photo'])): ?>
      <img src="<?= e($profile['photo']) ?>" alt="<?= e($profile['name']) ?>">
    <?php else: ?>
      <?= e($profile['initials']) ?>
    <?php endif; ?>
  </div>
</section></div>
