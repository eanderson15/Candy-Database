CREATE TABLE candy_profile (
	candy_name VARCHAR(30) NOT NULL,
	sweet TINYINT(1) NOT NULL DEFAULT 1,
	bitter TINYINT(1) NOT NULL DEFAULT 1,
	k_approved VARCHAR(3) NOT NULL,
	type VARCHAR(20) DEFAULT NULL,
	salty TINYINT(1) NOT NULL DEFAULT 1,
	chocolate TINYINT(1) NOT NULL DEFAULT 1,
	crunchy TINYINT(1) NOT NULL DEFAULT 1,
	chewy TINYINT(1) NOT NULL DEFAULT 1,
	sour TINYINT(1) NOT NULL DEFAULT 1,
	PRIMARY KEY (candy_name));

DELIMITER $$
CREATE TRIGGER candy_numbers
	BEFORE INSERT ON candy_profile
	FOR EACH ROW
	BEGIN
		IF NEW.k_approved NOT IN ('no', 'yes') THEN
			SIGNAL SQLSTATE '23505' SET MESSAGE_TEXT = 'Value of k_approved is not \'yes\' or \'no\'';
		END IF;
		IF NEW.sweet < 1 OR NEW.sweet > 10 THEN
			SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of sweet rating out of range 1-10';
		END IF;
		IF NEW.bitter < 1 OR NEW.bitter > 10 THEN
			SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of bitter rating out of range 1-10';
		END IF;
		IF NEW.salty < 1 OR NEW.salty > 10 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of salty rating out of range 1-10';
                END IF;
		IF NEW.chocolate < 1 OR NEW.chocolate > 10 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of chocolate rating out of range 1-10';
                END IF;
		IF NEW.crunchy < 1 OR NEW.crunchy > 10 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of crunchy rating out of range 1-10';
                END IF;
		IF NEW.chewy < 1 OR NEW.chewy > 10 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of chewy rating out of range 1-10';
                END IF;
		IF NEW.sour < 1 OR NEW.sour > 10 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of salty rating out of range 1-10';
                END IF;
	END; $$
DELIMITER ;

CREATE TABLE nutrition_profile (
	candy_name VARCHAR(30) NOT NULL,
	calories SMALLINT(1) NOT NULL DEFAULT 0,
	tot_fat SMALLINT(1) NOT NULL DEFAULT 0,
	sat_fat SMALLINT(1) NOT NULL DEFAULT 0,
	cholesterol SMALLINT(1) NOT NULL DEFAULT 0,
	sodium SMALLINT(1) NOT NULL DEFAULT 0,
	tot_carbs SMALLINT(1) NOT NULL DEFAULT 0,
 	diet_fiber SMALLINT(1) NOT NULL DEFAULT 0,
	tot_sug SMALLINT(1) NOT NULL DEFAULT 0,
	protein SMALLINT(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (candy_name),
	FOREIGN KEY (candy_name) REFERENCES candy_profile (candy_name) ON DELETE CASCADE);

DELIMITER $$
CREATE TRIGGER nutrition_numbers
	BEFORE INSERT ON nutrition_profile
	FOR EACH ROW
	BEGIN
		IF NEW.calories < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of calories out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.tot_fat < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of total fat out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.sat_fat < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of saturated fat out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.cholesterol < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of cholesterol out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.sodium < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of sodium out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.tot_carbs < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of total carbohydrates out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.diet_fiber < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of dietary fiber out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.tot_sug < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of total sugars out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.protein < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of protein out of range: must be greater than or equal to 0';
                END IF;
	END; $$
DELIMITER ;

CREATE TABLE store (
	store_number INT(1) NOT NULL,
	name VARCHAR(100) NOT NULL,
	street VARCHAR(50) NOT NULL,
	city VARCHAR(30) NOT NULL,
	state CHAR(2),
	zip VARCHAR(10),
	country VARCHAR(56) NOT NULL,
	income DOUBLE(12, 2) NOT NULL DEFAULT 0,
	expenditures DOUBLE(12, 2) NOT NULL DEFAULT 0,
	payroll DOUBLE(12, 2) NOT NULL DEFAULT 0,
	profit DOUBLE(12, 2) NOT NULL DEFAULT 0,
	PRIMARY KEY (store_number));


DELIMITER $$
CREATE TRIGGER store_numbers
	BEFORE INSERT ON store
	FOR EACH ROW
	BEGIN
		IF NEW.store_number < 1 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of store number out of range: must be greater than or equal to 1';
                END IF;
		IF NEW.income < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of income out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.expenditures < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of expenditures out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.payroll < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of payroll out of range: must be greater than or equal to 0';
                END IF;
	END; $$
DELIMITER ;

CREATE TABLE store_inventory (
	store_number INT(1) NOT NULL,
	candy_name VARCHAR(30) NOT NULL,
	incoming INT(7) NOT NULL DEFAULT 0,
	supply INT(7) NOT NULL DEFAULT 0,
	PRIMARY KEY (store_number, candy_name),
	FOREIGN KEY (store_number) REFERENCES store (store_number) ON DELETE CASCADE,
	FOREIGN KEY (candy_name) REFERENCES candy_profile (candy_name) ON DELETE CASCADE);

DELIMITER $$
CREATE TRIGGER store_inventory_numbers
	BEFORE INSERT ON store_inventory
	FOR EACH ROW
	BEGIN
		IF NEW.incoming < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of incoming out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.supply < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of supply out of range: must be greater than or equal to 0';
                END IF;
	END; $$
DELIMITER ;

CREATE TABLE warehouse (
	ware_number INT(1) NOT NULL,
	ware_loc VARCHAR(75) NOT NULL,
	PRIMARY KEY (ware_number));

DELIMITER $$
CREATE TRIGGER warehouse_numbers
	BEFORE INSERT ON warehouse
	FOR EACH ROW
	BEGIN
		IF NEW.ware_number < 1 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of warehouse number out of range: must be greater than or equal to 1';
                END IF;
	END; $$
DELIMITER ;

CREATE TABLE warehouse_inventory (
	ware_number INT(1) NOT NULL,
	candy_name VARCHAR(30) NOT NULL,
	total INT(10) NOT NULL DEFAULT 0,
	for_shipping INT(10) NOT NULL DEFAULT 0,
	ship_stores INT(10) NOT NULL DEFAULT 0,
	ship_cust INT(10) NOT NULL DEFAULT 0,
	handling INT(10) NOT NULL DEFAULT 0,
	PRIMARY KEY (ware_number, candy_name),
	FOREIGN KEY (ware_number) REFERENCES warehouse (ware_number) ON DELETE CASCADE,
	FOREIGN KEY (candy_name) REFERENCES candy_profile (candy_name) ON DELETE CASCADE);

DELIMITER $$
CREATE TRIGGER warehouse_inventory_numbers
	BEFORE INSERT ON warehouse_inventory
	FOR EACH ROW
	BEGIN
		IF NEW.total < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of total out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.for_shipping < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of quantity for shippping out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.ship_stores < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of quantity for shipping to stores out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.ship_cust < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of quantity for shipping to customers out of range: must be greater than or equal to 0';
                END IF;
		IF NEW.handling < 0 THEN
                        SIGNAL SQLSTATE '22003' SET MESSAGE_TEXT = 'Numeric value of quantity in handling out of range: must be greater than or equal to 0';
                END IF;
	END; $$
DELIMITER ;

CREATE TABLE can_ship_to (
	ware_number INT(1) NOT NULL,
	candy_name VARCHAR(30) NOT NULL, 
	store_number INT(1) NOT NULL,
	PRIMARY KEY (ware_number, candy_name, store_number),
	FOREIGN KEY (ware_number, candy_name) REFERENCES warehouse_inventory (ware_number, candy_name) ON DELETE CASCADE,
	FOREIGN KEY (candy_name, store_number) REFERENCES store_inventory (candy_name, store_number) ON DELETE CASCADE);

CREATE TABLE flavors (
	candy_name VARCHAR(30) NOT NULL,
	flavor VARCHAR(20) NOT NULL,
	PRIMARY KEY (candy_name, flavor),
	FOREIGN KEY (candy_name) REFERENCES candy_profile (candy_name) ON DELETE CASCADE);
