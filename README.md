TP Fdj Application
========================

This is a TP only :-)

Requirements
------------

  * PHP 5.5.9 or higher;
  * PDO-SQLite PHP extension enabled;
  * and the [usual Symfony application requirements](http://symfony.com/doc/current/reference/requirements.html).

Please download the TP and
browse the `http://localhost:8000/config.php` script to get more detailed
information.

Installation
------------

1. Git clone  (in your local)
2. Run cmd (Windows) and go to the folder, then change the environment mode to 'dev'
3. Run composer update
4. Please copy the i**.sqlite data file in the folder var/data/ 

Usage
-----
For the general products list : your local link + /v1/products
For the active products list : your local link + /v1/products/1
For the inactive products list : your local link + /v1/products/0
For error message 400, you can use  your local link + /v1/products/+d(>1) and the message is stocked in a log file
