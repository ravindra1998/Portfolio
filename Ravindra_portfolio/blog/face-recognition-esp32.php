<?php require __DIR__ . '/../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Face Recognition on Edge Devices Using ESP32 and CNN — <?= e($profile['name']) ?></title>
<meta name="description" content="Building a lightweight Face ID recognition system on the ESP32 with a CNN, deployed on GPX10 at 99% accuracy.">
<link rel="stylesheet" href="../css/style.css?v=24">
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
    <p class="article-meta">Data Science · Edge AI</p>
    <h1>Face Recognition on Edge Devices Using ESP32 and CNN</h1>

    <figure class="article-hero">
      <img src="../images/face-biometric.jpeg" alt="Face Recognition on ESP32">
    </figure>

    <p class="article-intro">In this project, I developed a lightweight Face ID recognition system using an ESP32 camera module and a Convolutional Neural Network (CNN). The goal was to create an efficient embedded AI solution capable of performing real-time face recognition while maintaining high accuracy and low computational requirements. The final model contained approximately <strong>5,000 parameters</strong> and achieved <strong>99% accuracy</strong> when deployed on GPX10 hardware.</p>

    <h2>Challenges During Data Collection</h2>
    <p>I collected the facial image dataset directly through the ESP32 camera module. Capturing data on a low-cost embedded camera came with its own challenges — varying lighting conditions, limited resolution, motion blur, and inconsistent face angles. To build a robust dataset, I captured multiple images per subject across different poses and lighting setups. 
      <em>( Lighting variations, Background noise, Motion blur )</em></p>

    <h2>Data Preprocessing</h2>
    <p>Before training, the raw images were cleaned, resized, and normalized to a consistent input size for the network. I applied data augmentation — small rotations, brightness shifts, and flips — to improve the model's ability to generalize across real-world conditions. 
      <em>( Image Resizing, Normalization, Data Augmentation )</em></p>

    <h2>CNN Model Architecture</h2>
    <p>The model was a compact CNN built with a small stack of convolutional and pooling layers followed by a dense classification head. Keeping the architecture lightweight was essential so the final model would fit within the memory and compute budget of embedded hardware. 
      <em>( Convolutional Layers, Max Pooling Layers, Fully Connected Layers, Softmax Output Layer)</em></p>

    <h2>Why CNN?</h2>
    <p>Convolutional Neural Networks are the natural choice for image tasks because they learn spatial features — edges, textures, and facial structures — automatically, while sharing weights to stay parameter-efficient. This made it possible to reach high accuracy with only ~5K parameters, ideal for edge deployment.</p>

    <h2>Model Training</h2>
    <p>The network was trained on the preprocessed dataset, monitoring training and validation accuracy to avoid overfitting. <em>(optimizer-Adam, loss function -categorical_crossentropy, epochs - 100, and batch size -128.)</em></p>

    <h2>Model Performance</h2>
    <p>After training and evaluation, the model achieved:</p>
    <table class="article-table">
      <thead><tr><th>Metric</th><th>Result</th></tr></thead>
      <tbody>
        <tr><td>Model Size</td><td>~5K Parameters</td></tr>
        <tr><td>Accuracy</td><td>99%</td></tr>
        <tr><td>Deployment Platform</td><td>GPX10</td></tr>
        <tr><td>Inference Type</td><td>Real-Time</td></tr>
      </tbody>
    </table>

    <h2>Applications</h2>
    <p>This kind of on-device face recognition is well suited to biometric authentication, smart door locks and access control, attendance systems, and privacy-friendly applications where data never leaves the device. 
      <em>( Smart Door Locks,  Attendance Management Systems,  Access Control Systems )</em> </p>
    <h2>Key Learnings</h2>
    <ul>
      <li>Careful data collection matters more than model complexity on the edge.</li>
      <li>A small, well-designed CNN can rival larger models for narrow tasks.</li>
      <li>Preprocessing and augmentation are critical when data is limited.</li>
      <li>Hardware constraints shape every design decision in embedded ML.</li>
    </ul>

    <a class="back-link" href="../index.php#blog">← Back to all posts</a>
  </div>
</article>

<?php include __DIR__ . '/../includes/footer.php'; ?>
