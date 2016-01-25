sudo pecl install Xdebug -y
sudo cp /vagrant/vagrant/xdebug /etc/php.d/xdebug.ini
sudo service php-fpm restart
sudo chkconfig iptables off
sudo service iptables stop
sudo yum install memcached -y
sudo cp /vagrant/vagrant/memcached /etc/sysconfig/memcached
sudo chkconfig --levels 235 memcached on
sudo /etc/init.d/memcached restart

sudo yum install telnet -y

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer