Of course. Here is the complete project document, merging our detailed frontend and admin blueprints into your existing phased format. This serves as a comprehensive roadmap for the development of the entire TechMall platform.

***

# TechMall E-Commerce Platform Blueprint

*As of: Monday, October 6, 2025 at 2:49 PM PKT*

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
* **Content Management System (CMS):** A WordPress-style blog and page management system.
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

### Phase 3: Advanced Product & Catalog Implementation
* **Admin Panel:**
    * [ ] **Complete Product CRUD:** Implement full Create, Read, Update, Delete for products.
    * [ ] **Implement Product Variations:** Build the interface to add attributes (Color, Size) and generate variants, each with its own unique price, SKU, stock level, and image gallery.
    * [ ] **Implement Advanced Filtering:** Add filtering to the admin product list by `Stock Status`, `Price Range`, `Category`, and `Brand`.
    * [ ] **Complete Category & Brand CRUD:** Ensure full management for categories (with icons) and brands (with logos).
    * [ ] **Implement SEO Fields:** Add `URL Slug`, `Meta Title`, and `Meta Description` fields to Products, Categories, and Brands.
* **Frontend:**
    * [ ] **Develop Shop/Category Pages:** Create the main product listing pages with breadcrumb navigation.
    * [ ] **Implement Sidebar Filtering:** Build the sidebar with filters for price, brand, and dynamic product attributes.
    * [ ] **Implement Sorting:** Add functionality to sort products by price, newness, and rating.
    * [ ] **Develop Product Detail Page:** Build the single product page with an image gallery (that updates with variant selection), detailed information, variant selectors (dropdowns/swatches), and tabs for description and reviews.

### Phase 4: E-commerce Transactional Workflow
* **Frontend:**
    * [ ] **Implement Full Shopping Cart:** Build the cart page with functionality to add, view, update quantities, and remove items.
    * [ ] **Add Coupon Functionality:** Implement the input field in the cart to apply discount codes.
    * [ ] **Build Checkout Flow:** Create a `CheckoutController` and a multi-step checkout view (Shipping Info -> Payment Method -> Order Review).
    * [ ] **Implement Custom Payment Methods:** Display payment options (e.g., Bank Transfer, COD) with their instructions as configured in the admin panel.
    * [ ] **Develop User Dashboard:** Create a secure area for logged-in users to view their order history and manage their profile details (name, password).
* **Admin Panel:**
    * [ ] **Enhance Order Management:** Build the admin interface to view full order details, customer information, and update order statuses (e.g., `Processing`, `Shipped`).
    * [ ] **Implement Review Management:** Create the interface to approve, edit (text and stars), and delete customer reviews.

### Phase 5: Content, Marketing & Media Implementation
* **Admin Panel:**
    * [ ] **Build Blog & CMS:** Implement the WordPress-style system for managing `Posts`, `Pages`, `Categories`, and `Tags`, complete with a rich text editor and SEO fields.
    * [ ] **Build Media Library:** Create a centralized library for managing all file uploads (images, PDFs) that integrates with the Product and Blog editors.
    * [ ] **Build Marketing Tools:** Develop the interfaces for managing `Coupons` and bundled `Deals`.
* **Frontend:**
    * [ ] **Display Blog:** Create the blog index and single post pages, with a sidebar for categories and a comments section.
    * [ ] **Render Static Pages:** Ensure content from the `Pages` module (e.g., "About Us") is displayed correctly.
    * [ ] **Create Deals Page:** Build a dedicated page to display all active product deals.

### Phase 6: Admin Panel Finalization & Settings
* [ ] **Build Admin Dashboard:** Create a main dashboard that provides an overview of store performance (KPIs, sales charts, latest orders).
* [ ] **Create Reports Module:** Implement pages for `Sales`, `Customer`, and `Low Stock` reports with export functionality.
* [ ] **Implement Staff Management & Roles:** Build the system to create staff accounts and assign granular permissions via a role-based system.
* [ ] **Complete Settings Module:**
    * [ ] Implement **General Settings** (Store Name, Logo, Theme Color, Currency, etc.).
    * [ ] Implement **Integrations** (field for Google Analytics 4 ID).
    * [ ] Implement **Payment Methods** management.
    * [ ] Implement **Header & Footer Scripts** injection tool.
    * [ ] Implement **System Tools** (Cache Clearing button).

### Phase 7: Final Review & Cleanup
* [ ] **Link Verification:** Systematically click through every link in both the frontend and admin panel to ensure there are no broken routes.
* [ ] **Responsiveness Check:** Test the entire application on various screen sizes (desktop, tablet, mobile).
* [ ] **Final Code Sweep:** Remove any commented-out code, unused variables, or redundant files.
* [ ] **Performance Optimization:** Analyze and optimize database queries and asset loading.