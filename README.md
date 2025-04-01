# MyDigiDollar Website

A web application that allows users to subscribe to investment packages and earn daily returns.

![MyDigiDollar Logo](public/img/three.svg)

## About MyDigiDollar

MyDigiDollar is a digital investment platform where users can subscribe to various investment packages and earn daily returns. The platform offers different subscription plans with varying investment amounts and corresponding daily earnings.

### Key Features

- **User Authentication**: Complete registration and login system with password reset functionality
- **Dashboard**: User dashboard showing earnings, active packages, and withdrawal history
- **Investment Packages**: Multiple subscription plans with different investment amounts and daily returns
- **Referral System**: Earn rewards by referring new users to the platform
- **Withdrawal System**: Request withdrawals of earned funds
- **Admin Panel**: Admin dashboard to approve/reject user requests and withdrawals

## Technology Stack

- **Backend**: Laravel PHP Framework
- **Frontend**: Blade templates with Bootstrap CSS framework
- **Database**: MySQL
- **Authentication**: Laravel's built-in authentication system

## Installation Guide

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js and NPM
- MySQL database

### Installation Steps

1. Clone the repository
   ```bash
   git clone https://github.com/yourusername/MyDigiDollar_website.git
   cd MyDigiDollar_website
   ```

2. Install PHP dependencies
   ```bash
   composer install
   ```

3. Install JavaScript dependencies
   ```bash
   npm install
   ```

4. Create environment file
   ```bash
   cp .env.example .env
   ```

5. Generate application key
   ```bash
   php artisan key:generate
   ```

6. Configure your database in the `.env` file
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mydigidollar
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Run migrations
   ```bash
   php artisan migrate
   ```

8. Build assets
   ```bash
   npm run dev
   ```

9. Start the development server
   ```bash
   php artisan serve
   ```

10. Visit `http://localhost:8000` in your browser

## Usage

1. **Register**: Create a new account
2. **Login**: Sign in to your account
3. **Browse Packages**: View available investment packages
4. **Subscribe**: Choose a package and complete subscription
5. **Dashboard**: Monitor your earnings and account activity
6. **Withdraw**: Request withdrawals of your earned funds

## Administrator Access

To access the admin dashboard:
1. Create an admin user through the database or seeder
2. Login with admin credentials
3. Access the admin dashboard from your user menu

## Contributing

If you'd like to contribute to the development of MyDigiDollar, please follow these steps:

1. Fork the repository
2. Create a new branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Commit your changes (`git commit -m 'Add some amazing feature'`)
5. Push to the branch (`git push origin feature/amazing-feature`)
6. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Contact

For any inquiries or support, please contact us at:
- Email: your-email@example.com
- Website: https://mydigidollar.com
