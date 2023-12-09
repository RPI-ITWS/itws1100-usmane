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
    lab_description TEXT,
    lab_link VARCHAR(255)
);

CREATE TABLE myProjects (  
    project_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    project_description TEXT
);

CREATE TABLE myFooter (
    footer_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    footer_name VARCHAR(255),
    email VARCHAR(255),
    phoneNumber VARCHAR(255),
    LinkedinLink VARCHAR(255),
    GithubLink VARCHAR(255)
);

CREATE TABLE mySiteUsers (
    user_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    name VARCHAR(100),
    password VARCHAR(255) NOT NULL,
    type VARCHAR(100)
);


INSERT INTO myLabs (lab_name, lab_description, lab_link)
VALUES 
    ('Digital Resume', 'I practiced HTML/CSS in class by developing a digital resume. Below you will find a link to the resume with details about me.', '../Labs/Lab02/ITWS1100-Lab02-HTML/Usmane-EmmanuelUsman-resume.html'),
    ('RSS FEED', 'I tried to develop an RSS feed using XML', '../Labs/Lab04XML/ITWS1100-Lab4-RSS&Atom/ITWS1100-Lab4-RSS&Atom/Intro ITWS - Lab 4 - RSS&Atom - TemplateRSS.xml'),
    ('ATOM FEED', 'I tried to develop an ATOM feed using XML', '../Labs/Lab04XML/ITWS1100-Lab4-RSS&Atom/ITWS1100-Lab4-RSS&Atom/Intro ITWS - Lab 4 - RSS&Atom - TemplateATOM.xml'),
    ('Javascript/HTML form', 'I made a form with JavaScript events', '../Labs/Lab05/lab5.html'),
    ('Jquery', 'I did lab06', '../Labs/Lab06/ITWS1100-lab6-jQuery/lab6.html'),
    ('Lab08 JSON/Ajax', 'this is where I displayed my labs using JSON and JS', '../Labs/Lab08/ITWS1100-Lab8-JSONAJAX/lab08.html'),
    ('Lab09', 'movies...', '../Labs/Lab09/ITWS1100-Lab9-PHP/inclassexample/index.php'),
    ('Lab10', 'movies also...', '../Labs/Lab10/lab10.html');

INSERT INTO myFooter (footer_name, email, phoneNumber, LinkedinLink, GithubLink)
VALUES
    ('Emmanuel Usman', 'mailto:Emmanuelusman2004@gmail.com','+1 (929) 434-8166', 'https://www.linkedin.com/in/Emmanuelusman2004', 'https://github.com/Emmanuelusman2004');