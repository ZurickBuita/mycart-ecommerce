# MyCart E-commerce

MyCart E-commerce is a web application built with Laravel and Filament, designed to provide a seamless online shopping experience. This project includes core e-commerce functionalities such as product browsing, cart management, and order processing.

## Features

- User registration and authentication
- Product listing and detail pages
- Shopping cart management
- Order placement and history
- Admin dashboard for product management (powered by Filament)

## Tech Stack

- **Backend & Framework:** [Laravel](https://laravel.com/)
- **Admin Panel:** [Filament](https://filamentphp.com/)

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

4. **Copy the `.env.example` file to `.env` and configure your environment variables:**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

6. **Run migrations and seeders:**
   ```bash
   php artisan migrate --seed
   ```

7. **Serve the application:**
   ```bash
   php artisan serve
   ```

8. **Access the app:**
   - Visit `http://localhost:8000` in your browser.

### Filament Admin Panel

- After setting up, access the Filament admin panel at `/admin`.
- Use the credentials from the seeded admin user or create one via the database.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any improvements or bug fixes.

## License

This project is licensed under the MIT License.

---

*Developed by [ZurickBuita](https://github.com/ZurickBuita)*
