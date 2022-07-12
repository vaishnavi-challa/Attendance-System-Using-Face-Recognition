<?php
$servername = "localhost";
$username ="root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Create database
$sql = "CREATE DATABASE rollcall";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$dbname="rollcall";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE teachers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
profession VARCHAR(50),
classes INT,
subjects VARCHAR(30),
password VARCHAR(20)
)";

if ($conn->query($sql) === TRUE) {
   
} else {
  echo "Error creating table " . $conn->error;
}
$sql = "CREATE TABLE students (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
class INT,
schlno INT,
phone VARCHAR(10),
password VARCHAR(20),
timestamping VARCHAR(20),
lastdayattended VARCHAR(20)
)";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE `january` (
`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`fname` VARCHAR(30) NOT NULL,
`2022-01-01` INT DEFAULT 0,
  `2022-01-02` INT DEFAULT 0,
  `2022-01-03` INT DEFAULT 0,
  `2022-01-04` INT DEFAULT 0,
  `2022-01-05` INT DEFAULT 0,
  `2022-01-06` INT DEFAULT 0,
  `2022-01-07` INT DEFAULT 0,
  `2022-01-08` INT DEFAULT 0,
  `2022-01-09` INT DEFAULT 0,
  `2022-01-10` INT DEFAULT 0,
  `2022-01-11` INT DEFAULT 0,
  `2022-01-12` INT DEFAULT 0,
  `2022-01-13` INT DEFAULT 0,
  `2022-01-14` INT DEFAULT 0,
  `2022-01-15` INT DEFAULT 0,
  `2022-01-16` INT DEFAULT 0,
  `2022-01-17` INT DEFAULT 0,
  `2022-01-18` INT DEFAULT 0,
  `2022-01-19` INT DEFAULT 0,
  `2022-01-20` INT DEFAULT 0,
  `2022-01-21` INT DEFAULT 0,
  `2022-01-22` INT DEFAULT 0,
  `2022-01-23` INT DEFAULT 0,
  `2022-01-24` INT DEFAULT 0,
  `2022-01-25` INT DEFAULT 0,
  `2022-01-26` INT DEFAULT 0,
  `2022-01-27` INT DEFAULT 0,
  `2022-01-28` INT DEFAULT 0,
  `2022-01-29` INT DEFAULT 0,
  `2022-01-30` INT DEFAULT 0,
  `2022-01-31` INT DEFAULT 0
)";
  if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `february` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-02-01` INT DEFAULT 0,
  `2022-02-02` INT DEFAULT 0,
  `2022-02-03` INT DEFAULT 0,
  `2022-02-04` INT DEFAULT 0,
  `2022-02-05` INT DEFAULT 0,
  `2022-02-06` INT DEFAULT 0,
  `2022-02-07` INT DEFAULT 0,
  `2022-02-08` INT DEFAULT 0,
  `2022-02-09` INT DEFAULT 0,
  `2022-02-10` INT DEFAULT 0,
  `2022-02-11` INT DEFAULT 0,
  `2022-02-12` INT DEFAULT 0,
  `2022-02-13` INT DEFAULT 0,
  `2022-02-14` INT DEFAULT 0,
  `2022-02-15` INT DEFAULT 0,
  `2022-02-16` INT DEFAULT 0,
  `2022-02-17` INT DEFAULT 0,
  `2022-02-18` INT DEFAULT 0,
  `2022-02-19` INT DEFAULT 0,
  `2022-02-20` INT DEFAULT 0,
  `2022-02-21` INT DEFAULT 0,
  `2022-02-22` INT DEFAULT 0,
  `2022-02-23` INT DEFAULT 0,
  `2022-02-24` INT DEFAULT 0,
  `2022-02-25` INT DEFAULT 0,
  `2022-02-26` INT DEFAULT 0,
  `2022-02-27` INT DEFAULT 0,
  `2022-02-28` INT DEFAULT 0,
  `2022-02-29` INT DEFAULT 0,
  `2022-02-30` INT DEFAULT 0,
  `2022-02-31` INT DEFAULT 0
)";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `march` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-03-01` INT DEFAULT 0,
  `2022-03-02` INT DEFAULT 0,
  `2022-03-03` INT DEFAULT 0,
  `2022-03-04` INT DEFAULT 0,
  `2022-03-05` INT DEFAULT 0,
  `2022-03-06` INT DEFAULT 0,
  `2022-03-07` INT DEFAULT 0,
  `2022-03-08` INT DEFAULT 0,
  `2022-03-09` INT DEFAULT 0,
  `2022-03-10` INT DEFAULT 0,
  `2022-03-11` INT DEFAULT 0,
  `2022-03-12` INT DEFAULT 0,
  `2022-03-13` INT DEFAULT 0,
  `2022-03-14` INT DEFAULT 0,
  `2022-03-15` INT DEFAULT 0,
  `2022-03-16` INT DEFAULT 0,
  `2022-03-17` INT DEFAULT 0,
  `2022-03-18` INT DEFAULT 0,
  `2022-03-19` INT DEFAULT 0,
  `2022-03-20` INT DEFAULT 0,
  `2022-03-21` INT DEFAULT 0,
  `2022-03-22` INT DEFAULT 0,
  `2022-03-23` INT DEFAULT 0,
  `2022-03-24` INT DEFAULT 0,
  `2022-03-25` INT DEFAULT 0,
  `2022-03-26` INT DEFAULT 0,
  `2022-03-27` INT DEFAULT 0,
  `2022-03-28` INT DEFAULT 0,
  `2022-03-29` INT DEFAULT 0,
  `2022-03-30` INT DEFAULT 0,
  `2022-03-31` INT DEFAULT 0)";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `april` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-04-01` INT DEFAULT 0,
  `2022-04-02` INT DEFAULT 0,
  `2022-04-03` INT DEFAULT 0,
  `2022-04-04` INT DEFAULT 0,
  `2022-04-05` INT DEFAULT 0,
  `2022-04-06` INT DEFAULT 0,
  `2022-04-07` INT DEFAULT 0,
  `2022-04-08` INT DEFAULT 0,
  `2022-04-09` INT DEFAULT 0,
  `2022-04-10` INT DEFAULT 0,
  `2022-04-11` INT DEFAULT 0,
  `2022-04-12` INT DEFAULT 0,
  `2022-04-13` INT DEFAULT 0,
  `2022-04-14` INT DEFAULT 0,
  `2022-04-15` INT DEFAULT 0,
  `2022-04-16` INT DEFAULT 0,
  `2022-04-17` INT DEFAULT 0,
  `2022-04-18` INT DEFAULT 0,
  `2022-04-19` INT DEFAULT 0,
  `2022-04-20` INT DEFAULT 0,
  `2022-04-21` INT DEFAULT 0,
  `2022-04-22` INT DEFAULT 0,
  `2022-04-23` INT DEFAULT 0,
  `2022-04-24` INT DEFAULT 0,
  `2022-04-25` INT DEFAULT 0,
  `2022-04-26` INT DEFAULT 0,
  `2022-04-27` INT DEFAULT 0,
  `2022-04-28` INT DEFAULT 0,
  `2022-04-29` INT DEFAULT 0,
  `2022-04-30` INT DEFAULT 0,
  `2022-04-31` INT DEFAULT 0)";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `may` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-05-01` INT DEFAULT 0,
  `2022-05-02` INT DEFAULT 0,
  `2022-05-03` INT DEFAULT 0,
  `2022-05-04` INT DEFAULT 0,
  `2022-05-05` INT DEFAULT 0,
  `2022-05-06` INT DEFAULT 0,
  `2022-05-07` INT DEFAULT 0,
  `2022-05-08` INT DEFAULT 0,
  `2022-05-09` INT DEFAULT 0,
  `2022-05-10` INT DEFAULT 0,
  `2022-05-11` INT DEFAULT 0,
  `2022-05-12` INT DEFAULT 0,
  `2022-05-13` INT DEFAULT 0,
  `2022-05-14` INT DEFAULT 0,
  `2022-05-15` INT DEFAULT 0,
  `2022-05-16` INT DEFAULT 0,
  `2022-05-17` INT DEFAULT 0,
  `2022-05-18` INT DEFAULT 0,
  `2022-05-19` INT DEFAULT 0,
  `2022-05-20` INT DEFAULT 0,
  `2022-05-21` INT DEFAULT 0,
  `2022-05-22` INT DEFAULT 0,
  `2022-05-23` INT DEFAULT 0,
  `2022-05-24` INT DEFAULT 0,
  `2022-05-25` INT DEFAULT 0,
  `2022-05-26` INT DEFAULT 0,
  `2022-05-27` INT DEFAULT 0,
  `2022-05-28` INT DEFAULT 0,
  `2022-05-29` INT DEFAULT 0,
  `2022-05-30` INT DEFAULT 0,
  `2022-05-31` INT DEFAULT 0)";
if ($conn->query($sql) === TRUE) {
 
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `june` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-06-01` INT DEFAULT 0,
  `2022-06-02` INT DEFAULT 0,
  `2022-06-03` INT DEFAULT 0,
  `2022-06-04` INT DEFAULT 0,
  `2022-06-05` INT DEFAULT 0,
  `2022-06-06` INT DEFAULT 0,
  `2022-06-07` INT DEFAULT 0,
  `2022-06-08` INT DEFAULT 0,
  `2022-06-09` INT DEFAULT 0,
  `2022-06-10` INT DEFAULT 0,
  `2022-06-11` INT DEFAULT 0,
  `2022-06-12` INT DEFAULT 0,
  `2022-06-13` INT DEFAULT 0,
  `2022-06-14` INT DEFAULT 0,
  `2022-06-15` INT DEFAULT 0,
  `2022-06-16` INT DEFAULT 0,
  `2022-06-17` INT DEFAULT 0,
  `2022-06-18` INT DEFAULT 0,
  `2022-06-19` INT DEFAULT 0,
  `2022-06-20` INT DEFAULT 0,
  `2022-06-21` INT DEFAULT 0,
  `2022-06-22` INT DEFAULT 0,
  `2022-06-23` INT DEFAULT 0,
  `2022-06-24` INT DEFAULT 0,
  `2022-06-25` INT DEFAULT 0,
  `2022-06-26` INT DEFAULT 0,
  `2022-06-27` INT DEFAULT 0,
  `2022-06-28` INT DEFAULT 0,
  `2022-06-29` INT DEFAULT 0,
  `2022-06-30` INT DEFAULT 0,
  `2022-06-31` INT DEFAULT 0)";
if ($conn->query($sql) === TRUE) {
 
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `july` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-07-01` INT DEFAULT 0,
  `2022-07-02` INT DEFAULT 0,
  `2022-07-03` INT DEFAULT 0,
  `2022-07-04` INT DEFAULT 0,
  `2022-07-05` INT DEFAULT 0,
  `2022-07-06` INT DEFAULT 0,
  `2022-07-07` INT DEFAULT 0,
  `2022-07-08` INT DEFAULT 0,
  `2022-07-09` INT DEFAULT 0,
  `2022-07-10` INT DEFAULT 0,
  `2022-07-11` INT DEFAULT 0,
  `2022-07-12` INT DEFAULT 0,
  `2022-07-13` INT DEFAULT 0,
  `2022-07-14` INT DEFAULT 0,
  `2022-07-15` INT DEFAULT 0,
  `2022-07-16` INT DEFAULT 0,
  `2022-07-17` INT DEFAULT 0,
  `2022-07-18` INT DEFAULT 0,
  `2022-07-19` INT DEFAULT 0,
  `2022-07-20` INT DEFAULT 0,
  `2022-07-21` INT DEFAULT 0,
  `2022-07-22` INT DEFAULT 0,
  `2022-07-23` INT DEFAULT 0,
  `2022-07-24` INT DEFAULT 0,
  `2022-07-25` INT DEFAULT 0,
  `2022-07-26` INT DEFAULT 0,
  `2022-07-27` INT DEFAULT 0,
  `2022-07-28` INT DEFAULT 0,
  `2022-07-29` INT DEFAULT 0,
  `2022-07-30` INT DEFAULT 0,
  `2022-07-31` INT DEFAULT 0)";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `august` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-08-01` INT DEFAULT 0,
  `2022-08-02` INT DEFAULT 0,
  `2022-08-03` INT DEFAULT 0,
  `2022-08-04` INT DEFAULT 0,
  `2022-08-05` INT DEFAULT 0,
  `2022-08-06` INT DEFAULT 0,
  `2022-08-07` INT DEFAULT 0,
  `2022-08-08` INT DEFAULT 0,
  `2022-08-09` INT DEFAULT 0,
  `2022-08-10` INT DEFAULT 0,
  `2022-08-11` INT DEFAULT 0,
  `2022-08-12` INT DEFAULT 0,
  `2022-08-13` INT DEFAULT 0,
  `2022-08-14` INT DEFAULT 0,
  `2022-08-15` INT DEFAULT 0,
  `2022-08-16` INT DEFAULT 0,
  `2022-08-17` INT DEFAULT 0,
  `2022-08-18` INT DEFAULT 0,
  `2022-08-19` INT DEFAULT 0,
  `2022-08-20` INT DEFAULT 0,
  `2022-08-21` INT DEFAULT 0,
  `2022-08-22` INT DEFAULT 0,
  `2022-08-23` INT DEFAULT 0,
  `2022-08-24` INT DEFAULT 0,
  `2022-08-25` INT DEFAULT 0,
  `2022-08-26` INT DEFAULT 0,
  `2022-08-27` INT DEFAULT 0,
  `2022-08-28` INT DEFAULT 0,
  `2022-08-29` INT DEFAULT 0,
  `2022-08-30` INT DEFAULT 0,
  `2022-08-31` INT DEFAULT 0)";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `september` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-09-01` INT DEFAULT 0,
  `2022-09-02` INT DEFAULT 0,
  `2022-09-03` INT DEFAULT 0,
  `2022-09-04` INT DEFAULT 0,
  `2022-09-05` INT DEFAULT 0,
  `2022-09-06` INT DEFAULT 0,
  `2022-09-07` INT DEFAULT 0,
  `2022-09-08` INT DEFAULT 0,
  `2022-09-09` INT DEFAULT 0,
  `2022-09-10` INT DEFAULT 0,
  `2022-09-11` INT DEFAULT 0,
  `2022-09-12` INT DEFAULT 0,
  `2022-09-13` INT DEFAULT 0,
  `2022-09-14` INT DEFAULT 0,
  `2022-09-15` INT DEFAULT 0,
  `2022-09-16` INT DEFAULT 0,
  `2022-09-17` INT DEFAULT 0,
  `2022-09-18` INT DEFAULT 0,
  `2022-09-19` INT DEFAULT 0,
  `2022-09-20` INT DEFAULT 0,
  `2022-09-21` INT DEFAULT 0,
  `2022-09-22` INT DEFAULT 0,
  `2022-09-23` INT DEFAULT 0,
  `2022-09-24` INT DEFAULT 0,
  `2022-09-25` INT DEFAULT 0,
  `2022-09-26` INT DEFAULT 0,
  `2022-09-27` INT DEFAULT 0,
  `2022-09-28` INT DEFAULT 0,
  `2022-09-29` INT DEFAULT 0,
  `2022-09-30` INT DEFAULT 0,
  `2022-09-31` INT DEFAULT 0)";
if ($conn->query($sql) === TRUE) {
 
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `october` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-10-01` INT DEFAULT 0,
  `2022-10-02` INT DEFAULT 0,
  `2022-10-03` INT DEFAULT 0,
  `2022-10-04` INT DEFAULT 0,
  `2022-10-05` INT DEFAULT 0,
  `2022-10-06` INT DEFAULT 0,
  `2022-10-07` INT DEFAULT 0,
  `2022-10-08` INT DEFAULT 0,
  `2022-10-09` INT DEFAULT 0,
  `2022-10-10` INT DEFAULT 0,
  `2022-10-11` INT DEFAULT 0,
  `2022-10-12` INT DEFAULT 0,
  `2022-10-13` INT DEFAULT 0,
  `2022-10-14` INT DEFAULT 0,
  `2022-10-15` INT DEFAULT 0,
  `2022-10-16` INT DEFAULT 0,
  `2022-10-17` INT DEFAULT 0,
  `2022-10-18` INT DEFAULT 0,
  `2022-10-19` INT DEFAULT 0,
  `2022-10-20` INT DEFAULT 0,
  `2022-10-21` INT DEFAULT 0,
  `2022-10-22` INT DEFAULT 0,
  `2022-10-23` INT DEFAULT 0,
  `2022-10-24` INT DEFAULT 0,
  `2022-10-25` INT DEFAULT 0,
  `2022-10-26` INT DEFAULT 0,
  `2022-10-27` INT DEFAULT 0,
  `2022-10-28` INT DEFAULT 0,
  `2022-10-29` INT DEFAULT 0,
  `2022-10-30` INT DEFAULT 0,
  `2022-10-31` INT DEFAULT 0)";

  if ($conn->query($sql) === TRUE) {
    
} else {
  echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE `november` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-11-01` INT DEFAULT 0,
  `2022-11-02` INT DEFAULT 0,
  `2022-11-03` INT DEFAULT 0,
  `2022-11-04` INT DEFAULT 0,
  `2022-11-05` INT DEFAULT 0,
  `2022-11-06` INT DEFAULT 0,
  `2022-11-07` INT DEFAULT 0,
  `2022-11-08` INT DEFAULT 0,
  `2022-11-09` INT DEFAULT 0,
  `2022-11-10` INT DEFAULT 0,
  `2022-11-11` INT DEFAULT 0,
  `2022-11-12` INT DEFAULT 0,
  `2022-11-13` INT DEFAULT 0,
  `2022-11-14` INT DEFAULT 0,
  `2022-11-15` INT DEFAULT 0,
  `2022-11-16` INT DEFAULT 0,
  `2022-11-17` INT DEFAULT 0,
  `2022-11-18` INT DEFAULT 0,
  `2022-11-19` INT DEFAULT 0,
  `2022-11-20` INT DEFAULT 0,
  `2022-11-21` INT DEFAULT 0,
  `2022-11-22` INT DEFAULT 0,
  `2022-11-23` INT DEFAULT 0,
  `2022-11-24` INT DEFAULT 0,
  `2022-11-25` INT DEFAULT 0,
  `2022-11-26` INT DEFAULT 0,
  `2022-11-27` INT DEFAULT 0,
  `2022-11-28` INT DEFAULT 0,
  `2022-11-29` INT DEFAULT 0,
  `2022-11-30` INT DEFAULT 0,
  `2022-11-31` INT DEFAULT 0)";
if ($conn->query($sql) === TRUE) {
 
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE `december` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(30) NOT NULL,
  `2022-12-01` INT DEFAULT 0,
  `2022-12-02` INT DEFAULT 0,
  `2022-12-03` INT DEFAULT 0,
  `2022-12-04` INT DEFAULT 0,
  `2022-12-05` INT DEFAULT 0,
  `2022-12-06` INT DEFAULT 0,
  `2022-12-07` INT DEFAULT 0,
  `2022-12-08` INT DEFAULT 0,
  `2022-12-09` INT DEFAULT 0,
  `2022-12-10` INT DEFAULT 0,
  `2022-12-11` INT DEFAULT 0,
  `2022-12-12` INT DEFAULT 0,
  `2022-12-13` INT DEFAULT 0,
  `2022-12-14` INT DEFAULT 0,
  `2022-12-15` INT DEFAULT 0,
  `2022-12-16` INT DEFAULT 0,
  `2022-12-17` INT DEFAULT 0,
  `2022-12-18` INT DEFAULT 0,
  `2022-12-19` INT DEFAULT 0,
  `2022-12-20` INT DEFAULT 0,
  `2022-12-21` INT DEFAULT 0,
  `2022-12-22` INT DEFAULT 0,
  `2022-12-23` INT DEFAULT 0,
  `2022-12-24` INT DEFAULT 0,
  `2022-12-25` INT DEFAULT 0,
  `2022-12-26` INT DEFAULT 0,
  `2022-12-27` INT DEFAULT 0,
  `2022-12-28` INT DEFAULT 0,
  `2022-12-29` INT DEFAULT 0,
  `2022-12-30` INT DEFAULT 0,
  `2022-12-31` INT DEFAULT 0)";
  if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table: " . $conn->error;
}
$sql="INSERT INTO teachers(`fname`, `username`, `profession`, `classes`, `subjects`, `password`) VALUES ('vyshnavi', 'vysh123', 'teacher', '10', 'maths', '123'),('vaishnavi', 'vaish123', 'teacher', '9', 'science', '456'),
('umadevi', 'uma123', 'teacher', '9', 'sanskrit', '789'),('John', 'john123', 'teacher', '8', 'French', '365'),('Harry', 'harry123', 'teacher', '9', 'spanish', '567')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
$sql="INSERT INTO `students` (`fname`, `username`, `email`, `class`, `schlno`, `phone`, `password`) VALUES ('uma', 'uma123', 'umadevi10@gmail.com', '10', '200010010', '7702042033', 'uma1'),('robin', 'robin123', 'robin100@gmail.com', '10', '200010123', '8374431037', 'robin1'),('hopper', 'hopper123', 'hopper100@gmail.com', '10', '200010132', '93813098457', 'hopper1'),('joyce', 'joyce123', 'joyce344@gmail.com', '10', '200010153', '8618402947', 'joyce1'),('steve', 'steve123', 'steve123@gmail.com', '10', '200010148', '6678543921', 'steve1'),('vaishnavi', 'vaishu123', 'vaish123@gmail.com', '9', '201112201', '984567157', 'vaishnavi1'),
('will', 'will123', 'will@gmail.com', '9', '201112202', '8795462587', 'will1'),
('mike', 'mike123', 'mike@gmail.com', '9', '201112203', '7586849564', 'mike1'),
('max', 'max123', 'max345@gmail.com', '9', '201112204', '8569475698', 'max1'),
('nancy', 'nancy123', 'nancy@gmail.com', '9', '201112205', '758689546', 'nancy1'),('el', 'el123', 'el234@gmail.com', '8', '200010186', '985896743', 'el1'),('dustin', 'dustin123', 'dustin345@gmail.com', '8', '200010146', '8618402945', 'dustin1')
,('lucus', 'lucus123', 'lucus123@gmail.com', '8', '200010193', '756897895', 'lucus1'),('vyshnavi', 'vyshu123', 'vysh123@gmail.com', '8', '200010153', '9564587456', 'vyshnavi1'),('jonathon', 'jona123', 'jonathon@gmail.com', '8', '200010154', '7589645869', 'jonathon1')";


if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `january` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `february` (`fname`) values ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `march` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `april` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `may` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `june` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `july` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `august` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `september` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `october` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `november` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `december` (`fname`) VALUES ('uma'),('robin'),('hopper'),('joyce'),('steve'),('vaishnavi'),
('will'),
('mike'),
('max'),
('nancy'),('el'),('dustin')
,('lucus'),('vyshnavi'),('jonathon')";

if ($conn->query($sql) === TRUE){
  echo "inserted into tables successfully";
} else {
  echo "Error creating table: " . $conn->error;
}



$conn->close();
?>
