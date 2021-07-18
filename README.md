## Introduction

A shopping cart app created with Laravel.

### Available features:

-   CRUD operations.
-   Search item by its name.
-   Sort item by its name or price.
-   List view: item prices can be displayed in one of three available currencies (EUR, GBP or USD).
-   Add to cart/update cart/remove from cart with AJAX.

## Launch instructions:

-   If you do not have composer installed on your system, install it (installation instructions [here](https://getcomposer.org/download)).
-   Clone this repository or download it as a ZIP package.
-   Open it with Visual Studio Code or your preferred code editor.
-   Create a fresh schema in your MySQL server.
-   Rename **'.env.example'** file to **'.env'** inside of the project's root directory and configure the database information.
-   Using GitBash, CMD or other terminal in your code editor:
    -   if composer is installed locally: run **php <'path to composer.phar file location'>/composer.phar install**
    -   if composer is installed on your system globally: run **composer install**
-   Run **php artisan key:generate**
-   Run **php artisan migrate** to create tables.
-   Run **php artisan db:seed** to fill tables with data.
-   Run **php artisan serve**
-   Follow the link that appears in the terminal after running 'php artisan serve'.

## Notes:

Need to be logged in to access create/update/delete features.

## Test login detais:

E-mail: admin@admin.com
Password: 123456789

**Note:** Only works if **php artisan db:seed** step was not skipped.

## Author:

[Vytautas K.](https://github.com/VytautasKaz)
