## Digtastic Wordpress

This repo dives a bit further into the approach taken by [Jason Rhodes](https://github.com/jasonrhodes), in his great [WordPress Hacker's Guide to the Galaxy](https://github.com/jasonrhodes/wphg-project). I have injected a great deal of comments into the files, because this is not to go to production, but instead a set of sampler demos that I hope to keep documenting along with the code for future reference and exploration.

+ Added a second class for creating new taxonomies that are compatible with the custom post types
+ Fixed the problems with singular and plural labels for post types

## Requirements

+ PHP 5.4
+ Built on Wordpress 4.1 but I believe it is compatible with Wordpress 3.5

## Solved

+ WP-CLI does not allow to provide a path to a php.ini. Solved by installing with Composer

## Remember

+ The autoload directive is commented in wordpress.php
+ Composer packages can be installed by running `composer install`

## To run in localhost

+ Edit /etc/hosts and add the desired url
+ Edit /etc/apache2/extra/httpd-vhosts.conf add desired ServerName and DocumentRoot up to /public
+ Modify sample_environment to match database settings

## To do

+ Integrate CSS preprocessors
+ Code Highlighter
+ TLS
+ Checkout Buddy Press
+ Version Control db.sql?