CREATE TABLE `events` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `description` TEXT,
  `date` DATE,
  `location` VARCHAR(255)
);

CREATE TABLE `registrations` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT,
  `name` VARCHAR(255),
  `email` VARCHAR(255),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`)
);