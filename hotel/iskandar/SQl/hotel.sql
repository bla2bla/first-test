drop database hotel;
CREATE DATABASE hotel;
use hotel;

/*
DROP USER 'ana'@'localhost';
SHOW GRANTS FOR 'ana'@'localhost';
CREATE USER 'ana'@'localhost' IDENTIFIED BY 'bass';
GRANT ALL PRIVILEGES ON * . * TO 'ana'@'localhost';
FLUSH PRIVILEGES;
*/







CREATE TABLE clients(
    clientID INT auto_increment ,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) ,
    fname VARCHAR(50) ,
    lname VARCHAR(50) ,
    constraint clientID primary key(clientID)
);
CREATE TABLE rooms(
    roomID INT auto_increment ,
    nbeds int,
    nfloor int,
    roomType varchar(50),
    price int,
    constraint roomID primary key(roomID)
);

CREATE TABLE books(
    bookID INT auto_increment ,
    clientID INT  ,
	roomID INT  ,
    dateFrom date,
    dateTo date,
    constraint bookID primary key(bookID),
    constraint clientIDfk foreign key(clientID) references clients(clientID),
    constraint roomIDfkforeign foreign key(roomID) references rooms(roomID)
);


CREATE TABLE payment(
    paymentID INT auto_increment ,
    bookID INT  ,
	name  VARCHAR(50) ,
    card_number VARCHAR(15)  ,
    zip VARCHAR(5)  ,
    card_type  VARCHAR(20),
    total int ,
    constraint paymentID primary key(paymentID),
    constraint bookID foreign key(bookID) references books(bookID)
);


INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (2,1,"good",450);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (1,1,"normal",150);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (2,1,"good",450);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (1,1,"good",200);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (2,1,"normal",250);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (2,1,"normal",250);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (3,1,"good",350);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (2,1,"good",250);

INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (1,2,"good",250);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (3,2,"good",500);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (2,2,"good",450);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (3,2,"good",500);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (5,2,"good",550);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (4,2,"normal",300);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (4,2,"normal",300);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (3,2,"normal",300);

INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (4,3,"normal",400);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (1,3,"good",300);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (3,3,"good",300);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (5,3,"good",450);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (3,3,"normal",300);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (5,3,"good",400);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (1,3,"good",200);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (2,3,"normal",300);

INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (3,4,"normal",300);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (1,4,"good",200);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (4,4,"good",400);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (5,4,"good",450);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (3,4,"normal",300);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (5,4,"good",400);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (1,4,"good",200);
INSERT INTO rooms(nbeds,nfloor,roomType, price) VALUES (2,4,"normal",300);






INSERT INTO clients(email,password,fname,lname) VALUES ("iskandar11khorchi@gmail.com","bla2bla","iskandar","khorchi");


INSERT INTO books(clientID,roomID,dateFrom,dateTo) VALUES (1,2,"2021-02-04","2022-03-08");
INSERT INTO books(clientID,roomID,dateFrom,dateTo) VALUES (1,14,"2021-02-04","2021-03-08");






/* les chambre li mrizarviyyin*/
select rooms.roomID,nbeds,nfloor,dateFrom,dateTo from rooms left join books on rooms.roomID=books.roomID where dateTo>CURDATE()  ;

/** hay hi yakiiii yyyaaaaa  */
/* les chambre lfarghine */
select rooms.roomID,nbeds,nfloor,roomType,price from rooms left join books on rooms.roomID=books.roomID where rooms.roomID NOT IN (select rooms.roomID from rooms left join books on rooms.roomID=books.roomID where dateTo>CURDATE()  )   ;

/* bash na3ref la chambre li rahou hajazha */
select fname,lname, roomID, dateFrom,dateTo from clients inner join books on clients.clientID=books.clientID ;

select * from clients;
select * from rooms;
select * from books;	
select * from payment;

SELECT * FROM books WHERE clientID=2 and roomID=8 and dateFrom="2021-06-22" and dateTo ="2021-06-22";

SELECT * FROM books WHERE clientID=3 and dateTo<="2022-06-22" ;


INSERT INTO payment(bookID,name,card_number,zip,card_type,total) VALUES (1,"iskandar","123456789",1001,"paypal","1500");


drop table payment;

use hotel;
select * from clients;

