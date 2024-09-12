# Coding Challenge

## Project Overview
This is a Laravel/Vue.js application to manage products and categories.

## Features
- Create products via Web and CLI.
- List products with sorting by price and filtering by category.

## Setup Instructions
1. Clone the repository.
2. Run `composer install` and `npm install`.
3. Set up `.env` file for database configuration.
4. Run `php artisan migrate` to create tables.
5. Start the application with `php artisan serve` and `npm run dev`.

## Automated Tests
To run tests, use:
`php artisan test`

## Command Line Interface (CLI)
- to create products via the command line
`php artisan product:create "Product Name" "Product Description" 99.99 "path/to/image.jpg"`
- name: Product name (required).
- description: Product description (required).
- price: Product price (required).
- image: path to the product image (Optional).
