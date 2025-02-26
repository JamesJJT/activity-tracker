# Activity Tracker

## Local setup

NB: Requires PHP >=8.2, and Node >=v22

- Clone repo
- Run `cp .env.example .env`
- Run `composer install`
- Run `npm install`
- Run `php artisan migrate`
- Run `composer dev`
- Navigate to `http://127.0.0.1:8000/`
- You can either register with a new account or use email: `test@user.com` password: `password`


## Tests

- If you have xdebug setup, you can run `composer test:coverage`
- If not, you can use `composer test`
