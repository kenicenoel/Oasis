CREATE DATABASE oasisdb;
CREATE TABLE users
(
	userId int NOT NULL PRIMARY KEY,
	password varchar(36) NOT NULL,
	firstName varchar(20),
	lastName varchar(20),
	email varchar(50),
	phoneNumber varchar(11),
	address varchar(30)

);

INSERT INTO users
VALUES(811100809, '19900727','Kenice', 'Noel', 'kenice.noel@my.uwi.edu', '18687866586', '60 Evans Street');

CREATE TABLE landlord
(
	lanlordNumber int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	firstName varchar(20),
	lastName varchar(20),
	email varchar(50),
	phoneNumber varchar(11) NOT NULL,
	address varchar(30)

);

CREATE TABLE listing
(
	listingNumber int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	landlordNumber int(11) NOT NULL,
	description varchar(255),
	address varchar(30),
	price int(6) NOT NULL,
	image1 blob,
	image2 blob,
	image3 blob,
	image4 blob,
	image5 blob,
	FOREIGN KEY listing(landlordNumber) REFERENCES landlord(lanlordNumber)

);
