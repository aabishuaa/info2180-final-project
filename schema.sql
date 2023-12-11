DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;

USE dolphin_crm;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Contacts Table
CREATE TABLE contacts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  telephone VARCHAR(12) NOT NULL,
  company VARCHAR(255) NOT NULL,
  type VARCHAR(100) NOT NULL,
  assigned_to INT NOT NULL,
  created_by INT NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Notes Table
CREATE TABLE notes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  contact_id INT NOT NULL,
  comment TEXT NOT NULL,
  created_by INT NOT NULL,
  created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Users Table
CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  role VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert Admin User
INSERT INTO users (firstname, lastname, password, email, role, created_at)
VALUES ('Admin', 'Profile', '$2y$10$SEOW9iuoCes.7PNkbB5ScuD.zNw2MbTW40gZ5eyWJlsNDonOwUu7u', 'admin@project2.com', 'Admin', '2023-12-01 01:00:30');

-- Indexes
ALTER TABLE contacts ADD INDEX (assigned_to);
ALTER TABLE notes ADD INDEX (contact_id);
ALTER TABLE notes ADD INDEX (created_by);

-- Commit Transaction
COMMIT;
