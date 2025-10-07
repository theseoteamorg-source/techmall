
# TechMall E-Commerce Platform Blueprint

*As of: Monday, October 7, 2025 at 3:20 PM PKT*

## 1. Project Overview

TechMall is a full-stack e-commerce web application built on the Laravel framework. It provides a modern, user-friendly interface for customers to browse products, make purchases, and manage their accounts. It also includes a comprehensive admin panel for managing products, categories, orders, users, and other store settings.

## 2. Implemented Design and Features

This section will be updated as features are built.

### Design:
* **Layout:** A two-layout structure (frontend and admin).
* **Admin Theme:** The admin panel UI will be built using the **AdminLTE** template for a responsive and feature-rich experience.
* **Styling:** Bootstrap-based, focusing on a clean, responsive, and modern aesthetic for the frontend.
* **Branding:** The application will be branded as "TechMall".

### Core Features:
* **User Authentication:** User registration, login, and profile management.
* **Comprehensive Product Catalog:** Multi-level categories, brands, and products with complex variations (e.g., color, size), each with unique pricing, stock, and imagery.
* **Advanced Shopping Cart:** Add-to-cart, quantity updates, and coupon code functionality.
* **Flexible Checkout Process:** Multi-step checkout with custom payment methods (e.g., Bank Transfer, COD) and price-based shipping.
* **Full Order Management:** Order history for customers and detailed order processing for admins.
* **Content Management System (CMS):** A WordPress-style blog and page management system with categories, tags, and SEO fields.
* **Marketing Tools:** Management for bundled deals and discount coupons.
* **Comprehensive Admin Panel:** A secure and powerful area for administrators to manage every aspect of the store.

## 3. Detailed Development Plan

The following is a detailed, phased plan to implement the full e-commerce functionality.

### Phase 1: File Structure & Layout Consolidation (Completed)
* [x] Standardize frontend (`layouts/frontend.blade.php`) and admin (`layouts/admin.blade.php`) layouts.
* [x] Organize partials for both frontend and admin layouts.
* [x] Update all views to extend the new, correct layouts.
* [x] Remove all old, unused, or duplicate view files.

### Phase 2: Frontend Homepage & Core UI (Completed)
* [x] Create `Brand` model and migration.
* [x] Update `ShopController@home` to fetch necessary data for the homepage.
* [x] Redesign the homepage with sections for categories, brands, and new products.
* [x] Implement a consistent and functional header and footer.

### Phase 3: Advanced Product & Catalog Implementation (Completed)
* **Admin Panel:**
    * [x] **Complete Product CRUD:** Implement full Create, Read, Update, Delete for products.
    * [x] **Implement Product Variations:**  generate variants, each with its own unique price, SKU, stock level, and image gallery.
    * [x] **Implement Advanced Filtering:** Add filtering to the admin product list by `Stock Status`, `Price Range`, `Category`, and `Brand`.
    * [x] **Complete Category & Brand CRUD:** Ensure full management for categories (with icons) and brands (with logos).
    * [x] **Implement SEO Fields:** Add `URL Slug`, `Meta Title`, and `Meta Description` fields to Products, Categories, and Brands.
* **Frontend:**
    * [x] **Develop Shop/Category Pages:** Create the main product listing pages with breadcrumb navigation.
    * [x] **Implement Sidebar Filtering:** Build the sidebar with filters for price, brand, and dynamic product filters.
    * [x] **Implement Sorting:** Add functionality to sort products by price, newness, and rating.
    * [x] **Develop Product Detail Page:** Build the single product page with an image gallery (that updates with variant selection), detailed information, variant selectors (dropdowns/swatches), and tabs for description and reviews.

### Phase 4: E-commerce Transactional Workflow (Completed)
* **Frontend:**
    * [x] **Implement Full Shopping Cart:** Build the cart page with functionality to add, view, update quantities, and remove items.
    * [x] **Add Coupon Functionality:** Implement the input field in the cart to apply discount codes.
    * [x] **Build Checkout Flow:** Create a `CheckoutController` and a multi-step checkout view (Shipping Info -> Payment Method -> Order Review).
    * [x] **Implement Custom Payment Methods:** Display payment options (e.g., Bank Transfer, COD) with their instructions as configured in the admin panel.
    * [x] **Develop User Dashboard:** Create a secure area for logged-in users to view their order history and manage their profile details (name, a password).
* **Admin Panel:**
    * [x] **Enhance Order Management:** Build the admin interface to view full order details, customer information, and update order statuses (e.g., `Processing`, `Shipped`).
    * [x] **Implement Review Management:** Create the interface to approve, edit (text and stars), and delete customer reviews.

### Phase 5: Content, Marketing & Media Implementation (Completed)
* **Admin Panel:**
    * [x] **Build Blog & CMS:** Implement the WordPress-style system for managing `Posts`, `Pages`, `Categories`, and `Tags`, complete with a rich text editor and SEO fields.
    * [x] **Build Media Library:** Create a centralized library for managing all file uploads (images, PDFs) that integrates with the Product and Blog editors.
    * [x] **Build Marketing Tools:** Develop the interfaces for managing `Coupons` and bundled `Deals`.
* **Frontend:**
    * [x] **Display Blog:** Create the blog index and single post pages, with a sidebar for categories and a comments section.
    * [x] **Create Deals Page:** Build a dedicated page to display all active product deals.
    * [x] **Render Static Pages:** Ensure content from the `Pages` module (e.g., "About Us") is displayed correctly.

### Phase 6: Admin Panel Finalization & Settings (Completed)
* [x] **Build Admin Dashboard:** Create a main dashboard that provides an overview of store performance (KPIs, sales charts, latest orders).
* [x] **Create Reports Module:** Implement pages for `Sales`, `Customer`, and `Low Stock` reports with export functionality.
* [x] **Implement Staff Management & Roles:** Build the system to create staff accounts and assign granular permissions via a role-based system.

### Phase 7: Order and Shipment Management (Completed)
* **Shipment Tracking:**
    * [x] Create the `Shipment` model and migration with fields for `order_id`, `carrier`, and `tracking_number`.
    * [x] Add the `shipments` relationship to the `Order` model.
    * [x] Create the `ShipmentController` to manage shipment-related actions.
    * [x] Add nested resource routes for shipments within the admin order management.
    * [x] Update the order details view to include a form for adding new shipments and a list of existing shipments.
    * [x] Implement the `store` method to create new shipments and update the order status to "shipped."
    * [x] Implement the `destroy` method to delete shipments and revert the order status if no shipments remain.

### Phase 8: Database Migration Consolidation (Completed)
* [x] **Consolidate `orders` table migrations:** Merged `add_billing_details_to_orders_table`, `add_coupon_code_and_discount_to_orders_table`, and `add_payment_method_to_orders_table` into the `create_orders_table` migration.
* [x] **Consolidate `coupons` table migrations:** Merged `add_new_fields_to_coupons_table` into the `create_coupons_table` migration.
* [x] Deleted the redundant migration files.

### Phase 9: Product Variant Enhancement (Completed)
* [x] **Migration:** Add a `is_default` boolean column to the `product_variants` table.
* [x] **Admin Panel:**
    * [x] Update the product edit page in the admin panel to allow setting one variant as the default (e.g., with a radio button).
    * [x] Update the `ProductController` to handle the logic for setting and updating the default variant. Only one variant per product should be the default.
* [x] **Frontend:**
    * [x] Modify the `shop/product.blade.php` file to identify and display the default variant's price and select it by default when the page loads.

### Phase 10: Category URL and View Refactoring (Completed)
* [x] **Standardize URL Structure:** Updated `SitemapService` and `routes/web.php` to use the singular `/category/{slug}` URL structure instead of the plural `/categories/{slug}`.
* [x] **Refactor Controller:** Updated the `CategoryController@show` method to handle product sorting by price and newness.
* [x] **Consolidate Views:** Moved the existing category view from `resources/views/shop/category.blade.php` to the more appropriate `resources/views/category/show.blade.php`.
* [x] **Cleanup:** Deleted the old, redundant view file at `resources/views/shop/category.blade.php`.

### Phase 11: Final Review & Cleanup
* [ ] **Link Verification:** Systematically click through every link in both the frontend and admin panel to ensure there are no broken routes.
* [ ] **Responsiveness Check:** Test the entire application on various screen sizes (desktop, tablet, mobile).
* [ ] **Final Code Sweep:** Remove any commented-out code, unused variables, or redundant files.
* [ ] **Performance Optimization:** Analyze and optimize database queries and asset loading.
* [ ] **Complete Settings Module:**
    * [ ] Implement **General Settings** (Store Name, Logo, Theme Color, Currency, etc.).
    * [ ] Implement **Integrations** (field for Google Analytics 4 ID).
    * [ ] Implement **Payment Methods** management.
    * [ ] Implement **Header & Footer Scripts** injection tool.
    * [ ] Implement **System Tools** (Cache Clearing button).
