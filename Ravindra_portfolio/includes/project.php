<!-- ABOUT -->
<div class="wrap"><section id="about" style="border-top:1px solid var(--border)">
  <h2>About Me</h2>
  <div class="about-grid">
    <div class="about-text">
      <p class="lead"><?= $profile['about'] ?></p>
    </div>
    <aside class="about-card">
      <h4>Why Clients Choose Me</h4>
      <ul>
        <li>Proven experience developing and deploying AI solutions on embedded hardware.</li>
        <li>Strong expertise in Deep Learning, Computer Vision, Speech Processing, and NLP.</li>
        <li>Focus on lightweight, efficient models optimized for real-time inference.</li>
        <li>Ability to transform raw data into scalable, production-ready AI applications.</li>
        <li>Commitment to delivering measurable results with robust post-deployment support.</li>
      </ul>
    </aside>
  </div>
</section></div>

<!-- PROJECTS -->
<div class="wrap"><section id="projects">
  <h2>Featured Projects</h2>
  <p class="lead">Hands-on projects across multiple data modalities — audio, computer vision, time-series sensor signals, video, and NLP — built from raw data to production-ready models.</p>

  <!-- FEATURED: two-column layout -->
  <div class="feature-grid">

    <!-- LEFT: Fall Detection -->
    <div class="feature-card">
      <h3>Fall Detection System</h3>
      <div class="pills">
        <span class="pill">CNN2D</span><span class="pill">Keras</span><span class="pill">TensorFlow</span>
        <span class="pill">IMU/LSM Sensors</span><span class="pill">Embedded ML</span>
      </div>
      <p>Developed a real-time fall detection system using inertial sensor data collected from IMU and LSM sensors. Sensor data was acquired with accelerometer and gyroscope ranges configured to ±16g and 2000 dps respectively, to capture high-impact fall events accurately.</p>
      <p>The dataset consisted of multiple fall scenarios and normal daily activities. Preprocessing involved cleaning, filtering, and preparing the sensor signals to remove noise and improve data quality, then converting the readings into a format suitable for deep-learning classification.</p>
      <p>A lightweight 2D Convolutional Neural Network (CNN2D) was designed and trained for fall-event recognition. The final model contained roughly 14,000 parameters, making it suitable for deployment on resource-constrained embedded hardware. The trained model was integrated and executed on the target device for real-time on-device inference, achieving an overall classification accuracy of <strong>93%</strong>.</p>

      <div class="highlights">
        <h4>Key Highlights</h4>
        <ul>
          <li>Collected and labeled fall-event data using IMU and LSM sensors.</li>
          <li>Configured sensors at ±16g accelerometer range and 2000 dps gyroscope range.</li>
          <li>Performed data cleaning and preprocessing to improve signal quality.</li>
          <li>Designed a lightweight CNN2D model (~14K parameters) optimized for embedded deployment.</li>
          <li>Implemented on-device inference on hardware for real-time operation.</li>
          <li>Achieved 93% detection accuracy on the evaluation dataset.</li>
          <li>Suitable for wearable health monitoring and elderly-safety applications.</li>
        </ul>
      </div>

      <figure class="feature-img">
        <img src="images/fall-detection.jpeg" alt="Fall Detection System">
        <figcaption>Fall Detection System</figcaption>
      </figure>
    </div>

    <!-- RIGHT: Wake Word Detection -->
    <div class="feature-card">
      <h3>Wake Word Detection System</h3>
      <div class="pills">
        <span class="pill">GRU</span><span class="pill">MFCC</span><span class="pill">I²C Mic</span>
        <span class="pill">ADC Mic</span><span class="pill">Edge AI</span>
      </div>
      <p>Developed a real-time wake word detection system using both I²C digital microphones and ADC-based analog microphones for embedded voice-activation applications. Audio was collected from both interfaces to build a robust dataset of target wake words and non-target speech/background sounds.</p>
      <p>Signals were recorded at an 8 kHz sampling rate, 16-bit resolution, and mono channel to optimize memory and compute for embedded deployment. During preprocessing, Mel-Frequency Cepstral Coefficients (MFCCs) were extracted to capture the most relevant speech characteristics for keyword recognition.</p>
      <p>A lightweight Gated Recurrent Unit (GRU) network was designed and trained on the MFCC features. Separate datasets from the I²C and ADC microphone configurations were used to evaluate robustness across hardware interfaces. The deployed system achieved an overall classification accuracy of <strong>96%</strong>, demonstrating reliable hands-free voice activation for edge AI.</p>

      <div class="highlights">
        <h4>Key Highlights</h4>
        <ul>
          <li>Collected wake word audio data using both I²C and ADC microphones.</li>
          <li>Recorded audio at 8 kHz sampling rate, 16-bit resolution, and mono channel.</li>
          <li>Performed audio preprocessing and feature extraction using MFCCs.</li>
          <li>Designed and trained a lightweight GRU-based network for keyword spotting.</li>
          <li>Evaluated performance across both digital and analog microphone interfaces.</li>
          <li>Deployed the model for real-time embedded inference.</li>
          <li>Achieved 96% wake word detection accuracy.</li>
          <li>Suitable for voice assistants, smart devices, and low-power edge AI systems.</li>
        </ul>
      </div>

      <figure class="feature-img">
        <img src="images/wake-word.png" alt="Wake Word Detection System">
        <figcaption>Wake Word Detection System</figcaption>
      </figure>
    </div>

    <!-- THIRD: Face ID Recognition -->
    <div class="feature-card">
      <h3>Face ID Recognition System</h3>
      <div class="pills">
        <span class="pill">CNN</span><span class="pill">ESP32 Cam</span><span class="pill">Opencv</span>
        <span class="pill">Computer Vision</span><span class="pill">Edge AI</span>
      </div>
      <p>Developed a Face ID Recognition System using image data collected through an ESP32 camera module for embedded biometric authentication. The project involved collecting and labeling facial image datasets, followed by preprocessing and augmentation to improve robustness under varying lighting and pose conditions.</p>
      <p>A lightweight Convolutional Neural Network (CNN) was designed and trained for face identification while maintaining a small memory footprint suitable for edge deployment. The final model contained roughly 5,000 parameters, enabling efficient execution on resource-constrained hardware.</p>
      <p>The trained model was optimized and deployed on the GPX10 AI processor, providing real-time face recognition with high accuracy and low inference latency. The system achieved an overall classification accuracy of <strong>99%</strong>, demonstrating reliable performance for embedded authentication and access-control applications.</p>

      <div class="highlights">
        <h4>Key Highlights</h4>
        <ul>
          <li>Collected facial image data using an ESP32 camera module.</li>
          <li>Performed image preprocessing and dataset preparation.</li>
          <li>Designed a lightweight CNN architecture with ~5K parameters.</li>
          <li>Optimized the model for embedded deployment on GPX10.</li>
          <li>Implemented real-time face identification and recognition.</li>
          <li>Achieved 99% recognition accuracy.</li>
          <li>Suitable for biometric authentication and smart access-control systems.</li>
        </ul>
      </div>

      <figure class="feature-img">
        <img src="images/face-detection.jpeg" alt="Face ID Recognition System">
        <figcaption>Face ID Recognition System</figcaption>
      </figure>
    </div>

  </div>

  <h3 class="more-title">More Projects</h3>
  <div class="grid">
    <?php foreach ($projects as $p): ?>
    <div class="card">
      <h3><?= e($p['title']) ?></h3>
      <div class="pills"><?php foreach ($p['tech'] as $t): ?><span class="pill"><?= e($t) ?></span><?php endforeach; ?></div>
      <p><?= e($p['desc']) ?></p>
      <div class="result">↳ <?= e($p['result']) ?></div>
      <p style="margin-top:12px"><a href="<?= e($p['github']) ?>">GitHub →</a> · <a href="<?= e($p['writeup']) ?>">Write-up →</a></p>
    </div>
    <?php endforeach; ?>
  </div>
</section></div>
