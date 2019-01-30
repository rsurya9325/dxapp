
CREATE TABLE admin_users (
  id int(12)NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_name varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  role enum('Superadmin','admin') DEFAULT NULL
); 



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
  resource_role enum('Superadmin','admin','employee')
); 



CREATE TABLE skills (
  id int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  skill varchar(255) NOT NULL
); 

CREATE TABLE allocations (
  id int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  alloaction_date date DEFAULT NULL,
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
  FOREIGN KEY (project_id) REFERENCES projects(id)
); 