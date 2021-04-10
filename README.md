
# ![sort and visualization from spreadsheet Page App]


# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)



Clone thus repository

    git clone {current repo}

Switch to the repo folder

    cd {your app}

Install all the dependencies using composer

    composer install && composer update

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate:fresh --seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Open the DummyDataSeeder and set the property values as per your requirement

    database/seeds/DummyDataSeeder.php

Run the database seeder and you're done

    php artisan db:seed

***Note*** : this app doesn't contain any seeds or migrations but all above notes and commands for the future  

    php artisan migrate:refresh
    



----------

# Code overview


## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/ProductsController` - Contains all the controller of rendering products page.
- `app/services/products` - Contains all the logic required to fetch products information.
- `app/Local` - Contains all attributes required to manipulate persistent storage of localization element. 
- `app/Products` - Contains all attributes required to manipulate persistent storage. of products element.
- `app/Regions` - Contains all attributes required to manipulate persistent storage. of regions element.
- `config` - Contains all the application configuration files.
- `database/migrations` - Contains all the database migrations.
- `database/seeds` - Contains the database seeder.
- `routes` - Contains all the web routes defined in api.php file.


## Environment variables

- `.env` - Environment variables can be set in this file

## your route to test 

- `route` - /Visualizing

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.


  
