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

## Run application# PlusNarrative test


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
Admin user will be created with login details.

email: `admin@mail.com` / password: `password`

## Notification emails
Emails are sending to my MailTrap account. You can modify below details (.env file) to send to your own account

```bash
....
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=e6704d46d758ed
MAIL_PASSWORD=dab7b52c89eb8d
MAIL_ENCRYPTION=tls
...
```

## Run application

```bash
php artisan serve
```

Open Browser and type : `http://127.0.0.1:8000/`
 