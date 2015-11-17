#!/bin/bash
# To avoid prompt for user credentials
export DEBIAN_FRONTEND=noninteractive
apt-get -q -y install mysql-server
# mysql -u root -Bse "create database YOUR_DATABAS;"
mysql -u root -Bse "create database virtuallab.sql;"
cd ../src/database
# Replace "emt" with your database name
# Replace "emt.sql" file with your file
# Note: If you have more than one .sql file repeat below command w.r.t to database and file name
mysql -u root virtuallab<virtuallab.sql
