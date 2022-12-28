INSERT INTO car(plate_id,model,`year`,office_loc,car_status) values
('1234','bmw','2022','cairo','active'),
('1245','mercedes','2018','alexandria','out of service'),
('4567','porche','2019','aswan','active'),
('8965','suzuki','2023','cairo','active'),
('1011','hunda','2024','cairo','active');


INSERT INTO customer(national_id,cust_name,email,phone,password) values
('12345678912345','maryam','maryam@gmail.com','01006203307','25042000'),
('98765432123456','shams','shams@gmail.com','01281063634','14022002'),
('87654321234567','youmna','youmna@gmail.com','01004903657','21052001'),
('12457898765432','youstina','youstina@gmail.com','01228901109','25112000');

INSERT INTO admin(national_id,admin_name,email,phone,password) values
('12345678912345','youstina','youstina@gmail.com','01228901109','25112000');

INSERT INTO reserve(national_id, plate_id, start_date, end_date) values
('12345678912345','1234','2022-12-22','2022-12-25'),
('98765432123456','1245','2022-12-23', '2022-12-30'),
('87654321234567','4567','2022-12-25','2022-12-31'),
('12345678912345','1011','2022-11-22','2022-11-25');

INSERT INTO PickUp(reserve_id,pickup_date) values
('1','2022-12-23'),
('2','2022-12-24'),
('3','2022-12-25');

INSERT INTO `Return`(reserve_id,return_date) values
('1','2022-12-24'),
('2','2022-12-30'),
('3','2022-12-29');

INSERT INTO payment(reserve_id, price , payment_date) values
('1','10000','2022-12-30'),
('2','20000','2022-12-25'),
('3','50000','2023-1-1');
