<p align="center"><img src="https://plusnarrative.com/2021/wp-content/themes/plusnarrative/public/img/logo-plusnarrative.svg" width="400"></p>

# PlusNarrative test


 Hi, this is techinical test by PlusNarrative assigned to Africa Matji

## Installation

Navigate to project directory
`cd plus-assessment`

```bash
composer install
```
```bash
npm install
```
## Environment setup
```bash
cp .env.example .env
```
Create a mysql database named `plus`

Edit following details in `.env` file to match yours
```bash
...
DB_DATABASE=plus
DB_USERNAME=YOUR_USERNAME
DB_PASSWORD=YOUR_PASSWORD
```

## Migration and Seeding
Please run below commands in this order.
```bash
php artisan migrate
php artisan db:seed --class=PermissionTableSeeder
php artisan db:seed --class=CreateUserSeeder
```

## Run application

```bash
php artisan serve
```

Open Browser and type : `http://127.0.0.1:8000/`