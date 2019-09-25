FROM wordpress:5.0.0

ADD flag.txt /tmp/flag.txt
ADD --chown=www-data:www-data ./wp-content /var/www/html/wp-content
ADD ./wp-config.php /var/www/html/wp-config.php