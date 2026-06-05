# Laravel Product CRUD App

A simple Laravel application for managing products. It supports basic CRUD features: create, read, update, and delete product data.

## Features

- View all products
- Add a new product
- Edit an existing product
- Delete a product
- Validate product input
- Show simple dashboard stats:
  - Total products
  - Total stock
  - Estimated product value
- Clean responsive UI using plain CSS

## Tech Stack

- PHP 8.2
- Laravel 12
- Blade
- CSS
- MySQL or SQLite
- Pest / PHPUnit

## Main Files

- `app/Models/Product.php`  
  Product model.

- `app/Http/Controllers/ProductController.php`  
  Handles product CRUD logic.

- `resources/views/products/index.blade.php`  
  Product list and dashboard page.

- `resources/views/products/create.blade.php`  
  Form page for creating a product.

- `resources/views/products/edit.blade.php`  
  Form page for editing a product.

- `public/product-ui.css`  
  Custom CSS for the product pages.

- `database/migrations/2026_06_05_114647_create_products_table.php`  
  Migration for the products table.

## Installation

Install PHP dependencies:

```bash
composer install
```

Create the `.env` file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Set your database configuration in `.env`, then run:

```bash
php artisan migrate
```

## Run the App

Start the Laravel server:

```bash
php artisan serve
```

Open this URL in your browser:

```text
http://127.0.0.1:8000/product
```

## Product Routes

| Method | URL | Route Name | Description |
| --- | --- | --- | --- |
| GET | `/product` | `product.index` | Show all products |
| GET | `/product/create` | `product.create` | Show create product form |
| POST | `/product` | `product.store` | Save a new product |
| GET | `/product/{product}/edit` | `product.edit` | Show edit product form |
| PUT | `/product/{product}/update` | `product.update` | Update a product |
| DELETE | `/product/{product}/delete` | `product.delete` | Delete a product |

## Product Fields

Each product has:

- `name`
- `quantity`
- `price`
- `description`

## Run Tests

```bash
php artisan test --compact
```

## UI Note

The product pages use `public/product-ui.css`, so the UI works without running `npm run dev` or `npm run build`.
