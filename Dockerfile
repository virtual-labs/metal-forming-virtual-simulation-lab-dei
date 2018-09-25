# Usage: Pulling Ubuntu-16.04
FROM ubuntu:12.04

# Usage: File Author/Maintainer
MAINTAINER vlead-systems "systems@vlabs.ac.in"

# Usage: Setting proxy environment
#ENV http_proxy "http://proxy.iiit.ac.in:8080"
#ENV https_proxy "http://proxy.iiit.ac.in:8080"

# Usage: Updating system
RUN apt-get update

# Usage: Installing dependencies for system operations
RUN apt-get install -y git sudo net-tools wget apache2 make php5 mysql-server

RUN mkdir metal-forming-virtual-simulation-lab-dei

COPY src/ /metal-forming-virtual-simulation-lab-dei/src

WORKDIR ./metal-forming-virtual-simulation-lab-dei/src

# Usage: Running make
RUN make 

# Usage: Copying lab sources into web server path
RUN bash ../src/database/db_config.sh
RUN cp ../src/database/virtuallab.sql /usr/local/Temp
RUN cp -r ../src/database/ODIN/* /usr/local/Temp/ODIN/
RUN cp -r ../src/database/libxml2-2.6.0/* /usr/local/Temp/libxml2-2.6.0/
RUN cp -r ../src/database/default/* /usr/local/Temp/default/
RUN cp ../src/database/Test.pdf /usr/local/Temp
RUN rm -rf /var/www/*
RUN cp -r ../build/* /var/www/
RUN bash ../src/database/apache_config.sh

EXPOSE 80
EXPOSE 443

# Usage: Setting permissions in /var/www 
RUN chmod -R 755 /var/www/*

CMD /usr/sbin/apache2ctl -D FOREGROUND
