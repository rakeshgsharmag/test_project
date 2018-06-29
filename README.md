## Requirements

- PHP 5.6 or higher

# Initial setup : Symfony 3.4

- No need to install symfony initially, follow given steps.

1. You may need to copy project folder in your root directory.
2. Import databse, .sql file has been attached along with project project ie. symfony_project.sql
3. Assuming you have composer installed on your computer, Update the project dependencies `$ composer update`
   If composer is not installed then  $ php composer.phar install or composer install
4. Run the application using PHP's built-in server with one of the following commands `$ php bin/console server:start` or `php bin/console server:run`, You will get your server url that you can paste in browser.

# PHP Unit testing:

-Symfony version : Symfony 3.4

Please do execute flowing commands before start with executing test scripts:

    1. Go to your project directory from terminal(Ubuntu)

    2. composer require --dev symfony/phpunit-bridge

    3. composer require --dev symfony/browser-kit symfony/css-selector

Once you successfully done executing above commands you are good to proceed for executing test cases, example is as follows:

Lets say you want to test for webservice of fetching teams listing :

    ./vendor/bin/simple-phpunit tests/AppBundle/Controller/TeamListTestCase.php

And similarly you can proceed for other test cases:

    ./vendor/bin/simple-phpunit tests/AppBundle/Controller/TeamAddTestCase.php

    ./vendor/bin/simple-phpunit tests/AppBundle/Controller/LeagueDeleteTestCase.php

    ./vendor/bin/simple-phpunit tests/AppBundle/Controller/TeamUpdateTestCase.php


