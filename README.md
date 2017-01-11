# One more PHP framework #
## Motivation ##
* Attempt to understand php more
* Better understanding of MVC framework and other design patterns
* Ultimately, make it a good framework for an e-commerce platform
* Have some fun!

## Task List ##

- [x] Create a git repository
- [x] Create a directory structure
- [ ] Strictly follow PSR naming conventions
- [ ] Implement MVC architecture
- [ ] Use HTTPFoundation from Symphony
- [ ] Write the routing functionality (from scratch)
- [ ] Use Swiftmailer (MIT license) 

- [ ] Fix routing (Using symphony routing component, need to find something better or faster)
- [ ] Port all framework related functions to a controller directory inside the framework sub-directory  
- [ ] Write a small app so that users can test it
- [ ] Write a simple unit test to test the framework functions (before writing the functions themselves)
- [ ] Use PHPMD (PHP Mess Detector) to analyze the project's cyclomatic complexity score

## Design Pattern / Principles used (till now -subject to change anytime) ##
* Front Design pattern (All requests are routed to only one file in the webroot)
* MVC (Model View Controller) - Separation of concerns - Separate logic from data and view
* To implement - Convention over configurations ()
* Debating whether to use Active Record Pattern (Eloquent) or Data mapper (Doctrine2). Might
go with a faster DBAL like PDO (cannot see the point of using the DBAL from doctrine).
* Defining database class as abstract. The reasoning behind this is that database class itself not 
instantiated, but child classes like MySql are.
* Might use interface for payment class, this would allow the users to define their own logic.



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
   
   ```
   precedence ::ffff:0:0/96  100
   
   ```
   
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