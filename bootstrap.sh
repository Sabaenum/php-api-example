#filename: Vagrantfile.provision.sh
#!/usr/bin/env bash

sudo apt-get install apache2 libapache2-mod-fastcgi apache2-mpm-worker mysql-server
echo "ServerName localhost" > /etc/apache2/httpd.conf
VHOST=$(cat <<EOF
    <VirtualHost *:80>
      DocumentRoot "/vagrant"
      ServerName api-example.ky
      ServerAlias app.dev
      <Directory "/vagrant">
        AllowOverride All
        Require all granted
      </Directory>
    </VirtualHost>
EOF
)


echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf
a2enmod actions fastcgi rewrite

sudo debconf-set-selections <<< 'mysql-server-5.6 mysql-server/root_password password password'
sudo debconf-set-selections <<< 'mysql-server-5.6 mysql-server/root_password_again password password'

apt-get install -y mysql-server-5.6 mysql-client-5.6 mysql-common-5.6

mysql -uroot -ppassword -e "CREATE DATABASE IF NOT EXISTS test_api;";
mysql -uroot -ppassword -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'password';"
mysql -uroot -ppassword -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY 'password';"

sudo service mysql restart

add-apt-repository ppa:ondrej/php
apt-get update
apt-get install -y python-software-properties software-properties-common

apt-get install -y php7.1
apt-get install -y php7.1-mysql
apt-get install -y mcrypt php7.1-mcrypt
apt-get install -y php7.1-cli php7.1-curl php7.1-mbstring php7.1-xml php7.1-mysql
apt-get install -y php7.1-json php7.1-cgi php7.1-gd php-imagick php7.1-bz2 php7.1-zip

apt-get install -y libapache2-mod-php7.1

sudo service apache2 restart
# ---------------------------------------------------------------------------------------------------------------------
echoTitle 'Virtual Machine Setup'
# ---------------------------------------------------------------------------------------------------------------------


echoTitle "Your machine has been provisioned"
echo "-------------------------------------------"
echo "MySQL is available on port 3306 with username 'root' and password 'password'"
echo "(you have to use 127.0.0.1 as opposed to 'localhost')"
echo "Apache is available on port 80"
echo -e "Head over to http://192.168.33.78 to get started"