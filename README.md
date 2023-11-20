## Installation

1. ``composer install``
2. ``cp .env.example .env``
3. ``php artisan sail:install``. No service but app and mysql is required.
4. ``./vendor/bin/sail up -d``

App will be exposed on 80 port by default. I used sail configuration for quick setup, but of course you can use whatever you want.

The route for import is /api/import, and you need to pass the file as form-data param with "file" key.

If the file is not received, the application will take data from the public api
