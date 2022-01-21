DROP DATABASE IF EXISTS SKI_LIBRARY;
CREATE DATABASE SKI_LIBRARY;
USE SKI_LIBRARY;

CREATE TABLE PERSONNEL (
    fName VARCHAR(20),
    lName VARCHAR(20),
    idNumber DECIMAL NOT NULL,
    PRIMARY KEY (idNumber)
);

-- INSERT INTO PERSONNEL

DROP TABLE IF EXISTS PATRON;
CREATE TABLE PATRON (
    fName VARCHAR(20),
    lName VARCHAR(20),
    idNumber DECIMAL NOT NULL, 
    age DECIMAL,
    email VARCHAR(30),
    address VARCHAR(30),
    city VARCHAR(20),
    province VARCHAR(20),

    emergency_relation VARCHAR(20),
    emergency_firstName VARCHAR(20),
    emergency_lastName VARCHAR(20),
    emergency_phoneNumber DECIMAL,
    
    initial_para1 VARCHAR(5),
    initial_para2 VARCHAR(5),
    PRIMARY KEY (idNumber)
);

SELECT * FROM PATRON;
DELETE FROM PATRON;