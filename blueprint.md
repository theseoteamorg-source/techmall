# Project Blueprint

## Overview

This project is a full-stack e-commerce application built with Laravel. The goal is to create a robust and scalable platform for selling products online.

## Implemented Features

### Database Schema

*   **products**: Stores product information, including name, description, price, and relationships to categories and brands.
*   **categories**: Stores product categories.
*   **brands**: Stores product brands.
*   **users**: Stores user information for authentication.
*   **customers**: Stores customer information for orders.
*   **orders**: Stores order information.
*   **order_items**: Stores the items within each order.
*   **coupons**: Stores coupon information for discounts.
*   **payment_methods**: Stores available payment methods.
*   **posts**: Stores blog post information.
*   **post_categories**: Stores blog post categories.
*   **post_tags**: Stores blog post tags.
*   **pages**: Stores static pages.
*   **media**: Stores media files.
*   **deals**: Stores information about special deals.
*   **shipments**: Stores shipment information for orders.
*   **reviews**: Stores product reviews.
*   **sliders**: Stores information for homepage sliders.
*   **settings**: Stores general application settings.
*   **currencies**: Stores currency information.
*   **redirects**: Stores URL redirect information.

### Models

*   `Product`: Eloquent model for the `products` table.
*   `Category`: Eloquent model for the `categories` table.
*   `Brand`: Eloquent model for the `brands` table.
*   `User`: Eloent model for the `users` table.

### Controllers

*   `CategoryController`: Resourceful controller for managing categories in the admin panel.
*   `BrandController`: Resourceful controller for managing brands in the admin panel.

### Views

*   **Admin/Categories**: Views for listing, creating, and editing categories.
*   **Admin/Brands**: Views for listing, creating, and editing brands.
*   **Shop/Index**: The main homepage of the e-commerce store, featuring a dynamic hero slider, a product listing, and a features section highlighting key customer benefits.

## Current Task: UI and Configuration

*   **Product Card Layout:** Corrected the product card layout in `shop.index.blade.php` to ensure the price and "Add to Cart" button are displayed on separate lines for a cleaner look.
*   **Star Rating:** Implemented a star rating system for products, which is now displayed on the product cards.
*   **Currency and Country:** Configured the application to use "Rs" as the currency symbol and "Pakistan" as the country. This was done by updating the `config/settings.php` file and the `shop.index.blade.php` view.

## Next Steps

*   Create views to display the `categories` and `brands` on the frontend.
