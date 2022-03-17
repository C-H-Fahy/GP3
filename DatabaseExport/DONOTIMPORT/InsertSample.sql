use orders;
INSERT INTO Cinema
		(name, location, address, manager)
	VALUES
		('Intu' , 'Watford', '10, High Str', 'Andy Smith'),
		('Phoenix', 'Hitchin', '2, Swan Lane', 'Mary Jobs'),
		('Rialto', 'Stevenage', '6, London Rd', 'Tuhaj Bey'),
		('Intimate', 'Watford', '3, Broad Ave', 'Marek Huk')
;
INSERT INTO Screen
		(cinema, screen, seats, price)
	VALUES
		(1, 1, 30, 550),
		(1, 2, 40, 450),
		(1, 3, 50, 350),
		(2, 1, 25, 600),
		(3, 1, 46, 400),
		(3, 2, 66, 300),
		(4, 1, 6, 800)
;
INSERT INTO Member
		(id, title, name, joined, active, password)
	VALUES
		(1111, 'Ms', 'Helen Miranda', '2017-12-21', 'Active', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
		(1234, 'Mr', 'Jose Alves', '2017-12-27', 'Active', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
		(1333, 'Dr', 'Vito Gelato', '2018-01-06', 'Lapsed', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
		(1344, 'Dr', 'Guy Redmond', '2018-02-09', 'Active', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
		(1444, 'Ms', 'Maria Partou', '2018-03-11', 'Active', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
		(2111, 'Ms', 'Lindsay White', '2018-03-16', 'Cancelled', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
		(2121, 'Mr', 'David Wilkinson', '2018-03-18', 'Active', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
		(3333, 'Ms', 'Olenka Sama', '2018-12-12', 'Active', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW')
;

INSERT INTO Member
		(name, joined, active, role_type, password)
	VALUES
		('admin-test', '2022-03-17', 'Active', 'manager', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW')
;
	
INSERT INTO Film
		(released, title, director)
	VALUES
		(1941, 'The Maltese Falcon', 'John Huston'),
		(1940, 'Rebecca', 'Alfred Hitchcock'),
		(1944, 'House of Dracula', 'Eric Kenton'),
		(1943, 'Jane Eyre Robert', 'Stevenson'),
		(1942, 'Casablanca', 'Michael Curtiz'),
		(1949, 'The Third Man', 'Carol Reed'),
		(1945, 'Brief Encounter', 'David Lean'),
		(1948, 'Key Largo', 'John Huston'),
		(1946, 'Notorious', 'Alfred Hitchcock'),
		(1948, 'Rope', 'Alfred Hitchcock'),
		(1949, 'African Queen', 'John Huston')
;
INSERT INTO Film
		(title)
	VALUES
		('Spellbound')
;
INSERT INTO Performance
		(cinema, screen, film, date, time)
	VALUES
		(1, 1, 11, '2019-06-20', '19:00:00'),
		(1, 2, 2, '2019-06-20', '19:00:00'),
		(1, 3, 8, '2019-06-20', '19:00:00'),
		(1, 1, 11, '2019-06-21', '19:00:00'),
		(3, 1, 2,  '2019-06-21', '19:00:00'),
		(1, 1, 11, '2019-06-24',  '19:00:00'),
		(3, 2, 12, '2019-06-20', '19:30:00'),
		(3, 2, 10, '2019-06-22', '19:30:00'),
		(2, 1, 5, '2019-06-20', '19:30:00'),
		(4, 1, 7, '2019-06-21', '20:00:00'),
		(4, 1, 7, '2019-06-23', '19:30:00'),
		(3, 2, 1, '2019-06-21', '19:30:00'),
		(4, 1, 11, '2019-06-26', '19:00:00'),
		(1, 2, 9, '2019-06-26', '19:00:00'),
		(1, 3, 10, '2019-06-23', '19:00:00')
;
INSERT INTO Booking
		(member, performance, seats)
	VALUES
		
		(1234, 2, 4),
		(1111, 3, 5),
		(1111, 12, 5),
		(1444, 2, 7),
		(3333, 10, 2)
;
