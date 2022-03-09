use orders;
INSERT INTO Cinema
		(id, name, location, address, manager)
	VALUES
		(1, 'Intu' , 'Watford', '10, High Str', 'Andy Smith'),
		(2, 'Phoenix', 'Hitchin', '2, Swan Lane', 'Mary Jobs'),
		(3, 'Rialto', 'Stevenage', '6, London Rd', 'Tuhaj Bey'),
		(4, 'Intimate', 'Watford', '3, Broad Ave', 'Marek Huk')
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
		(id, title, name, joined, active)
	VALUES
		(1111, 'Ms', 'Helen Miranda', '2017-12-21', 'Active'),
		(1234, 'Mr', 'Jose Alves', '2017-12-27', 'Active'),
		(1333, 'Dr', 'Vito Gelato', '2018-01-06', 'Lapsed'),
		(1344, 'Dr', 'Guy Redmond', '2018-02-09', 'Active'),
		(1444, 'Ms', 'Maria Partou', '2018-03-11', 'Active'),
		(2111, 'Ms', 'Lindsay White', '2018-03-16', 'Cancelled'),
		(2121, 'Mr', 'David Wilkinson', '2018-03-18', 'Active'),
		(3333, 'Ms', 'Olenka Sama', '2018-12-12', 'Active')
;
INSERT INTO Film
		(id, released, title, director)
	VALUES
		(1, 1941, 'The Maltese Falcon', 'John Huston'),
		(2, 1940, 'Rebecca', 'Alfred Hitchcock'),
		(3, 1944, 'House of Dracula', 'Eric Kenton'),
		(4, 1943, 'Jane Eyre Robert', 'Stevenson'),
		(5, 1942, 'Casablanca', 'Michael Curtiz'),
		(6, 1949, 'The Third Man', 'Carol Reed'),
		(7, 1945, 'Brief Encounter', 'David Lean'),
		(8, 1948, 'Key Largo', 'John Huston'),
		(9, 1946, 'Notorious', 'Alfred Hitchcock'),
		(10, 1948, 'Rope', 'Alfred Hitchcock'),
		(11, 1949, 'African Queen', 'John Huston')
;
INSERT INTO Film
		(id, title)
	VALUES
		(12, 'Spellbound')
;
INSERT INTO Performance
		(id, cinema, screen, film, date, time, seatsleft)
	VALUES
		(1, 1, 1, 11, '2019-06-20', '19:00:00', 30),
		(2, 1, 2, 2, '2019-06-20', '19:00:00', 29),
		(3, 1, 3, 8, '2019-06-20', '19:00:00', 45),
		(4, 1, 1, 11, '2019-06-21', '19:00:00', 30),
		(5, 3, 1, 2,  '2019-06-21', '19:00:00', 46),
		(6, 1, 1, 11, '2019-06-24',  '19:00:00', 30),
		(7, 3, 2, 12, '2019-06-20', '19:30:00', 66),
		(8, 3, 2, 10, '2019-06-22', '19:30:00', 66),
		(9, 2, 1, 5, '2019-06-20', '19:30:00', 25),
		(10, 4, 1, 7, '2019-06-21', '20:00:00', 4),
		(11, 4, 1, 7, '2019-06-23', '19:30:00', 6),
		(12, 3, 2, 1, '2019-06-21', '19:30:00', 61),
		(13, 4, 1, 11, '2019-06-26', '19:00:00', 6),
		(14, 1, 2, 9, '2019-06-26', '19:00:00', 40),
		(15, 1, 3, 10, '2019-06-23', '19:00:00', 5)
;
INSERT INTO Booking
		(id, member, performance, seats)
	VALUES
		
		(1, 1234, 2, 4),
		(2, 1111, 3, 5),
		(3, 1111, 12, 5),
		(4, 1444, 2, 7),
		(5, 3333, 10, 2)
;
