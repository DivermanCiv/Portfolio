# script créé le : Fri Feb 14 14:00:42 CET 2020 ;

DROP DATABASE if EXISTS `portfolio`;
CREATE DATABASE `portfolio`;
use  portfolio;


DROP TABLE IF EXISTS admin ;

CREATE TABLE admin (ID_admin int AUTO_INCREMENT NOT NULL,
admin_username VARCHAR(255),
admin_password VARCHAR(255),
admin_mail VARCHAR(255),
PRIMARY KEY (ID_admin) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS user ;

CREATE TABLE user (ID_user int AUTO_INCREMENT NOT NULL,
user_username VARCHAR(255),
user_mail VARCHAR(255),
PRIMARY KEY (ID_user) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS project ;

CREATE TABLE project (ID_project int AUTO_INCREMENT NOT NULL,
project_image VARCHAR(255),
project_fr_name VARCHAR(255),
project_fr_text TEXT,
project_en_name VARCHAR(255),
project_en_text TEXT,
ID_admin int NOT NULL,
PRIMARY KEY (ID_project) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS contact ;

CREATE TABLE contact (ID_contact int AUTO_INCREMENT NOT NULL,
contact_message TEXT,
contact_phone VARCHAR(255),
contact_organisation VARCHAR(255),
ID_user int NOT NULL,
PRIMARY KEY (ID_contact) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS testimonial ;

CREATE TABLE testimonial (ID_testimonial int AUTO_INCREMENT NOT NULL,
testimonial_content TEXT,
testimonial_position VARCHAR(255),
testimonial_organisation VARCHAR(255),
testimonial_website VARCHAR(255),
ID_user int NOT NULL,
PRIMARY KEY (ID_testimonial) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS comment ;

CREATE TABLE comment (ID_comment int AUTO_INCREMENT NOT NULL,
comment_date TIMESTAMP,
comment_text TEXT,
ID_project int,
ID_user int,
PRIMARY KEY (ID_comment) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS subcomment ;

CREATE TABLE subcomment (ID_subcomment int AUTO_INCREMENT NOT NULL,
subcomment_text TEXT,
subcomment_date TIMESTAMP,
ID_user int NOT NULL,
ID_comment int NOT NULL,
PRIMARY KEY (ID_subcomment) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS keywords ;

CREATE TABLE keywords (ID_keywords int AUTO_INCREMENT NOT NULL,
keywords_name_fr VARCHAR(255),
keywords_name_en VARCHAR(255),
PRIMARY KEY (ID_keywords) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS moderate_2 ;

CREATE TABLE moderate_2 (ID_admin int AUTO_INCREMENT NOT NULL,
ID_subcomment int NOT NULL,
PRIMARY KEY (ID_admin,
 ID_subcomment) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS moderate_1 ;

CREATE TABLE moderate_1 (ID_admin int AUTO_INCREMENT NOT NULL,
ID_comment int NOT NULL,
PRIMARY KEY (ID_admin,
 ID_comment) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS verify ;

CREATE TABLE verify (ID_testimonial int AUTO_INCREMENT NOT NULL,
ID_admin int NOT NULL,
PRIMARY KEY (ID_testimonial,
 ID_admin) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS receive ;

CREATE TABLE receive (ID_admin int AUTO_INCREMENT NOT NULL,
ID_contact int NOT NULL,
PRIMARY KEY (ID_admin,
 ID_contact) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS associate ;

CREATE TABLE associate (ID_keywords int AUTO_INCREMENT NOT NULL,
ID_project int NOT NULL,
PRIMARY KEY (ID_keywords,
 ID_project) ) ENGINE=InnoDB;

ALTER TABLE project ADD CONSTRAINT FK_project_ID_admin FOREIGN KEY (ID_admin) REFERENCES admin (ID_admin);

ALTER TABLE contact ADD CONSTRAINT FK_contact_ID_user FOREIGN KEY (ID_user) REFERENCES user (ID_user);

ALTER TABLE testimonial ADD CONSTRAINT FK_testimonial_ID_user FOREIGN KEY (ID_user) REFERENCES user (ID_user);

ALTER TABLE comment ADD CONSTRAINT FK_comment_ID_project FOREIGN KEY (ID_project) REFERENCES project (ID_project);

ALTER TABLE comment ADD CONSTRAINT FK_comment_ID_user FOREIGN KEY (ID_user) REFERENCES user (ID_user);

ALTER TABLE subcomment ADD CONSTRAINT FK_subcomment_ID_user FOREIGN KEY (ID_user) REFERENCES user (ID_user);

ALTER TABLE subcomment ADD CONSTRAINT FK_subcomment_ID_comment FOREIGN KEY (ID_comment) REFERENCES comment (ID_comment);

ALTER TABLE moderate_2 ADD CONSTRAINT FK_moderate_2_ID_admin FOREIGN KEY (ID_admin) REFERENCES admin (ID_admin);

ALTER TABLE moderate_2 ADD CONSTRAINT FK_moderate_2_ID_subcomment FOREIGN KEY (ID_subcomment) REFERENCES subcomment (ID_subcomment);

ALTER TABLE moderate_1 ADD CONSTRAINT FK_moderate_1_ID_admin FOREIGN KEY (ID_admin) REFERENCES admin (ID_admin);

ALTER TABLE moderate_1 ADD CONSTRAINT FK_moderate_1_ID_comment FOREIGN KEY (ID_comment) REFERENCES comment (ID_comment);

ALTER TABLE verify ADD CONSTRAINT FK_verify_ID_testimonial FOREIGN KEY (ID_testimonial) REFERENCES testimonial (ID_testimonial);

ALTER TABLE verify ADD CONSTRAINT FK_verify_ID_admin FOREIGN KEY (ID_admin) REFERENCES admin (ID_admin);

ALTER TABLE receive ADD CONSTRAINT FK_receive_ID_admin FOREIGN KEY (ID_admin) REFERENCES admin (ID_admin);

ALTER TABLE receive ADD CONSTRAINT FK_receive_ID_contact FOREIGN KEY (ID_contact) REFERENCES contact (ID_contact);

ALTER TABLE associate ADD CONSTRAINT FK_associate_ID_keywords FOREIGN KEY (ID_keywords) REFERENCES keywords (ID_keywords);

ALTER TABLE associate ADD CONSTRAINT FK_associate_ID_project FOREIGN KEY (ID_project) REFERENCES project (ID_project);

INSERT INTO admin (admin_username, admin_password, admin_mail) VALUES ('Adam Dupuis', 'PortfolioR00t', 'adamdupuis@laposte.net');

INSERT INTO user (ID_user, user_username, user_mail) VALUES (1, 'Adam Dupuis', 'adamdupuis@laposte.net');

INSERT INTO testimonial (testimonial_content, testimonial_position, testimonial_organisation, testimonial_website, ID_user) VALUES ('Adam est vraiment remarquable, et je ne dis pas ça parce qu\'il s\'agit de moi-même !', 'Développeur', 'Indépendant', 'https://www.adamdupuis.fr', 1), ('Adam est vraiment remarquable, et je ne dis pas ça parce qu\'il s\'agit encore de moi-même !', 'Développeur bis', 'Indépendant toujours', 'https://www.adamdupuis.fr', 1);
