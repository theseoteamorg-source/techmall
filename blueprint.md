# Techmall Blueprint

## 1. Overview

Techmall is a modern e-commerce platform built with Laravel. It provides a seamless shopping experience for customers and a powerful administrative backend for managing products, orders, and more.

## 2. Design & Features

### 2.1. Frontend

*   **Homepage:** Displays featured products, deals, and new arrivals.
*   **Shop:** Allows users to browse and filter products by category, brand, and price.
*   **Product Details:** Shows detailed information about a product, including images, description, and reviews.
*   **Cart:** A session-based shopping cart for adding and managing products.
*   **Checkout:** A secure checkout process for placing orders.
*   **User Accounts:** Allows users to register, log in, and manage their profiles.

### 2.2. Backend (Admin Panel)

*   **Dashboard:** Provides an overview of sales, orders, and other key metrics.
*   **Product Management:** Add, edit, and delete products, categories, and brands.
*   **Order Management:** View and process customer orders.
*   **User Management:** Manage customer and administrator accounts.
*   **Settings:** Configure site-wide settings and options.

### 2.3. Styling

*   **Framework:** Bootstrap 5
*   **Icons:** Bootstrap Icons
*   **Layout:** Responsive and mobile-first design
*   **Color Scheme:** Modern and vibrant color palette

### 2.4. UI Improvements

*   **Sci-Fi Theme:** Implemented a futuristic, sci-fi inspired theme across the frontend.
*   **Typography:** Utilized the 'Orbitron' font for headings to create a modern, technical feel.
*   **Color Palette:** Introduced a glowing color scheme with a dark background to enhance the sci-fi aesthetic.
*   **Header and Footer:** Redesigned the header and footer to be more visually engaging and consistent with the new theme. The header now includes a prominent search bar and improved navigation.
*   **Simplified Navigation:** The "Blog" and "Contact" links have been removed from the main navigation bar to create a more focused user experience.

### 2.5. Cart Functionality

*   **Package:** Utilizes the `darryldecode/cart` package for robust cart management.
*   **Facade:** The `Cart` facade is correctly registered and used throughout the application.
*   **Syntax:** The application now uses the correct syntax for adding, updating, and retrieving cart items (`\Cart::add()`, `\Cart::getContent()`, etc.).

### 2.6. Dynamic Footer

*   **Content Management:** The footer content is now managed dynamically through the admin settings.
*   **Dynamic Fields:** The site name, introduction, address, phone number, and social media links are all retrieved from the application\'s configuration.
*   **Theming:** The footer was originally styled with a dark, futuristic theme. It has since been updated to a light theme for better readability and a cleaner look.
*   **Newsletter Removal:** The newsletter subscription form has been removed from the footer to simplify the design and improve user experience.
*   **Copyright Section:** The copyright section of the footer has been made more compact by reducing its vertical padding.

### 2.7. Category Page Improvements

*   **Sidebar:** A sidebar has been added to the category page to house product filters.
*   **Category Filter:** The sidebar displays a list of all product categories, allowing users to easily navigate between them.
*   **Price Range Filter:** A jQuery UI slider has been implemented to allow users to filter products by price. The slider is dynamically populated with the minimum and maximum prices for the current category.
*   **Client-Side Filtering:** The price range filter operates on the client-side, providing a fast and responsive user experience.

### 2.8. Advanced Sorting and Viewing Options

*   **Sorting:** The category page now includes advanced sorting options, allowing users to sort products by:
    *   Price: Low to High
    *   Price: High to Low
    *   Newest
    *   Rating
*   **Grid/List View:** Users can now switch between a grid view and a list view to display products. The user\'s preference is saved in their browser\'s local storage for a consistent experience across sessions.

### 2.9. Themed Filter Sidebar

*   **Redesign:** The filter sidebar on the category page has been completely redesigned to match the site\'s futuristic, sci-fi theme.
*   **Visual Consistency:** The new design utilizes the existing "gaming-sidebar" styles, featuring a dark background, glowing accents, and the 'Orbitron' font.
*   **"Amazing" Price Filter:** The price range filter has been transformed into a futuristic "energy level" control. It features:
    *   A pulsating, glowing "energy bar" for the selected range.
    *   Custom caliper-style handles that appear to grip the energy bar.
    *   A holographic-style price readout positioned above the slider for a high-tech look.

### 2.10. Deals Page

*   **Dynamic Deals:** The deals page now dynamically displays all active deals from the database.
*   **Countdown Timer:** Each deal features a countdown timer that shows the remaining time until the deal expires.
*   **Product Display:** The products associated with each deal are displayed using the reusable `product-card` component, ensuring a consistent look and feel across the site.
*   **No Deals Message:** If there are no active deals, a user-friendly message is displayed to the user.

## 3. Frontend Views

Here is a list of all the frontend-facing views in the application:

*   `about.blade.php`: The "About Us" page.
*   `contact.blade.php`: The contact form and information page.
*   `policy.blade.php`: The privacy policy page.
*   `terms.blade.php`: The terms and conditions page.
*   `blog/index.blade.php`: The main blog page, listing all posts.
*   `blog/show.blade.php`: The individual blog post page.
*   `brand/show.blade.php`: The page that displays all products belonging to a specific brand.
*   `cart/index.blade.php`: The shopping cart page.
*   `category/show.blade.php`: The page that displays all products within a specific category.
*   `checkout/index.blade.php`: The checkout page.
*   `checkout/success.blade.php`: The order success/thank you page.
*   `deals/index.blade.php`: The page that displays all active deals and promotions.
*   `home/index.blade.php`: The main homepage of your application.
*   `page/show.blade.php`: A generic page for displaying custom content.
*   `products/index.blade.php`: The main product listing page (shop).
*   `products/show.blade.php`: The individual product detail page.
*   `shop/cart.blade.php`: An alternative cart view.
*   `shop/checkout.blade.php`: An alternative checkout view.
*   `shop/deals.blade.php`: An alternative deals view.
*   `shop/home.blade.php`: An alternative home page view.
*   `shop/index.blade.php`: An alternative shop/product listing view.
*   `shop/product.blade.php`: An alternative product detail view.
*   `shop/thank-you.blade.php`: An alternative order success/thank you page.
