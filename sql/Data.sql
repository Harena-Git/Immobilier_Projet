INSERT INTO Clients (email, nom, mot_de_passe, numero_tel) VALUES
('alice@example.com', 'Alice Dupont', 'password123', '0123456789'),
('bob@example.com', 'Bob Martin', 'securepass', '0987654321'),
('carol@example.com', 'Carol Henry', 'mypassword', '1234509876');

INSERT INTO Habitations (type, nombre_chambres, loyer_par_jour, photos, quartier, description) VALUES
('maison', 4, 150.00, 'photo1.jpg', 'quartier nord', 'Maison 4 chambres côté plein sud avec piscine'),
('studio', 1, 80.00, 'photo2.jpg', 'quartier est', 'Studio cosy idéal pour une personne seule ou un couple'),
('appartement', 3, 120.00, 'photo3.jpg', 'quartier ouest', 'Appartement moderne avec 3 chambres et balcon');

INSERT INTO Reservations (client_id, habitation_id, date_arrivee, date_depart) VALUES
(1, 1, '2025-01-20', '2025-01-25'),
(2, 2, '2025-02-01', '2025-02-05'),
(3, 3, '2025-03-15', '2025-03-20');

-- Req
SELECT * FROM Habitations WHERE description LIKE '%piscine%';
SELECT * FROM Reservations WHERE client_id = 1;
SELECT H.*
FROM Habitations H
LEFT JOIN Reservations R ON H.id = R.habitation_id
WHERE (R.date_arrivee IS NULL OR R.date_depart < '2025-04-01' OR R.date_arrivee > '2025-04-10');
UPDATE Habitations SET loyer_par_jour = 160.00 WHERE id = 1;
DELETE FROM Reservations WHERE id = 2;
