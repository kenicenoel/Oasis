CREATE TABLE Student
(
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(30) NOT NULL,
  password varchar(18) NOT NULL,
  business varchar(100) NOT NULL,
  island varchar(25) NOT NULL,
  phone varchar(11) DEFAULT NULL,
  fname varchar(12) DEFAULT NULL,
  lname varchar(20) DEFAULT NULL,
  address varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE Content 
(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(30) NOT NULL,
  category varchar(30) NOT NULL,
  image varchar(100) DEFAULT NULL,
  data text NOT NULL,
  published timestamp NOT NULL DEFAULT current_timestamp(),
  publisher int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (publisher) REFERENCES Admin (id)
);

