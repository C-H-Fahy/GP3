use orders;
CREATE TABLE Cinema(
    id int AUTO_INCREMENT,    
    name char(255) NOT NULL UNIQUE,
    location char(255), 
    address text(511), 
    manager char(255),
    PRIMARY KEY(id)
    );
CREATE TABLE Screen(
    cinema int, 
    screen int,
    seats int NOT NULL,
    price int NOT NULL,
    FOREIGN KEY(cinema) REFERENCES Cinema(id),
    PRIMARY KEY(cinema, screen)
    );
CREATE TABLE Film(
    id int AUTO_INCREMENT,    
    released int, 
    title char(255) NOT NULL,
    director char(255),
    PRIMARY KEY(id)
    );
ALTER TABLE Film
    ADD CONSTRAINT titledirector UNIQUE (title, director);

CREATE TABLE Performance(
    id int AUTO_INCREMENT,
    cinema int NOT NULL,
    screen int NOT NULL,
    film int,
    date date,
    time time,
    PRIMARY KEY(id),
    FOREIGN KEY (cinema) REFERENCES cinema(ID), 
    FOREIGN KEY (film) REFERENCES Film(ID)
    );
ALTER TABLE Performance ADD FOREIGN KEY (cinema, screen) REFERENCES Screen(cinema, screen);

CREATE TABLE `member`(
  ID int(11) NOT NULL AUTO_INCREMENT,
  title char(15) DEFAULT NULL,
  name char(255) NOT NULL UNIQUE,
  joined date DEFAULT NULL,
  active char(31) DEFAULT NULL DEFAULT 'Active',
  role_type char(16) DEFAULT 'member',
  password char(100) NOT NULL,
  PRIMARY KEY (`ID`)
);


CREATE TABLE Booking(
    id int AUTO_INCREMENT,
    member int,
    performance int NOT NULL,
    seats int NOT NULL,
    Primary Key(ID),
    FOREIGN KEY (member) REFERENCES Member(ID),
    FOREIGN KEY (performance) REFERENCES Performance(ID)
    );

CREATE TABLE entrylogs(
    id int AUTO_INCREMENT,
    date DATE NOT NULL,
    time TIME NOT NULL,
    Primary Key(ID)
    );

