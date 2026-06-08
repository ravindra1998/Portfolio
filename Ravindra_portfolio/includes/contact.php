<?php
/* Contact form handler — included before output by index.php */
$formMsg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact'])) {
  $name    = trim($_POST['name']    ?? '');
  $from    = trim($_POST['email']   ?? '');
  $phone   = trim($_POST['phone']   ?? '');
  $service = trim($_POST['service_type'] ?? '');
  $message = trim($_POST['message'] ?? '');

  if ($name === '' || $message === '' || $service === '' || $phone === '' || !filter_var($from, FILTER_VALIDATE_EMAIL)) {
    $formMsg = '<p class="form-msg err">Please fill in all fields with a valid email.</p>';
  } else {
    $saved = false;

    // 1) Save the submission to the database
    try {
      require_once __DIR__ . '/db.php';
      $stmt = get_db()->prepare(
        "INSERT INTO contacts (name, email, phone, service_type, message, ip_address)
         VALUES (:name, :email, :phone, :service, :message, :ip)"
      );
      $stmt->execute([
        ':name'    => $name,
        ':email'   => $from,
        ':phone'   => $phone,
        ':service' => $service,
        ':message' => $message,
        ':ip'      => $_SERVER['REMOTE_ADDR'] ?? null,
      ]);
      $saved = true;
    } catch (Throwable $e) {
      // Don't expose DB errors to visitors; log them for yourself.
      error_log('Contact save failed: ' . $e->getMessage());
    }

    // 2) Also try to email you a copy (optional — ignored if mail isn't set up)
    $safeFrom  = preg_replace('/[\r\n]+/', ' ', $from);
    $safePhone = preg_replace('/[\r\n]+/', ' ', $phone);
    $subject   = 'Portfolio inquiry from ' . $name;
    $body      = "Name: {$name}\nEmail: {$safeFrom}\nPhone: {$safePhone}\nService: {$service}\n\n{$message}";
    $headers   = "From: website@" . ($_SERVER['HTTP_HOST'] ?? 'localhost') . "\r\nReply-To: {$safeFrom}";
    @mail($profile['email'], $subject, $body, $headers);

    if ($saved) {
      $formMsg = '<p class="form-msg ok">Thanks! Your message has been received.</p>';
    } else {
      $formMsg = '<p class="form-msg err">Sorry, something went wrong saving your message. Please email me directly.</p>';
    }
  }
}

/* Render the section */
function render_contact($profile, $formMsg) { ?>
<div class="wrap"><section id="contact">
  <h2 style="text-align:center">Contact Us</h2>
  <p class="lead" style="text-align:center">Let's discuss your training goals, product ideas, or hiring needs.</p>
  <?= $formMsg ?>

  <div class="contact-grid">
    <!-- LEFT: inquiry form -->
    <div class="glass-card">
      <h4>Send an Inquiry</h4>
      <form method="post" action="#contact" class="form-grid">
        <div class="fg-col">
          <label>Name</label>
          <input type="text" name="name" required>
        </div>
        <div class="fg-col">
          <label>Email</label>
          <input type="email" name="email" required>
        </div>
        <div class="fg-col">
          <label>Phone</label>
          <input type="tel" name="phone" pattern="[0-9+\-\s]{8,15}" required>
        </div>
        <div class="fg-col">
          <label>Service</label>
          <select name="service_type" required>
            <option value="">Select</option>
            <option value="Training">Training</option>
            <option value="Development">Development</option>
            <option value="Recruitment">Freelancer</option>
          </select>
        </div>
        <div class="fg-full">
          <label>Message</label>
          <textarea name="message" rows="4" required></textarea>
        </div>
        <div class="fg-full">
          <button class="btn primary" type="submit" name="contact" value="1">Send Message</button>
        </div>
      </form>
    </div>

    <!-- RIGHT: office details -->
    <div class="glass-card">
      <h4>Office Details</h4>
      <p><strong>Address:</strong> <?= e($profile['address']) ?></p>
      <p><strong>Phone:</strong> <?= e($profile['phone']) ?></p>
      <p><strong>Email:</strong> <a href="mailto:<?= e($profile['email']) ?>"><?= e($profile['email']) ?></a></p>

      <!-- <div class="office-socials">
        <a href="<?= e($profile['linkedin']) ?>" target="_blank" rel="noopener">LinkedIn</a> ·
        <a href="<?= e($profile['github']) ?>" target="_blank" rel="noopener">GitHub</a>
      </div> -->
    </div>
  </div>
</section></div>
<?php }
