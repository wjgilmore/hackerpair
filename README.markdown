# HackerPair

[HackerPair](http://hackerpair.com) is the companion project to the
bestselling book, [Easy Laravel 5](http://easylaravelbook.com),
authored by [W. Jason Gilmore](http://www.wjgilmore.com).

## Installation

It's easy to run a local version of HackerPair. Presuming you've already
configured a local development environment using a solution such as
Homestead or Valet, you'll just need to follow these steps:

### Step #1. Clone HackerPair

Open a terminal and navigate to the location where you typically manage
your web projects. Then clone the HackerPair repository by executing the
following command:

    $ git@github.com:wjgilmore/hackerpair.git

### Step #2. Copy .env.example to .env

Enter the repository directory and copy the project configuration file
template (`.env.example`) to one which will be recognized by your local
HackerPair application (`.env`):

    $ cd hackerpair
    $ cp .env.example .env

Next, run the following command from your project's root directory:

    $ php artisan key:generate

This command will generate a new unique application key which will
subsequently be used by Laravel to encrypt various types of data used by
your application.

Next, open `.env` in your editor and update any relevant configuration
settings. Most notably you'll need to update those associated with connecting
to the database:

    DB_CONNECTION=mysql
    DB_HOST=local.mysql.com
    DB_PORT=3306
    DB_DATABASE=test_hackerpair
    DB_USERNAME=homestead
    DB_PASSWORD=secret

The project does not include a relational database such as MySQL,
meaning you'll need to install and configure one separately if you
haven't already done so. You'll also need to create the database and
associated settings, using these values to populate the above settings
in your `.env` file.

### Step #3. Run the Migrations

With the database credentials in place, it's time to build the database
schema. To do so you'll use Laravel Artisan's `migrate` command:

    $ php artisan migrate

After this command completes, have a look inside the project database
and you'll see quite a few tables have been created. Next we'll populate
several of these tables with seed data which will allow you to interact
with the application in an environment approximating reality.

### Step #4. Run the Zip Code Transmogrifier

A major goal behind the HackerPair project was to demonstrate how to
present highly localized data. In order to present the seed data in the
most realistic fashion possible, I assembled location data from a variety of
free online resources (see Credits) which matches zip codes with
latitudinal and longitudinal coordinates, cities, and states. This
information is used in the user and event seeders to aid in the generation
of seemingly realistic data.

Before this data can be used in the seeders, it needs to be compiled using
the following custom Artisan console command. The script will download two
source files from GitHub and http://federalgovernmentzipcodes.us/ (a free database containing zip code data), and then assemble a final seed file which will be used in Step #5:

    $ php artisan hackerpair:compile_zip_code_data

Once the command is completed, you'll find a new file inside `database/seeds/data`
named `hackerpair_zips.csv`. This file is used within the seeders to
generate location data.

### Step #5. Run the Seeder

Finally, run the Artisan seeder to populate the database with seed data:

    $ php artisan db:seed

The seeder requires a few minutes to run due to the time required to seed
the zip codes table.

## TODO

HackerPair is not yet "feature complete" so please don't complain about the project not yet including more advanced Laravel examples. I'll be adding those in the weeks to come.

The new edition of Easy Laravel 5 is in beta format, as is the HackerPair
companion project. Notably certain key features don't yet exist because
I haven't yet written the associated chapters. :-) For instance, there is
currently no or little support for:

* Query Optimization: Not all of the queries are optimized. Forthcoming.

* Search: I'm planning on integrating Algolia search, and additionally
  demonstrating how to create powerful search-driven data filters using
  scopes.

* Column sorting: This is a very high priority and should be integrated as soon
as I can write the companion instructional material.

* Event Lifecycle Improvements: All sorts of interesting concepts can be
introduced by adding event lifecycle features. Forthcoming.

* Analytics: There are lots of opportunities to simulate event and attendance
  generation, and then use advanced Eloquent queries to query the data in
  interesting ways.

* Event tagging: Currently only a simple event categorization solution is
  available. I plan on adding tagging using Spatie's great
  [Laravel Tags](https://docs.spatie.be/laravel-tags/v2/introduction) package.

* Avatars: Just for kicks I'd like to add avatars to user profiles

* Tests: A number of demonstrative tests are already in place but I'll
  be adding plenty more in the coming weeks.

* Mapping: Each event includes a simple map however I'd like to build out some
  additional cool map-based interfaces.

You can view a complete list of upcoming tasks and other notes on the
project's Trello board: https://trello.com/b/pqR9nbsH/hackerpair

## Credits

This zip code data was assembled from a variety of online resources,
including:

* FederalGovernmentZipCodes.us: http://federalgovernmentzipcodes.us/
* Eric Hurst's GitHub Gist: https://gist.github.com/erichurst/7882666

In addition, throughout the code you'll find the occasional "hat tip",
denoted by "HT", pointing to various online resources such as Stack
Overflow and blog posts which helped me sort out the associated code.

## License

This project is MIT licensed (see LICENSE.markdown). Please do not use the HackerPair name, the 
Easy Laravel 5 book cover, or other intellectual property without written permission from the appropriate parties.

## Questions

Have questions, problems, or suggestions? E-mail Jason at wj@wjgilmore.com.


