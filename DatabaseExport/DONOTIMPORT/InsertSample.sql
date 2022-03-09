INSERT INTO Cinema
        (id, name, location, address, manager)
    VALUES
        (1, 'Intu' , 'Watford' '10, High Str', 'Andy Smith')
        (2, 'Phoenix', 'Hitchin 2, Swan Lane', 'Mary Jobs')
        (3, 'Rialto' 'Stevenage 6, London Rd', 'Tuhaj Bey')
        (4, 'Intimate' 'Watford 3, Broad Ave', 'Marek Huk')
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
        (1111, 'Ms', 'Helen Miranda', ('DATE: Manual Date', '2017-12-21'), 'Active')
        (1234, 'Mr', 'Jose Alves', ('DATE: Manual Date', '2017-12-27'), 'Active')
        (1333, 'Dr', 'Vito Gelato', ('DATE: Manual Date', '2018-01-06'), 'Lapsed')
        (1344, 'Dr', 'Guy Redmond', ('DATE: Manual Date', '2018-02-09'), 'Active')
        (1444, 'Ms', 'Maria Partou', ('DATE: Manual Date', '2018-03-11'), 'Active')
        (2111, 'Ms', 'Lindsay White', ('DATE: Manual Date', '2018-03-16'), 'Cancelled')
        (2121, 'Mr', 'David Wilkinson', ('DATE: Manual Date', '2018-03-18'), 'Active')
        (3333, 'Ms', 'Olenka Sama', ('DATE: Manual Date', '2018-12-12'), 'Active')
