#!/bin/sh

apk update
apk add mc autoconf gcc g++ make
pecl channel-update pecl.php.net
pecl install xdebug
pecl install apcu-stable
# XDEBUG
echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20170718/xdebug.so" > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.default_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.remote_host=172.18.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.profiler_enable=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.profiler_enable_trigger=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
echo "xdebug.profiler_output_dir=\"/tmp\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# OPCACHE
echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20170718/opcache.so" > /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
# APCU
echo "extension=apcu.so" > /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini && \
echo "apc.enable_cli=1" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"