ONE-TIME SECRET
===============

This project allows the user to create a one-time self-destructing link to transfer sensitive information to someone
else. In order for this application to work across the internet, a server needs to be set up with a personalised domain.
This is beyond the scope of this project, and it will only work in a local environment if not set up on a publicly
available web server.

## Setup Instructions

1. Clone the project from the [GitHub Repository](https://github.com/safrique/one-time-secret)
2. Create a copy of the `.env.example` file and name it `.env`. As there are no proprietary secrets in this project,
   this action is acceptable. It would not be under normal circumstances.
3. Ensure the `DB_USERNAME` & `DB_PASSWORD`  in the `.env` file are the same as your local database credentials.
4. Create a database called `one-time-secret` on your local database setup.
5. From within the project directory, run the following commands to install the relevant dependencies, create the
   relevant config cache, set up the required database table, as well as to serve the application via the Laravel mock
   server.

```bash
composer install
php artisan config:clear
php artisan clear-compiled
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan migrate
php artisan serve
```

6. Open http://127.0.0.1:8000/ in a browser window to see the project interface.

## Instructions

1. On the home page, under the __Secret__ heading, replace the placeholder text with the information you would like to
   transfer discretely and click the __Generate Link__ button.
2. Click the __Copy Link__ button to copy the generated link to the clipboard.
3. Pass this link onto the person you want to give the information to, to open in a browser window. *Keep in mind 
   this will only work locally for this project!*
4. *Please remember that the link self-destructs when used and the secret information can no longer be retrieved once
   destructed!*

### Delete old links

Links are valid for 7 days and will self-destruct if not used within this timeframe. An Artisan
command `php artisan secret:delete` will delete all expired links. This command has been put onto a scheduler that will
run every hour via the Laravel cron. In order for this to work as expected, the cron has to be set up on the web 
server. It can however be tested by running the above command in the console. This is also covered in the automated 
tests.

### Testing

Some automated PHPUnit tests have been included. A limited suite of tests were included due to time constraints, but the
main APIs are being tested.

To run the tests, run the following command from within the project directory:

```bash
php artisan test
```
