# Install risk-owner

```git clone https://github.com/Khalishi/risk-owner.git```

```composer install```

```cp .env.example .env```

```php artisan key:generate```

```php artisan migrate```

```php artisan serve```

# Seed admin log in details
```php artisan db:seed```

# Admin log in details

Username => admin@prosuiterisk.co.za
Password => password

# Seed risk owners

```php artisan db:seed --class=RiskOwnerSeeder```
