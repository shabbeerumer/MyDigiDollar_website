# MyDigiDollar - Digital Investment Platform

MyDigiDollar is a web-based investment platform where users can subscribe to investment packages and earn daily returns. The platform offers various subscription tiers with different investment amounts and daily earning potentials.

<p align="center">
<img src="public/img/three.svg" alt="MyDigiDollar" width="200">
</p>

## Features

- **User Authentication**: Secure registration and login system
- **Subscription Packages**: Multiple investment tiers ranging from $100 to $500
- **Daily Earnings**: Automated daily earnings based on subscription level
- **Dashboard**: User-friendly dashboard to track investments and earnings
- **Referral System**: Earn bonuses by referring new users
- **Withdrawal System**: Request withdrawals of your earned funds
- **Responsive Design**: Works on desktop and mobile devices

## Available Packages

| Package Name | Investment Amount | Daily Earnings |
|--------------|-------------------|----------------|
| Bronze Starter | $100 | $1.50 |
| Silver Saver | $200 | $3.00 |
| Golden Opportunity | $300 | $4.50 |
| Platinum Plus | $400 | $6.00 |
| Diamond Elite | $500 | $10.00 |

## Technologies Used

- **Laravel**: PHP framework for back-end development
- **MySQL**: Database management
- **Bootstrap**: Front-end framework for responsive design
- **JavaScript/jQuery**: Enhanced user interactions
- **AOS**: Animate on scroll library for smooth animations
- **Swiper**: Touch slider for mobile-friendly interfaces

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/MyDigiDollar_website.git
   ```

2. Navigate to the project directory:
   ```
   cd MyDigiDollar_website
   ```

3. Install PHP dependencies:
   ```
   composer install
   ```

4. Install JavaScript dependencies:
   ```
   npm install
   ```

5. Create a copy of the .env file:
   ```
   cp .env.example .env
   ```

6. Generate an application key:
   ```
   php artisan key:generate
   ```

7. Configure your database settings in the .env file.

8. Run database migrations:
   ```
   php artisan migrate
   ```

9. Compile assets:
   ```
   npm run dev
   ```

10. Start the local development server:
    ```
    php artisan serve
    ```

## Usage

1. Register for an account on the platform
2. Log in to your account
3. Browse available investment packages
4. Subscribe to your preferred package
5. Track your earnings on the dashboard
6. Request withdrawals when desired

## Admin Features

- Approve/reject user subscription requests
- Process withdrawal requests
- Monitor all system activities
- Manage user accounts

## Support

If you encounter any issues or have questions, please contact us at support@mydigidollar.com or use the contact form on our website.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Credits

Developed by [Your Name] - [Your Website/GitHub]
