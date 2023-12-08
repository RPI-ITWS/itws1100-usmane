/*
    I need to create the following tables...
        •	create a table named ‘myLabs’
        •	create a table named ‘myProjects’
        •	create a table named ‘myFooter’
        •	create a table named ‘mySiteUsers’
*/


CREATE TABLE myLabs (
    lab_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    lab_name VARCHAR(255) NOT NULL,
    lab_description TEXT
);

CREATE TABLE myProjects (  
    project_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    project_description TEXT
);

CREATE TABLE myFooter (
    footer_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    footer_content TEXT
);

CREATE TABLE mySiteUsers (
    user_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    name VARCHAR(100),
    password VARCHAR(255) NOT NULL
);
