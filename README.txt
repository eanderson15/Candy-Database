Made up most data
Some data found here (mostly for nutritional facts): https://fdc.nal.usda.gov/

Assuming the database has already been created
To create the tables:
mysql -u "username" -p "databasename" < create.sql

Creates the 8 tables:
can_ship_to (ware_number, candy_name, store_number)
candy_profile (candy_name, sweet, bitter, k_approved, type, salty, chocolate, crunchy, chewy, sour)
flavors (candy_name, flavor)
nutrition_profile (candy_name, calories, tot_fat, sat_fat, cholesterol, sodium, tot_carbs, diet_fiber, tot_sug, protein)
store (store_number, name, street, city, state, zip, country, income, expenditures, payroll, profit)
store_inventory (store_number, candy_name, incoming, supply)
warehouse (ware_number, ware_loc)
warehouse_inventory (ware_number, candy_name, total, for_shipping, ship_stores, ship_cust, handling)

Assumes the data (.csv files) is located in /tmp/dummy_data
If in folder directory ./taskB:
scp -r ./taskB/dummy_data /tmp

Assumes the lines of data in the file are terminated by '\r\n'
To load the tables:
mysql -u "username" -p "databasename" < load.sql

If tables need to be reset, deletes tables and data but not database
mysql -u "username" -p "databasename" < delete.sql