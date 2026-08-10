-- GeekSmart Appliance - Database Schema
-- Import this file into the `geeksmartllcappli` database via phpMyAdmin

CREATE DATABASE IF NOT EXISTS `geeksmartllcappli`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `geeksmartllcappli`;

-- ---------------------------------------------------------------------------
-- Admin users (login)
-- Default credentials: username = admin / password = Admin@123
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_admin_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admin_users` (`username`, `password_hash`)
VALUES (
  'admin',
  '$2y$10$6JlaJE5lmJmtt7Vqy6pSQeWct2xgxvijepW63t6rWWc77klSYKn5O'
)
ON DUPLICATE KEY UPDATE `username` = `username`;

-- ---------------------------------------------------------------------------
-- All form submissions (single table, filter by form_type)
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `form_submissions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` VARCHAR(50) NOT NULL,
  `form_type` VARCHAR(50) NOT NULL,
  `name` VARCHAR(150) DEFAULT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `email` VARCHAR(150) DEFAULT NULL,
  `service` VARCHAR(200) DEFAULT NULL,
  `message` TEXT DEFAULT NULL,
  `preferred_date` DATE DEFAULT NULL,
  `preferred_time` VARCHAR(50) DEFAULT NULL,
  `printer_model` VARCHAR(150) DEFAULT NULL,
  `issue_type` VARCHAR(150) DEFAULT NULL,
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `is_viewed` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_ticket_id` (`ticket_id`),
  KEY `idx_form_type` (`form_type`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- Recycle bin — soft-deleted leads moved here on Remove
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `recycled_leads` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `original_id` INT UNSIGNED DEFAULT NULL,
  `ticket_id` VARCHAR(50) NOT NULL,
  `form_type` VARCHAR(50) NOT NULL,
  `name` VARCHAR(150) DEFAULT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `email` VARCHAR(150) DEFAULT NULL,
  `service` VARCHAR(200) DEFAULT NULL,
  `message` TEXT DEFAULT NULL,
  `preferred_date` DATE DEFAULT NULL,
  `preferred_time` VARCHAR(50) DEFAULT NULL,
  `printer_model` VARCHAR(150) DEFAULT NULL,
  `issue_type` VARCHAR(150) DEFAULT NULL,
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `is_viewed` TINYINT(1) NOT NULL DEFAULT 0,
  `submitted_at` DATETIME DEFAULT NULL,
  `deleted_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_by` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_deleted_at` (`deleted_at`),
  KEY `idx_ticket_id` (`ticket_id`),
  KEY `idx_form_type` (`form_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
