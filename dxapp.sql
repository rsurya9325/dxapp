




CREATE TABLE projects (
  id int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  project_name varchar(255) NOT NULL,
  project_reporting varchar(255) NOT NULL,
  project_start_date date DEFAULT NULL,
  project_end_date date DEFAULT NULL,
  description LONGTEXT, 
  project_location varchar(255) NOT NULL,
  project_status ENUM("Active", "Inactive")
); 



CREATE TABLE resources (
  id int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  resource_name varchar(255) NOT NULL,
  resource_id varchar(255) NOT NULL,
  resource_password varchar(255) NOT NULL,
  resource_exp varchar(255) NOT NULL,
  resource_emailid varchar(255) NOT NULL,
  resource_pemailid varchar(255) NOT NULL,
  resource_phnnum varchar(255) NOT NULL,
  resource_skills varchar(255) NOT NULL,
  resource_location varchar(255) NOT NULL,
  resource_join_date date DEFAULT NULL,
  resource_status enum('Active','Inactive') DEFAULT NULL,
  resource_role enum('Superadmin','admin','employee'),
); 



CREATE TABLE skills (
  id int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  skill varchar(255) NOT NULL
); 

CREATE TABLE allocations (
  id int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  alloaction_start_date date DEFAULT NULL,
  allocation_end_date date DEFAULT NULL,
  resource_id int(12) NOT NULL,
  FOREIGN KEY (resource_id) REFERENCES resources(id),
  project_id int(12) NOT NULL,
  FOREIGN KEY (project_id) REFERENCES projects(id)
); 

CREATE TABLE allocation_history (
  id int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  resource_id int(12) NOT NULL,
  FOREIGN KEY (resource_id) REFERENCES resources(id),
  project_id int(12) NOT NULL,
  FOREIGN KEY (project_id) REFERENCES projects(id),
  allocation_start_date date NOT NULL,
  FOREIGN KEY (allocation_start_date) REFERENCES allocations(id),
  allocation_end_date date NOT NULL,
  FOREIGN KEY (allocation_end_date) REFERENCES allocations(id)
  
); 

CREATE TABLE skill_rating (
  id int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  resource_id int(12) NOT NULL,
  FOREIGN KEY (resource_id) REFERENCES resources(id),
  skill_id int(12) NOT NULL,
  FOREIGN KEY (skill_id) REFERENCES skills(id),
  rating int(12)NOT NULL
); 

ALTER TABLE `allocations` ADD `allocation_end_date` DATE NOT NULL AFTER `alloaction_start_date`;
ALTER TABLE `resources` ADD `resource_resume` BLOB NOT NULL AFTER `resource_role`;