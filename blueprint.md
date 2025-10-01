# Project Blueprint: Techmall (Journal Theme Replication)

## 1. Overview

This document outlines the definitive plan to redesign **Techmall** (techmall.pk) as a 100% faithful replication of the popular "Journal" e-commerce theme. The goal is to create a clean, modern, professional, and feature-rich online store with a highly modular and customizable structure. The homepage will be built with the maximum number of sections to showcase the theme's versatility.

## 2. Style, Design, and Features

### 2.1. Aesthetics & Branding (Journal Theme Default Style)

*   **Theme:** Clean, professional, and highly modular. The design is structured, user-friendly, and conversion-focused, typical of top-tier e-commerce templates.
*   **Color Palette:**
    *   **Primary/Brand:** A standard, professional Blue (`#007bff`).
    *   **Background:** Clean White (`#FFFFFF`).
    *   **Surface/Modules:** A very light gray (`#F8F9FA`) for module backgrounds to create subtle separation.
    *   **Text:** Dark Charcoal (`#212529`).
    *   **Borders:** Light Gray (`#DEE2E6`) for clear, clean borders on modules and grids.
    *   **Price Text:** A distinct color, often the primary blue or a specific sale color like red.
*   **Typography:**
    *   **Primary Font:** 'Inter' or 'Lato' – a clean, modern, and highly-readable sans-serif font for all text to ensure a professional and consistent look.
*   **UI Style: Modular & Feature-Rich**
    *   **Layout:** A well-defined, grid-based layout. The design is composed of various "modules" or "blocks" that can be arranged to create diverse page layouts.
    *   **Header:** A multi-part header, typically including a top bar for secondary info, a main bar with logo and search, and a primary navigation menu.
    *   **Footer:** A comprehensive, multi-column footer with extensive links, contact information, and a newsletter signup form.
    *   **Icons:** Use of a clean and modern icon set like Bootstrap Icons or Font Awesome for UI elements.

### 2.2. Implemented Features

*   **Homepage:** A comprehensive, multi-section homepage design replicating the Journal theme.
*   **Currency:** Default currency set to "Rs.".
*   **Dynamic Contact Information:** Store's contact information (address, phone, email) is editable from the admin panel.
*   **"Contact Us" Page:** A page displaying contact information from the admin settings and a contact form.
*   **Contact Form Submission:** The contact form sends an email to the administrator's email address (from settings).
*   **Application Layout:** A consistent `layouts.app` blade template for the main application layout.
*   **"Contact Us" Page Design:** A sleek and sophisticated design with a soft color palette, improved typography, iconography, and subtle interactive elements.
*   **Footer Link Styling:** Footer links are styled to be dark with no underline, and an underline appears on hover.
*   **Product Details:** A separate `details` field for products to store more comprehensive information, editable with a rich text editor.
*   **Multiple Product Images:** Products can now have multiple images, which can be uploaded and managed from the admin panel.
*   **Product Variants:** Products can have multiple variants, each with its own `name`, `price`, `sku`, and `stock` level.
*   **SEO Implementation:** Products now have fields for `meta_title`, `meta_description`, and `meta_keywords` to improve search engine visibility, all manageable from the admin panel.

### 2.3. Future/Planned Features

*   **Admin Panel:** A backend interface to manage products, categories, orders, and site settings.

## 3. Plan for Last Request: Enhanced Product Management

This section outlines the steps taken to add product variants, multiple images, and SEO features.

1.  **Updated Database Schema:**
    *   Added a `details` column to the `products` table.
    *   Added `meta_title`, `meta_description`, and `meta_keywords` columns to the `products` table.
    *   Created a `product_images` table with `product_id` and `image_path` columns.
    *   Updated the `product_variants` table to include `name`, `price`, `sku`, and `quantity`.

2.  **Enhanced Admin Product Forms:**
    *   Modified `create.blade.php` and `edit.blade.php` to include:
        *   A "Details" textarea with a Summernote rich text editor.
        *   A file input for uploading multiple product images using `bootstrap-fileinput`.
        *   A dynamic form section to add, remove, and edit product variants.
        *   Fields for SEO meta tags (`meta_title`, `meta_description`, `meta_keywords`).

3.  **Updated `ProductController`:**
    *   Modified the `store` and `update` methods to handle the new `details`, `images`, `variants`, and SEO fields.
    *   Added a `destroyImage` method to handle the deletion of individual product images.

4.  **Updated `Product` and `ProductImage` Models:**
    *   Updated the `Product` model's `booted` method to ensure that when a product is deleted, its associated images and variants are also deleted from both the database and storage.
    *   Created a `booted` method in the `ProductImage` model to automatically delete the image file from storage when a record is deleted.

5.  **Added New Route:**
    *   Added a route in `routes/admin.php` for deleting product images.