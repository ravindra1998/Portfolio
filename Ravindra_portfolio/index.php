<?php
/* ============================================================
   index.php — the entry point. Pulls data, runs the contact
   handler, then includes each section partial in order.
   ============================================================ */
require __DIR__ . '/includes/config.php';     // data + e() helper
require __DIR__ . '/includes/contact.php';    // form logic (must run before output)

include __DIR__ . '/includes/header.php';     // <head>, nav, hero
include __DIR__ . '/includes/project.php';    // projects + about
include __DIR__ . '/includes/experience.php';   // experience + blog
include __DIR__ . '/includes/certificates.php';  // certificates
render_contact($profile, $formMsg);             // contact section
include __DIR__ . '/includes/footer.php';     // footer + scripts
