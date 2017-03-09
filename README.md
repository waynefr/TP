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

1. Clone this project locally (command line: git clone git@github.com:waynefr/TP.git)
2. Open the Command Prompt or run cmd directly (in Windows, e.g.) and go to the project folder
3. Run "composer update"
4. Please copy the i**.sqlite data file in the folder var/data/
5. Run "php app/console server:run"


Usage
-----
Type the link "localhost:8000/v1/products" in a web browser
  * For the general products list : localhost:8000/v1/products
  * For the active products list : localhost:8000/v1/products/1
  * For the inactive products list : localhost:8000/v1/products/0
  * For error message 400, you can use  localhost:8000/v1/products/+d(>1) and the message is stocked in a log file