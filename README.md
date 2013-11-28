simple-blog
===========

Very ultra mega hyper simple Blog. A homework for Programming IV Course.

## Installation

What I need before:

- PHP 5.4+
- MySQL 5.5+
- [Composer](http://getcomposer.org/)
- [Apache](http://www.apache.org/) or [NGINX](http://nginx.com/)

Now just open you console and clone the repo

    $ git clone https://github.com/Jpuelpan/simple-blog simple-blog
    $ cd simple-blog

Install the dependencies

    $ composer install
    
Create the database.php from database-base.php and change the connection data

    $ cp database-base.php database.php
    
Then, load the database schema
    
    $ mysql -u user -p my-blog-db < database.sql

Finally run the server through Apache or NGINX or simply

    $ php -S localhost:8080 index.php


## Creadits

The credits go to:

- [Micro Framework Dispatch](https://github.com/noodlehaus/dispatch)
- [Eloquent ORM](https://github.com/illuminate/database)
- [Illuminate Validation](https://github.com/illuminate/validation)


The end :)
