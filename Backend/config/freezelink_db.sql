
drop database if exists PANA16642022;
create database PANA16642022;
use PANA16642022;
create table Partner(
partner_id smallint unsigned auto_increment,
organisation_name varchar(60) not null,
equipment_donated varchar(40),
primary key (partner_id));

create table Supplier(
inventory_supplied varchar(50) not null,
qty_supplied smallint unsigned not null, 
date_received date, 
street_name varchar (30),
supplier_id mediumint unsigned auto_increment, 
company_name varchar(50) not null, 
street_number tinyint, 
town varchar(35),
region varchar (30),
primary key (supplier_id));

create table Employee( 
employee_id int unsigned auto_increment,
date_employed date,
first_name varchar (35) not null,
last_name varchar (45) not null,
department enum('Sales and Marketing', 'Research and Development',
'Human Resource Management' , 'Accounting and Finance' , 'Purchasing'),
street_name varchar (30),
street_number tinyint, 
town varchar(35),
region varchar (30),
email varchar(45), 
account_password varchar(250),
primary key(employee_id));

create table PartnerNumber(
tel_number varchar(13),
partner_id smallint unsigned,
primary key(tel_number),
foreign key (partner_id) references Partner(partner_id));

create table Warehouse(
warehouse_id smallint auto_increment,
employee_id int unsigned,
street_name varchar (30),
street_number tinyint, 
town varchar(35),
region varchar (30),
qty_of_inventory_warehouse_can_store smallint, 
primary key (warehouse_id),
foreign key (employee_id) references Employee(employee_id));

#table name was initially client, but it is an sql command, so Client was changed to Customer
create table Customer (
customer_id int unsigned auto_increment,
employee_id int unsigned,
first_name varchar (35) not null,
last_name varchar (45)not null,
street_name varchar (30),
street_number tinyint, 
town varchar(35),
region varchar (30), 
email varchar(120),
primary key (customer_id), 
foreign key (employee_id) references Employee(employee_id));

#when you compile add inventory name as an attribute and make price price per unit 
create table Inventory( 
inventory_id mediumint unsigned auto_increment ,
inventory_name varchar(45),
inventory_category enum('medicine', 'fruit', 'vegetables', 'meat', 'fish', 'dairy'),
warehouse_id smallint, 
qty_in_stock smallint, 
price decimal, 
primary key(inventory_id),
foreign key (warehouse_id) references Warehouse(warehouse_id));

create table Orders(
order_no int auto_increment primary key,
inventory_id mediumint unsigned, 
customer_id int unsigned,
qty_ordered mediumint,
foreign key (inventory_id) references Inventory(inventory_id), 
foreign key (customer_id) references Customer(customer_id));


create table Equipment(
equipment_id smallint unsigned primary key auto_increment, 
equipment_name varchar(50),
partner_who_donated smallint unsigned,
date_received date,
qty smallint,
foreign key (partner_who_donated) references Partner(partner_id));

create table Intern(
employee_id int unsigned primary key auto_increment,
University varchar (40), 
Major varchar (40),
foreign key (employee_id) references Employee(employee_id));
 
create table Fulltime(
employee_id int unsigned primary key , 
salary smallint unsigned, 
foreign key (employee_id) references Employee(employee_id));

create table Parttime(
employee_id int unsigned primary key, 
pay_per_hour decimal,
foreign key (employee_id) references Employee(employee_id));

create table EquipmentInventory(
equipment_id smallint unsigned, 
inventory_id mediumint unsigned ,
foreign key (equipment_id) references Equipment(equipment_id),
foreign key (inventory_id) references Inventory (inventory_id));

create table SuppliedInventory(
inventory_id mediumint unsigned,
supplier_id mediumint unsigned,
foreign key(supplier_id) references Supplier(supplier_id),
foreign key(inventory_id) references Inventory(inventory_id));

create table CustomerNumber(
tel_number varchar(13),
customer_id int unsigned,
primary key(tel_number),
foreign key (customer_id) references Customer(customer_id));



create table EmployeeNumber(
tel_number varchar(13),
employee_id int unsigned,
primary key(tel_number),
foreign key (employee_id) references Employee(employee_id)) ;


create table ContactUs(
	first_name varchar (20),
    last_name varchar (20),
    email varchar(50),
    message varchar(4000)
);