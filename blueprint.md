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

### 2.3. Future/Planned Features

*   **Admin Panel:** A backend interface to manage products, categories, orders, and site settings.

## 3. Plan for Current Request: "Contact Us" Page & Form

This section summarizes the recent changes to implement the "Contact Us" page and its functionality.

1.  **"Contact Us" Page Creation:**
    *   Created a `ContactController` to display the contact page.
    *   Created a `contact.blade.php` view to display contact information and a form. The view pulls dynamic content (address, phone, email) from the `settings` table.
    *   Added a `/contact` route in `web.php`.
2.  **Contact Form Functionality:**
    *   Created a `MailController` to handle sending emails.
    *   Created a `ContactMail` mailable class to define the email structure.
    *   Created an email view at `resources/views/emails/contact.blade.php`.
    *   Added a `POST` route (`/contact`) to handle the form submission.
3.  **Layout and Welcome Page:**
    *   Created a main application layout at `resources/views/layouts/app.blade.php`.
    *   Updated the `welcome.blade.php` to extend the new `app.blade.php` layout.

These changes have successfully added a functional "Contact Us" page to the application.
