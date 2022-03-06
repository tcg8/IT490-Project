All files created and tested in /var/www/html

Error logs are directed to git/rabbitmqphp_example/FrontEnd/Logs
Error reporting code is included but not completely functional

You will have to edit your configuration files for apache

A virtual host file needs to be created/edited
/etc/apache2: apache2.config

/etc/apache2/sites-available: 
/etc/apache2/sites-enabled:

    A symbolic link will need to be created to make the site available. The configuration file needs to be created/edited to point to login.php
