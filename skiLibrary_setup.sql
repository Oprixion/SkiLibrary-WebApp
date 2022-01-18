DROP DATABASE IF EXISTS SKI_LIBRARY;
CREATE DATABASE SKI_LIBRARY;
USE SKI_LIBRARY;

CREATE TABLE PATRON
(
    fName VARCHAR(20) NOT NULL,
    lName VARCHAR(20) NOT NULL,
    idNumber DECIMAL NOT NULL, 
    age DECIMAL,
    Address VARCHAR(30) NOT NULL,
    city VARCHAR(20) NOT NULL,
    province VARCHAR(20),
    emergency_fName VARCHAR(20),
    emergency_lastName VARCHAR(20),
    emergency_phoneNumber DECIMAL,
    PRIMARY KEY (idNumber)
)