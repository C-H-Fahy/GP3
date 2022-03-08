use orders;
CREATE TABLE Cinema(
    id int,    
    name char(255) NOT NULL, 
    location char(255), 
    address text(511), 
    manager char(255),
    PRIMARY KEY(id)
    );
CREATE TABLE Screen(
    cinema int, 
    screen int,
    seats int,
    price int,
    FOREIGN KEY(cinema) REFERENCES Cinema(id),
    PRIMARY KEY(cinema, screen)
    );
CREATE TABLE Film(
    id int,    
    released int, 
    title char(255) NOT NULL,
    director char(255),
    PRIMARY KEY(id)
    );
CREATE TABLE Performance(
    id int,
    cinema int,
    screen int,
    film int,
    date date,
    time time,
    seatsleft int,
    PRIMARY KEY(id),
    FOREIGN KEY (cinema) REFERENCES cinema(ID), 
    FOREIGN KEY (film) REFERENCES Film(ID)
    );
ALTER TABLE Performance ADD FOREIGN KEY (cinema, screen) REFERENCES Screen(cinema, screen);

CREATE TABLE Member(
    ID int,
    title char(15),
    name char(255),
    joined date,
    active bool,
    Primary Key(ID)
    );
CREATE TABLE Booking(
    id int,
    member int,
    performance int,
    seats int,
    Primary Key(ID),
    FOREIGN KEY (member) REFERENCES Member(ID),
    FOREIGN KEY (performance) REFERENCES Performance(ID)
    );
