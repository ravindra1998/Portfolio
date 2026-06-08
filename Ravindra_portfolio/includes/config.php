<?php
/* ============================================================
   Site data + helpers — edit everything here.
   ============================================================ */

$profile = [
  'name'     => 'Ravindra Singh',
  'role'     => 'Data Scientist · 3+ Years',
  'tagline'  => 'Build accurate and scalable AI models for real-world use.',
  'intro'    => "I'm Ravindra Singh, a Data Scientist specializing in Machine Learning, Deep Learning, Embedded AI, Computer Vision, Speech Processing, LLM, and NLP, building AI solutions from data to deployment.",
  // NOTE: this field allows HTML (e.g. <strong>) — it is printed unescaped.
  'about'    => "I'm a <strong>data scientist</strong> with a passion for building models. I believe data is the most powerful tool we have for understanding the world and making better decisions. My core skills span <strong>data analysis</strong>, <strong>data visualization</strong>, <strong>machine learning</strong>, and <strong>deep learning</strong>.<br><br>I often work on <strong>end-to-end data science projects</strong> — everything from collecting and cleaning the data to building, validating, and deploying the final model. You can take a look at some of my projects and articles in the sections below; I link each one to its GitHub repository, so feel free to download my code and play around with it. Most of my learning has come from <strong>online platforms</strong>, and I'm always picking up something new.",
  'email'    => 'ravindradeeg95@gmail.com',
  'phone'    => '+91 7568565831',
  'address'  => 'Remote',
  'linkedin' => 'https://www.linkedin.com/in/ravindra-singh-72136719b/',
  'github'   => 'https://github.com/ravindra1998',
  'initials' => 'RS',
  'photo'    => 'images/photo.png',   // drop a square headshot at images/photo.jpg
];

$skills = ['Python','Machine Learning','Deep Learning','scikit-learn','PyTorch','Pandas','NLP','LLM','Generative AI'];

$projects = [
  [
    'title'=>'Command Word Detection','tech'=>['CNN','keras','tensorflow'],
    'desc'=>'Developed an GPX-10 command word detection system using MFCC-based audio features, trained a lightweight deep learning model for voice command recognition, deployed real-time inference on hardware.',
    'result'=>'Achieved 97% command recognition accuracy with real-time on-device inference.','github'=>'#','writeup'=>'#',
  ],
  [
    'title'=>'Small Language Model','tech'=>['Transformer','Tokenization','NLP'],
    'desc'=>'Designed and deployed a decoder-based healthcare chatbot on GPX10 using a compact SLM (<100K parameters), enabling efficient edge-AI conversational assistance with 89% accuracy and low-resource operation.',
    'result'=>'Achieved 89% accuracy','github'=>'#','writeup'=>'#',
  ],
  [
    'title'=>'Melbourne House Price Prediction','tech'=>['Regression','ML','pandas'],
    'desc'=>'Developed a house price prediction model using regression techniques on the Melbourne Housing Dataset, performing data preprocessing, feature engineering, and model evaluation to generate accurate property price estimates.',
    'result'=>'98% accuracy · correct house price prediction','github'=>'#','writeup'=>'#',
  ],

  [
    'title'=>'Face mask Recognition','tech'=>['CNN','OpenCV','Computer vision'],
    'desc'=>'Developed a face mask detection system using a CNN model to classify masked and unmasked individuals, enabling real-time inference on embedded hardware.',
    'result'=>'Achivwd 96% accuracy','github'=>'#','writeup'=>'#',
  ],
];

$jobs = [
  ['when'=>'2023 — Present','title'=>'Data Scientist','co'=>'Ambient Scientific','points' => [
    'Developed and deployed a CNN2D-based fall detection system using IMU and LSM sensor data, achieving 93% accuracy with real-time on-device inference.',
    'Built wake word and command word detection systems using I²C and ADC microphones, MFCC feature extraction, and GRU-based neural networks, achieving up to 97% accuracy.',
    'Designed and optimized a decoder-only Small Language Model (SLM) healthcare chatbot (<100K parameters) for GPX10 deployment, achieving 89% accuracy with embedded inference.',
    'Developed a machine learning-based Melbourne house price prediction system using regression techniques, including data preprocessing, feature engineering, and model evaluation.',
  ]],
  ['when'=>'2022 — 2023','title'=>'Data Scientist','co'=>'Neelavath Software Solution','points'=>[
    'Developed predictive models and A/B test frameworks for growth.',
    'Developed a deep learning based face-mask detection model.',
  ]],
  // ['when'=>'2022 — 2023','title'=>'Data Analyst','co'=>'Company A','points'=>[
  //   'Built dashboards and SQL pipelines supporting product decisions.',
  // ]],
];

$certificates = [
  ['title'=>'Internshala Certified Machine Learning – Specialty','issuer'=>'Internshala','year'=>'2021','url'=>'#'],
  ['title'=>'Deep Learning Specialization','issuer'=>'Udemy','year'=>'2023','url'=>'#'],
  ['title'=>'Python Developer Certificate','issuer'=>'Udemy','year'=>'2022','url'=>'#'],
  ['title'=>'Cyber Security and Data Science','issuer'=>'CMR University','year'=>'2021','url'=>'#'],
];

$posts = [
  [
    'title'=>'Face Recognition on Edge Devices Using ESP32 and CNN',
    'desc'=>'Building a lightweight Face ID system on the ESP32 with a ~5K-parameter CNN, deployed at 99% accuracy.',
    'date'=>'June 2026',
    'url'=>'blog/face-recognition-esp32.php',
  ],

  [
    'title'=>'Small Language Models for Edge Devices',
    'desc'=>'A decoder-only SLM under 100K parameters for on-device healthcare conversation, running at 89% accuracy.',
    'date'=>'March 2026',
    'url'=>'blog/small-language-models.php',
  ],

  // Add future posts here. Leave 'url' as '#' to show "Coming soon".
  ['title'=>'Wake Word Detection with GRU and MFCCs','desc'=>'Real-time keyword spotting across I²C and ADC microphones for embedded voice activation.','date'=>'Coming soon','url'=>'#'],
  ['title'=>'Fall Detection on Embedded Hardware','desc'=>'A ~14K-parameter CNN2D for real-time fall detection from IMU sensor data.','date'=>'Coming soon','url'=>'#'],
];

/* Escape helper */
function e($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }