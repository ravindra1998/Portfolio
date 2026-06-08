<?php require __DIR__ . '/../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Small Language Models for Edge Devices — <?= e($profile['name']) ?></title>
<meta name="description" content="Building a domain-specific Small Language Model (SLM) under 100K parameters for on-device healthcare conversation on GPX10.">
<link rel="stylesheet" href="../css/style.css?v=25">
</head>
<body>
<header>
  <div class="wrap"><nav>
    <div class="brand">Ravindra<span>&nbsp;Singh</span></div>
    <div class="navlinks" id="nav">
      <a href="../index.php#home">Home</a>
      <a href="../index.php#about">About</a>
      <a href="../index.php#projects">Project</a>
      <a href="../index.php#certificates">Certificates</a>
      <a href="<?= e($profile['github']) ?>" target="_blank" rel="noopener">GitHub</a>
      <a href="<?= e($profile['linkedin']) ?>" target="_blank" rel="noopener">LinkedIn</a>
      <a href="../assets/resume.pdf" download>Resume</a>
      <a href="../index.php#blog">Blog</a>
      <a href="../index.php#contact">Contact</a>
    </div>
    <button class="menu-btn" onclick="document.getElementById('nav').classList.toggle('open')">☰</button>
  </nav></div>
</header>

<article class="article">
  <div class="article-wrap">
    <a class="back-link" href="../index.php#blog">← Back to all posts</a>
    <p class="article-meta">NLP · Edge AI</p>
    <h1>Small Language Models: Bringing Conversational AI to Edge Devices</h1>

    <figure class="article-hero">
      <img src="../images/SLM.jpeg" alt="Small Language Model on Edge Devices">
    </figure>

    <p class="article-intro">Large language models have transformed natural language processing, but their size makes them impractical for embedded systems. In this project, I built a <strong>Small Language Model (SLM)</strong> with fewer than <strong>100,000 parameters</strong> for on-device healthcare conversation, achieving <strong>89% accuracy</strong> on the GPX10 platform with real-time, fully on-device inference.</p>

    <h2>What Are Small Language Models?</h2>
    <p>Small Language Models are compact neural networks that perform language tasks — text generation, classification, and conversation — using a tiny fraction of the parameters found in large models like GPT. Instead of billions of parameters, an SLM might use thousands. By narrowing the scope to a specific domain, an SLM can deliver strong, useful performance while running entirely on resource-constrained hardware. This makes them ideal for edge AI, where memory, compute, and power are limited and data privacy matters.</p>

    <h2>Data Preparation and Training</h2>
    <h3 class="article-sub">Data Collection</h3>
    <p>Healthcare-related conversational data was collected and organized into structured training samples representing realistic question-and-response exchanges.</p>

    <h3 class="article-sub">Tokenization</h3>
    <p>The raw text was converted into token representations suitable for language model training, mapping words and sub-words to numerical IDs the model can process.</p>

    <h3 class="article-sub">Data Preprocessing</h3>
    <p>Several preprocessing steps were performed to prepare a clean, consistent dataset:</p>
    <ul>
      <li>Text cleaning</li>
      <li>Normalization</li>
      <li>Dataset formatting</li>
      <li>Vocabulary creation</li>
    </ul>

    <h2>Model Architecture</h2>
    <h3 class="article-sub">Decoder-Only Small Language Model</h3>
    <p>The model used a decoder-only architecture — the same family of design behind modern generative language models — but intentionally kept lightweight. This balance preserved useful conversational capabilities while keeping the parameter count low enough for embedded deployment.</p>

    <h2>Training</h2>
    <p>The model was trained on the next-token prediction objective: given a sequence of tokens, predict the most likely next token. Repeated across the dataset, this enables the model to generate coherent conversational responses one token at a time.</p>

    <h2>Results</h2>
    <table class="article-table">
      <thead><tr><th>Metric</th><th>Result</th></tr></thead>
      <tbody>
        <tr><td>Architecture</td><td>Decoder-Only SLM</td></tr>
        <tr><td>Parameters</td><td>&lt; 100K</td></tr>
        <tr><td>Platform</td><td>GPX10</td></tr>
        <tr><td>Accuracy</td><td>89%</td></tr>
        <tr><td>Inference</td><td>On-Device</td></tr>
      </tbody>
    </table>

    <h2>Model Characteristics</h2>
    <ul>
      <li>Less than 100,000 parameters</li>
      <li>Optimized for embedded deployment</li>
      <li>Low memory footprint</li>
      <li>Real-time inference capability</li>
    </ul>

    <h2>Key Takeaways</h2>
    <ul>
      <li>Large language models are powerful but often unsuitable for embedded systems.</li>
      <li>Small Language Models enable practical NLP applications on edge devices.</li>
      <li>SLMs offer faster inference, lower power consumption, and improved privacy.</li>
      <li>Domain-specific SLMs can achieve strong performance with a fraction of the parameters.</li>
      <li>Edge AI represents a major opportunity for efficient language models.</li>
    </ul>

    <a class="back-link" href="../index.php#blog">← Back to all posts</a>
  </div>
</article>

<?php include __DIR__ . '/../includes/footer.php'; ?>
