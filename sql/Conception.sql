CREATE DATABASE imo;

USE imo;

CREATE TABLE Clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    nom VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    numero_tel VARCHAR(20)
);

CREATE TABLE Habitations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(50) NOT NULL,
    nombre_chambres INT NOT NULL,
    loyer_par_jour DECIMAL(10,2) NOT NULL,
    photos TEXT,
    quartier VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE Reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT,
    habitation_id INT,
    date_arrivee DATE NOT NULL,
    date_depart DATE NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Clients(id),
    FOREIGN KEY (habitation_id) REFERENCES Habitations(id)
);

CREATE TABLE Admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    nom VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    numero_tel VARCHAR(20),
);

