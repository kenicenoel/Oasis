
CREATE DATABASE IF NOT EXISTS oasisdb;
use oasisdb;
CREATE TABLE users
(
	uid int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
	studentNumber int(9) NOT NULL,
	password varchar(36) NOT NULL,
	firstName varchar(20),
	lastName varchar(20),
	email varchar(50),
	phoneNumber varchar(11),
	address varchar(30),
	accent varchar(7),

	lastLogin timestamp NULL DEFAULT NULL,
  modified timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

);
ALTER TABLE users AUTO_INCREMENT=00000000001;


CREATE TABLE landlord
(
	landlordNumber int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	firstName varchar(20),
	lastName varchar(20),
	email varchar(50),
	phoneNumber varchar(11) NOT NULL,
	address varchar(30)
);
ALTER TABLE landlord AUTO_INCREMENT=00000000001;

CREATE TABLE listing
(
	listingNumber int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	landlordNumber int(11) NOT NULL,
	description varchar(255),
	type varchar(20),
	address varchar(30),
	location varchar(30),
	price int(6) NOT NULL,
	preferred varchar(10),
	securityMeasures varchar(100),
	furnished varchar(30),
	image1 varchar(200),
	image2 varchar(200),
	image3 varchar(200),
	image4 varchar(200),
	image5 varchar(200),
	FOREIGN KEY listing(landlordNumber) REFERENCES landlord(landlordNumber)

);
ALTER TABLE listing AUTO_INCREMENT=00000000001;


CREATE TABLE amenity
(
	amenityId int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	description varchar(50)


);
ALTER TABLE amenity AUTO_INCREMENT=0001;

CREATE TABLE ListingAmenity
(
	listingNumber int(11) PRIMARY KEY,
	amenityId int(4),
	FOREIGN KEY ListingAmenity(listingNumber) REFERENCES listing(listingNumber),
	FOREIGN KEY ListingAmenity(amenityId) REFERENCES amenity(amenityId)


);



CREATE TABLE appliance
(
	applianceId int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	description varchar(50)


);
ALTER TABLE appliance AUTO_INCREMENT=0001;

CREATE TABLE ListingAppliance
(
	listingNumber int(11) PRIMARY KEY,
	applianceId int(4),
	FOREIGN KEY ListingAppliance(listingNumber) REFERENCES listing(listingNumber),
	FOREIGN KEY ListingAppliance(applianceId) REFERENCES appliance(applianceId)


);
