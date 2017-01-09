# One more PHP framework #
## Motivation ##
* Attempt to understand php more
* Better understanding of MVC framework and other design patterns
* Ultimately, make it a good framework for an e-commerce platform
* Have some fun!

## What I have till now ##
### Directory structure ###
* cache
  * empty directory at this point. Will 
  be useful when using an ORM, 
  like doctrine (data-mapper) or eloquent (active record) 
* config
  * config.php: This file returns the database info and other defined constants
* framework
  * At this point empty. Core framework files will be put here. 
  * Still need to figure out the sub-directory structure, I will leave that for the smarter me.   
* httpdocs
  * The web-root. The only web accessible directory. Contains only
   one file (index.php). We are following the front design pattern.
* logs
    * The log files for php will be stored in this directory.     
* src
    * Place all your code in this directory.
* tests
    * Place to put your unit tests
* vendor
    * Composer installs the dependency in this directory.
    
### Issues and fixes ###
* Composer not working (connection issue) - remember to cite sources:
  + Edit the /etc/gai.conf file, and uncomment the following line
   
   > precedence ::ffff:0:0/96  100
   
* Setting up your localhost to enable mod_rewrite (ubuntu 16.04)
  + First install apache2 (sudo apt-get install apache2)
  + Then enable mod_rewrite module (sudo a2enmod rewrite)
  + Open this file using your favourite text editor (emacs or vim, 
  if you do not use any of these, your cat might judge you) /etc/apache2/sites-enabled/000-default.conf 
  + And add the following lines:
  
     ```
     <Directory /var/www/html>
          Options Indexes FollowSymLinks MultiViews
          AllowOverride All
          Order allow,deny
          allow from all
     </Directory>
     ```
  
  + Restart apache2, and create your .htaccess file in the web accessible folder.   
### Some question in my mind, and their attempted answers ###
* Why use front end design pattern?

> Better security. Not possible for the 
    end user to reach
    any other file. 
    
* Should I use ORM (Doctrine) or DBAL (PDO)

> Initially, in the infancy of the framework, it makes sense to
       use PDOs. They are faster, and the author has some
       experience writing them. As the size of the database increases,
       an ORM like doctrine might be a better choice. With caching, the speed
       should be about the same as PDO, and it will help the user to write
       better complex queries (Is ORM an adapter pattern?)
       
* How does Autoloading work?

> To autoload files using composer, just add them to the composer.json file, and use the psr-4 key.        