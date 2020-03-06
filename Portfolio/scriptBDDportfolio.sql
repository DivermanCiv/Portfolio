DROP DATABASE if EXISTS `portfolio`;
CREATE DATABASE `portfolio`;
use  portfolio;

DROP TABLE IF EXISTS user ;

CREATE TABLE user (ID_user int AUTO_INCREMENT NOT NULL,
user_username VARCHAR(255),
user_mail VARCHAR(255),
user_phone VARCHAR(255),
user_position VARCHAR(255),
user_website VARCHAR(255),
user_organisation VARCHAR(255),
user_IP VARCHAR(255),
PRIMARY KEY (ID_user) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS project ;

CREATE TABLE project (ID_project int AUTO_INCREMENT NOT NULL,
project_image VARCHAR(255),
project_fr_name VARCHAR(255),
project_fr_text TEXT,
project_en_name VARCHAR(255),
project_en_text TEXT,
project_link VARCHAR(255),
PRIMARY KEY (ID_project) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS contact ;

CREATE TABLE contact (ID_contact int AUTO_INCREMENT NOT NULL,
contact_message TEXT,
contact_date TIMESTAMP,
ID_user int NOT NULL,
PRIMARY KEY (ID_contact) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS testimonial ;

CREATE TABLE testimonial (ID_testimonial int AUTO_INCREMENT NOT NULL,
testimonial_content_fr TEXT,
testimonial_content_en TEXT,
ID_user int NOT NULL,
ID_message_status int NOT NULL,
PRIMARY KEY (ID_testimonial) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS comment ;

CREATE TABLE comment (ID_comment int AUTO_INCREMENT NOT NULL,
comment_date TIMESTAMP,
comment_text TEXT,
ID_project int NOT NULL,
ID_user int NOT NULL,
ID_message_status int NOT NULL,
PRIMARY KEY (ID_comment) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS keywords ;

CREATE TABLE keywords (ID_keywords int AUTO_INCREMENT NOT NULL,
keywords_name_fr VARCHAR(255),
keywords_name_en VARCHAR(255),
PRIMARY KEY (ID_keywords) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS message_status ;

CREATE TABLE message_status (ID_message_status int AUTO_INCREMENT NOT NULL,
message_status_name VARCHAR(255),
PRIMARY KEY (ID_message_status) ) ENGINE=InnoDB;

DROP TABLE IF EXISTS associate ;

CREATE TABLE associate (ID_keywords int AUTO_INCREMENT NOT NULL,
ID_project int NOT NULL,
PRIMARY KEY (ID_keywords,
 ID_project) ) ENGINE=InnoDB;

ALTER TABLE contact ADD CONSTRAINT FK_contact_ID_user FOREIGN KEY (ID_user) REFERENCES user (ID_user);

ALTER TABLE testimonial ADD CONSTRAINT FK_testimonial_ID_user FOREIGN KEY (ID_user) REFERENCES user (ID_user);

ALTER TABLE testimonial ADD CONSTRAINT FK_testimonial_ID_message_status FOREIGN KEY (ID_message_status) REFERENCES message_status (ID_message_status);

ALTER TABLE comment ADD CONSTRAINT FK_comment_ID_project FOREIGN KEY (ID_project) REFERENCES project (ID_project);

ALTER TABLE comment ADD CONSTRAINT FK_comment_ID_user FOREIGN KEY (ID_user) REFERENCES user (ID_user);

ALTER TABLE comment ADD CONSTRAINT FK_comment_ID_message_status FOREIGN KEY (ID_message_status) REFERENCES message_status (ID_message_status);

ALTER TABLE associate ADD CONSTRAINT FK_associate_ID_keywords FOREIGN KEY (ID_keywords) REFERENCES keywords (ID_keywords);

ALTER TABLE associate ADD CONSTRAINT FK_associate_ID_project FOREIGN KEY (ID_project) REFERENCES project (ID_project);

