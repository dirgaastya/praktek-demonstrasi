
| Name                       | Universitas                | Kelompok  |
| -------------------------- | -------------------- | ------ |
| Dirga Astya Wisnuwardana | ARS University | A |
## Setup Laravel Packages and Migrations



### Make sure you do this before setup on bash

- PHP version is on version 8.2
- .env File is available or exists
- Change database config on .env file
- Composer installed

### Bash Usage

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install && npm run dev
php artisan migrate
php artisan db:seed
php artisan serve
```
