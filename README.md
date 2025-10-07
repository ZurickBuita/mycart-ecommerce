# MyCart E-commerce

MyCart E-commerce is a web application built with Laravel and Filament, designed to provide a seamless online shopping experience. This project includes core e-commerce functionalities such as products browsing, cart management, checkout, and an admin panel for store management.

## Features

### User Panel

1. **Homepage** displays various products.
2. **User authentication:** Users can sign up and log in.
3. **Product details:** Users can view product description, price, images, etc.
4. **Cart management:** Add products to cart, adjust quantity, and remove products.
5. **Checkout:** Users can checkout and view an order summary with subtotal, grand total, and address.
6. **Order history:** Users can view their past orders and track order status.

### Admin Panel

1. **Dashboard:** Admins can view order statistics.
2. **User management:** View all users, create, edit, and delete users.
3. **Category management:** Add, edit, and delete categories.
4. **Brand management:** Add, edit, and delete brands.
5. **Product management:** Add, edit, and delete products.
6. **Order management:** View all orders, filter orders by status (new, processing, shipped, cancelled), and view order details.
7. **Order status:** Admins can update order status.
8. **Global Search:** Search across users, products, orders, and other admin resources from a unified search bar in the admin panel.
9. **Database Notifications:** Admins receive real-time notifications about system events (such as new orders, user registrations, etc.) directly in the admin panel.  
   > **To enable database notifications, you must run the following command:**  
   > ```bash
   > php artisan queue:listen
   > ```
   > This will process queued notifications and deliver them instantly to the admin panel.

### Integrations

- **Mailtrap:** Used for email testing and notifications.
- **Stripe:** Integrated for secure payment processing.
- **Tailwind CSS:** Installed and used for modern, responsive UI styling. Run `npm run build` after making styling changes.

## Tech Stack

- **Backend & Framework:** [Laravel](https://laravel.com/)
- **Admin Panel:** [Filament](https://filamentphp.com/)
- **Styling:** [Tailwind CSS](https://tailwindcss.com/)
- **Payment:** [Stripe](https://stripe.com/)
- **Email:** [Mailtrap](https://mailtrap.io/)

## Getting Started

### Prerequisites

- [PHP](https://www.php.net/) >= 8.1
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) and [npm](https://www.npmjs.com/) (for compiling assets)
- A database (e.g., MySQL, PostgreSQL)

### Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/ZurickBuita/mycart-ecommerce.git
    cd mycart-ecommerce
    ```

2. **Install PHP dependencies:**
    ```bash
    composer install
    ```

3. **Install JavaScript dependencies and build assets:**
    ```bash
    npm install && npm run build
    ```
    - Tailwind CSS is used for styling. Run `npm run build` whenever you update styles.

4. **Copy the `.env.example` file to `.env` and configure your environment variables:**
    ```bash
    cp .env.example .env
    ```
    - Set your Mailtrap credentials in the `.env` file for email services.
    - Set your Stripe keys for payment processing.
    
    > **Reminder:** Make sure to change the Stripe secret key and Mailtrap credentials in your `.env` file before deploying to production!
    
5. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

6. **Run migrations and seeders:**
    ```bash
    php artisan migrate --seed
    ```
    - This will create your database structure and seed with sample data.

7. **Link the storage:**

    To allow uploaded files (such as images) to be accessible publicly, create a symbolic link:

    ```bash
    php artisan storage:link
    ```

8. **Serve the application:**
    ```bash
    php artisan serve
    ```
    - Visit `http://localhost:8000` in your browser.

### Filament Admin Panel

- To access the admin panel, go to the following route in your browser: `/admin`
- Login with:
  - **Email:** `admin@gmail.com`
  - **Password:** `admin123`

> You can also use the credentials from the seeded admin user or create a new admin via the database if needed.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any improvements or bug fixes.

## License

This project is licensed under the MIT License.

---

*Developed by [ZurickBuita](https://github.com/ZurickBuita)*
