# HackerPair

[HackerPair](http://hackerpair.com) is the companion project to the
bestselling book, [Easy Laravel 5](http://easylaravelbook.com),
authored by [W. Jason Gilmore](http://www.wjgilmore.com). The new edition of Easy Laravel 5 is currently available in beta version from [EasyLaravelBook.com](http://easylaravelbook.com) at a discounted price.

![Easy Laravel 5](https://github.com/wjgilmore/hackerpair/blob/master/public/img/book-small-web.png)

## Installation

It's easy to run a local version of HackerPair. Presuming you've already
configured a local development environment using a solution such as
Homestead or Valet, you'll just need to follow these steps:

### Step #1. Clone HackerPair

Open a terminal and navigate to the location where you typically manage
your web projects. Then clone the HackerPair repository by executing the
following command:

    $ git@github.com:wjgilmore/hackerpair.git

### Step #2. Update the Configuration Files

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

If you want to run the tests, you'll also need to update `.env.dusk.local` and `phpunit.xml`.

### Step #3. Update the Vue Configuration File

Inside `resources/assets/js` you'll find a file named `config.js.example`. This file contains a lone configuration variable named `GOOGLE_MAPS_API_KEY`. Rename it to `config.js` and assign this variable your Google Maps API key. This key is responsible for authentication when using Google's geocoder and map display APIs.

### Step #4. Run the Migrations

With the database credentials in place, it's time to build the database
schema. To do so you'll use Laravel Artisan's `migrate` command:

    $ php artisan migrate

After this command completes, have a look inside the project database
and you'll see quite a few tables have been created. Next we'll populate
several of these tables with seed data which will allow you to interact
with the application in an environment approximating reality.

### Step #5. Run the Seeder

Finally, run the Artisan seeder to populate the database with seed data:

    $ php artisan db:seed

I thought HackerPair would be much more interesting if the example events were associated with actual cities found throughout the United States. In order to present the seed data in the most realistic fashion possible, I assembled location data from a variety of free online resources (see Credits) which matches zip codes with latitudinal and longitudinal coordinates, cities, and states. This
information is used in the user and event seeders to aid in the generation
of seemingly realistic data. If you're repeatedly running the seeder then chances are you'll get tired of waiting a few additional seconds for the zip code data to load. If so just open up the `database/seeds/data/zips.csv` file and delete a bunch of the records.

### Step #6. Fire Up the Elixir Watcher

HackerPair uses Laravel Elixir to handle tedious tasks such as CSS and Vue compilation. You'll need to install Elixir and a few other npm packages using the following command:

    $ npm install

Then run the following command to build the CSS and Vue.js components:

    $ npm run watch

If you don't know what Elixir or npm is, check out chapter 2.

## Upcoming Features

HackerPair is not yet "feature complete" so please don't complain about the project not yet including more advanced Laravel examples. I'll be adding those in the weeks to come.

The new edition of Easy Laravel 5 is in beta format, as is the HackerPair
companion project. Notably certain key features don't yet exist because
I haven't yet written the associated chapters. :-) For instance, there is
currently no or little support for:

* Query Optimization: Not all of the queries are optimized. Forthcoming.

* Search and Column Sorting: I'm planning on integrating Algolia search, and additionally
  demonstrating how to create powerful search-driven data filters using
  scopes.

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

The header background was generated using the Google Maps styling created by Adam Krogh and found at [https://snazzymaps.com/style/38/shades-of-grey](Snazzy Maps).

## License

This project is MIT licensed (see LICENSE.markdown). Please do not use the HackerPair name, the Easy Laravel 5 book cover, or other intellectual property without written permission from the appropriate parties.

## Questions

Have questions, problems, or suggestions? E-mail Jason at wj@wjgilmore.com.
