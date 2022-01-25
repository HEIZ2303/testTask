CREATE DATABASE testDB;

USE testDB;

CREATE TABLE Products(
    ID int NOT NULL AUTO_INCREMENT,
    PRODUCT_ID INT NOT NULL,
    PRODUCT_NAME VARCHAR(255),
    PRODUCT_PRICE INT,
    PRODUCT_ARTICLE VARCHAR(255),
    PRODUCT_QUANTITY INT,
    DATE_CREATE TIMESTAMP,
    PRIMARY KEY(ID)
);

ALTER TABLE Products ADD VISIBILITY BOOLEAN DEFAULT 1 AFTER DATE_CREATE;