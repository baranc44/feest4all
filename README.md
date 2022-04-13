# Appuren - Powered by DE-IT
Appuren - A project by DE-IT

## Installation
- `git clone https://github.com/de-it-projects/app-uren.git .`
- Edit `.env` and set your database & email connection details
- `composer i`
- If you get an error saying the packages are not on the right version try using this command instead
- `composer install --ignore-platform-reqs`
- `npm i`
- `php artisan migrate:fresh`
