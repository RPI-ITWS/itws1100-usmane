CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(30) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE `reviews` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `type` ENUM('movie', 'book') NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `author` VARCHAR(100),
  `plot_rating` TINYINT NOT NULL,
  `characters_rating` TINYINT NOT NULL,
  `cinematography_rating` TINYINT,
  `acting_rating` TINYINT,
  `overall_rating` TINYINT NOT NULL,
  `body` VARCHAR(500) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
);
