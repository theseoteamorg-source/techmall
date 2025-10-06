# TechMall E-Commerce Platform

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <a href="#">
    <img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License">
  </a>
  <a href="#">
    <img src="https://img.shields.io/badge/PRs-welcome-brightgreen.svg" alt="PRs Welcome">
  </a>
</p>

## About TechMall

TechMall is a full-stack e-commerce web application built on the Laravel framework. It provides a modern, user-friendly interface for customers to browse and purchase tech products. It also includes a comprehensive admin panel for managing the entire store, from products and orders to content and users.

This project serves as a demonstration of building a complex, real-world application with Laravel, incorporating best practices and a rich feature set.

## Features

### Frontend
*   **Responsive Design:** Fully responsive and mobile-friendly layout.
*   **Product Catalog:** Browse products by category and brand.
*   **Advanced Filtering:** Filter products by price, brand, and attributes.
*   **Product Details:** View detailed product information, image galleries, and customer reviews.
*   **Shopping Cart:** A fully functional cart to add, update, and remove items.
*   **Checkout:** A multi-step checkout process with support for custom payment methods.
*   **User Accounts:** Customer registration, login, and a dashboard to view order history.
*   **Blog & Pages:** A content management system for blog posts and static pages.

### Admin Panel
*   **Dashboard:** An overview of store performance with KPIs and charts.
*   **Product Management:** Full CRUD for products, including variants, images, and SEO.
*   **Order Management:** View and process customer orders, and update order statuses.
*   **Content Management:** Manage blog posts, categories, tags, and static pages.
*   **User Management:** Manage customer and admin accounts.
*   **Store Settings:** Configure general store settings, payment methods, and more.

## Getting Started

### Prerequisites
*   PHP >= 8.1
*   Composer
*   Node.js & NPM
*   A database server (e.g., MySQL, PostgreSQL, SQLite)

### Installation
1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/techmall.git
    cd techmall
    ```

2.  **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3.  **Set up your environment:**
    *   Copy the `.env.example` file to `.env`:
        ```bash
        cp .env.example .env
        ```
    *   Generate an application key:
        ```bash
        php artisan key:generate
        ```
    *   Configure your database credentials in the `.env` file.

4.  **Run database migrations and seeders:**
    ```bash
    php artisan migrate --seed
    ```

5.  **Compile frontend assets:**
    ```bash
    npm run dev
    ```

6.  **Start the development server:**
    ```bash
    php artisan serve
    ```

    You can now access the application at `http://127.0.0.1:8000`.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
