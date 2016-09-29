#!/bin/bash

#apt-get -q -y install mysql-server

mysqladmin -u root password newpassword

DATABASE_NAME="virtuallab"

mysql -u root -pnewpassword -Bse "create database $DATABASE_NAME;"
mysql -u root -pnewpassword -Bse "GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY 'newpassword' WITH GRANT OPTION;"

mkdir -p /usr/local/Temp
chmod 777 -R /usr/local/Temp
chown -R tomcat7:tomcat7 /usr/local/Temp
mysql -u root -pnewpassword "$DATABASE_NAME" < ../src/database/virtuallab.sql
mkdir -p /usr/local/Temp/ODIN
mkdir -p /usr/local/Temp/libxml2-2.6.0
mkdir -p /usr/local/Temp/default
