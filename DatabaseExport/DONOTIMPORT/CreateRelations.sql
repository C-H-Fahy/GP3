use orders;
SET foreign_key_checks = 1;
CREATE TABLE Cinema(
    id int unsigned AUTO_INCREMENT,    
    name char(255) NOT NULL UNIQUE,
    location char(255), 
    address text(511), 
    manager char(255),
    PRIMARY KEY(id)
    ) 
ENGINE=InnoDB;
CREATE TABLE Screen(
    cinema int unsigned, 
    screen int unsigned,
    seats int unsigned NOT NULL,
    price int unsigned NOT NULL,
    FOREIGN KEY(cinema) REFERENCES Cinema(id),
    PRIMARY KEY(cinema, screen)
    )
ENGINE=InnoDB;
CREATE TABLE Film(
    id int unsigned AUTO_INCREMENT,    
    released int, 
    title char(255) NOT NULL,
    director char(255),
    PRIMARY KEY(id)
    )
ENGINE=InnoDB;
ALTER TABLE Film
    ADD CONSTRAINT titledirector UNIQUE (title, director)   
;

CREATE TABLE Performance(
    id int unsigned AUTO_INCREMENT,
    cinema int unsigned NOT NULL,
    screen int unsigned NOT NULL,
    film int unsigned,
    date date,
    time time,
    PRIMARY KEY(id),
    FOREIGN KEY (cinema) REFERENCES cinema(ID), 
    FOREIGN KEY (film) REFERENCES Film(ID),
    FOREIGN KEY (cinema, screen) REFERENCES Screen(cinema, screen)
    )
ENGINE=InnoDB;
ALTER TABLE Performance 
    ADD CONSTRAINT Performance UNIQUE (cinema, screen, date, time);

CREATE TABLE Member(
    ID int unsigned NOT NULL AUTO_INCREMENT,
    title char(15),
    name char(255) NOT NULL UNIQUE,
    joined date DEFAULT NULL,
    active char(31) DEFAULT 'Active',
    role_type char(16) DEFAULT 'member',
    password char(100) NOT NULL,
    PRIMARY KEY (`ID`)
    )
ENGINE=InnoDB;


CREATE TABLE Booking(
    id int unsigned AUTO_INCREMENT,
    member int unsigned,
    performance int unsigned NOT NULL,
    seats int unsigned NOT NULL,
    Primary Key(ID),
    FOREIGN KEY (member) REFERENCES Member(ID),
    FOREIGN KEY (performance) REFERENCES Performance(ID) ON DELETE CASCADE
    )
ENGINE=InnoDB;

CREATE TABLE entrylogs(
    id int unsigned AUTO_INCREMENT,
    date DATE NOT NULL,
    time TIME NOT NULL,
    Primary Key(ID)
    )
ENGINE=InnoDB;

