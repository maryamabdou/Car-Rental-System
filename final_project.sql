CREATE DATABASE Car_Rental_System;
use Car_Rental_System;
CREATE Table Customer (
    National_id bigint ,
    cust_name varchar(50) not null,
    email varchar(50) not null,
    phone int not null ,
    password varchar(20) not null,
    primary key (National_id)
);

CREATE Table Admin (
    National_id bigint ,
    admin_name varchar(50) not null,
    email varchar(50) not null,
    phone int not null ,
    password varchar(20) not null,
    primary key (National_id)
);

CREATE Table car (
    plate_id varchar(20) ,
    model varchar(30) not null ,
    `year` int not null,
    office_loc varchar(30) not null,
    car_status varchar(20) not null,
    primary key (plate_id)
);

CREATE Table reserve(
    reserve_id int auto_increment,
    National_id  bigint not null,
    plate_id varchar(20) not null,
    start_date date not null,
    end_date date not null,
    unique(reserve_id),
    primary key(National_id, plate_id, start_date, end_date)
);

CREATE Table PickUp(
    reserve_id int,
    pickup_date date not null,
    primary key(reserve_id, pickup_date)
);

CREATE Table `Return`(
    reserve_id int,
    return_date date not null,
    primary key(reserve_id, return_date)
);

CREATE Table payment(
    reserve_id int not null,
    price decimal (10,2) not null,
    payment_date date not null,
    primary key(reserve_id,payment_date)
);

ALTER TABLE reserve ADD FOREIGN KEY (National_id) REFERENCES Customer(National_id);
ALTER TABLE reserve ADD FOREIGN KEY (plate_id) REFERENCES Car(plate_id);
ALTER TABLE payment ADD FOREIGN KEY (reserve_id) REFERENCES reserve(reserve_id);
ALTER TABLE PickUp ADD FOREIGN KEY (reserve_id) REFERENCES reserve(reserve_id);
ALTER TABLE `Return` ADD FOREIGN KEY (reserve_id) REFERENCES reserve(reserve_id);
