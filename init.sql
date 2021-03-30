CREATE DATABASE FashionStore;
USE FashionStore;

CREATE TABLE Products(
  PRIMARY KEY (Product_ID),
  Product_ID INT AUTO_INCREMENT,
  Name Varchar(255) NOT NULL,
  Image Varchar(255),
  Price float NOT NULL,
  Description Varchar(255),
  Quantity INT NOT NULL
);

INSERT INTO Products (Name, Image, Price, Description, Quantity)
VALUES('Dress Yellow', 'https://images.unsplash.com/photo-1616705904503-255903d85b9e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1301&q=80', 759.00, 'Wonderful product', 2);

INSERT INTO Products (Name, Image, Price, Description, Quantity)
VALUES('Dress', 'https://images.unsplash.com/photo-1616847220575-31b062a4cd05?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80', 700.00, 'Wonderful product', 1);

CREATE TABLE Users(
  PRIMARY KEY (User_ID),
  User_ID INT AUTO_INCREMENT,
  Email Varchar(255) NOT NULL UNIQUE,
  Password Varchar(255) NOT NULL,
  Admin_Area Boolean DEFAULT FALSE,
  Phone_number Varchar(255) NOT NULL,
  Address Varchar(255)
  
);

INSERT INTO Users (Email, Password, Admin_Area, Phone_number, Address)
VALUES('info@gmail.com', 'password', TRUE, '+4524256267', 'Dominican Republic');

INSERT INTO Users (Email, Password, Admin_Area, Phone_number, Address)
VALUES('user@gmail.com', 'password', FALSE, '+4524256267', 'Dominican Republic');


