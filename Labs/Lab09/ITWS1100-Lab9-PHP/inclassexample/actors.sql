-- create the tables for our movies
CREATE TABLE `actors` (
   `actorid` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `firstNames` varchar(100) NOT NULL,
   `lastName` varchar(100) NOT NULL,
   `dob` DATE,
   PRIMARY KEY (`actorid`)
);
-- insert data into the tables
INSERT INTO movies
VALUES 
   (1, "Meryl", "Streep", "1949-06-22"),
   (2, "Robert", "De Niro", "1943-08-17"),
   (3, "Al", "Pacino", "1940-04-25"),
   (4, "Jack", "Nicholson", "1937-04-22"),
   (5, "Morgan", "Freeman", "1937-06-01");