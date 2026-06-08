<?php
require __DIR__ . '/../includes/auth.php';
admin_logout();
header('Location: login.php');
exit;
