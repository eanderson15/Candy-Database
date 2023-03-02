LOAD DATA LOCAL INFILE '/tmp/dummy_data/candy_profile.csv'
INTO TABLE candy_profile
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(candy_name, sweet, bitter, k_approved, type, salty, chocolate, crunchy, chewy, sour);

LOAD DATA LOCAL INFILE '/tmp/dummy_data/store.csv'
INTO TABLE store
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(store_number, name, street, city, state, zip, country, income, expenditures, payroll, profit);

LOAD DATA LOCAL INFILE '/tmp/dummy_data/warehouse.csv'
INTO TABLE warehouse
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(ware_number, ware_loc);

LOAD DATA LOCAL INFILE '/tmp/dummy_data/flavors.csv'
INTO TABLE flavors
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(candy_name, flavor);

LOAD DATA LOCAL INFILE '/tmp/dummy_data/nutrition_profile.csv'
INTO TABLE nutrition_profile
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(candy_name, calories, tot_fat, sat_fat, cholesterol, sodium, tot_carbs, diet_fiber, tot_sug, protein);

LOAD DATA LOCAL INFILE '/tmp/dummy_data/store_inventory.csv'
INTO TABLE store_inventory
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(store_number, candy_name, incoming, supply);

LOAD DATA LOCAL INFILE '/tmp/dummy_data/warehouse_inventory.csv'
INTO TABLE warehouse_inventory
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(ware_number, candy_name, total, for_shipping, ship_stores, ship_cust, handling);

LOAD DATA LOCAL INFILE '/tmp/dummy_data/can_ship_to.csv'
INTO TABLE can_ship_to
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(ware_number, candy_name, store_number);
