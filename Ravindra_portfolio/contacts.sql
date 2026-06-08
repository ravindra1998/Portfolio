-- ============================================================
--  Contact submissions table
--  How to use:
--   1. In phpMyAdmin, create (or open) your database, e.g. "portfolio".
--   2. Open the "SQL" tab and paste this whole file, then click "Go".
--   3. Update includes/db.php with your DB name / user / password.
-- ============================================================

CREATE TABLE IF NOT EXISTS `contacts` (
  `id`           INT AUTO_INCREMENT PRIMARY KEY,
  `name`         VARCHAR(120)  NOT NULL,
  `email`        VARCHAR(180)  NOT NULL,
  `phone`        VARCHAR(40)   DEFAULT NULL,
  `service_type` VARCHAR(60)   DEFAULT NULL,
  `message`      TEXT          NOT NULL,
  `ip_address`   VARCHAR(45)   DEFAULT NULL,
  `created_at`   TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
