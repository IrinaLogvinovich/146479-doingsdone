CREATE DATABASE doings
 DEFAULT CHARACTER SET utf8
 DEFAULT COLLATE utf8_general_ci;

USE doings;

CREATE TABLE projects (
id  INT AUTO_INCREMENT PRIMARY KEY,
project_name  CHAR(128) UNIQUE,
author INT
);

CREATE TABLE tasks (
id  INT AUTO_INCREMENT PRIMARY KEY,
create_date DATETIME,
execution_date DATETIME,
task_status INT DEFAULT 0,
task_name  CHAR(255),
task_file CHAR(255),
period_time DATETIME,
author INT,
project INT
);

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
registration_date DATETIME,
email CHAR(128) UNIQUE NOT NULL,
name_user CHAR(128) NOT NULL,
user_password  CHAR(128) NOT NULL
);

CREATE UNIQUE INDEX mail ON users(email);
CREATE INDEX task ON tasks(task_name);
CREATE UNIQUE INDEX project ON projects(project_name);
