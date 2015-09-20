simple-blog
===========

[![Join the chat at https://gitter.im/Jpuelpan/simple-blog](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/Jpuelpan/simple-blog?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Very ultra mega hyper simple Blog. A homework for Programming IV Course.

## Installation

What I need before:

- PHP 5.4+
- MySQL 5.5+
- [Composer](http://getcomposer.org/)
- [Apache](http://www.apache.org/) or [NGINX](http://nginx.com/)

Now just open your terminal and clone the repo.

    $ git clone https://github.com/Jpuelpan/simple-blog simple-blog
    $ cd simple-blog

Install the dependencies.

    $ composer install
    
Create the database.php from database-base.php and change the connection data.

    $ cp database-base.php database.php
    
Then, load the database schema
    
    $ mysql -u user -p my-blog-db < database.sql

Finally run the server through Apache, NGINX or simply

    $ php -S localhost:8080 index.php


## Credits

The credits go to:

- [Micro Framework Dispatch](https://github.com/noodlehaus/dispatch)
- [Eloquent ORM](https://github.com/illuminate/database)
- [FuelPHP Validation](https://github.com/fuelphp/validation)
- [Bootstrap](https://github.com/twbs/bootstrap)
- [CKEditor](http://ckeditor.com/)


The end :)
