# Installation Guide - Best Agadir Activities

This guide will help you set up the Best Agadir Activities platform on your local development environment or production server.

## 📋 Prerequisites

Before installing the application, ensure you have the following installed on your system:

### Required Software
- **PHP 8.2 or higher**
- **Composer** (PHP dependency manager)
- **Node.js 18+ and NPM** (for frontend assets)
- **SQLite** (for development) or **MySQL** (for production)
- **Git** (for version control)

### Optional but Recommended
- **Redis** (for caching and sessions)
- **Nginx or Apache** (for production deployment)

## 🚀 Installation Steps

### 1. Clone the Repository

```bash
# Clone the repository
git clone https://github.com/bizougarn-ziyad/BestAgadirActivities.git

# Navigate to the project directory
cd BestAgadirActivities
```

### 2. Install PHP Dependencies

```bash
# Install Composer dependencies
composer install
```

### 3. Install Node.js Dependencies

```bash
# Install NPM dependencies
npm install
```

### 4. Environment Configuration

```bash
# Copy the environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Configure Environment Variables

Edit the `.env` file and configure the following settings:

#### Database Configuration
```env
# For SQLite (Development)
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# For MySQL (Production)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=best_agadir_activities
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### Stripe Configuration
```env
STRIPE_PUBLIC_KEY=pk_test_your_stripe_public_key
STRIPE_SECRET_KEY=sk_test_your_stripe_secret_key
```

#### Google OAuth Configuration
```env
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google-callback
```

#### Mail Configuration (Optional)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@bestagadiractivities.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 6. Database Setup

```bash
# Run database migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed
```

### 7. Build Frontend Assets

```bash
# For development
npm run dev

# For production
npm run build
```

### 8. Start the Development Server

```bash
# Start the Laravel development server
php artisan serve

# The application will be available at http://localhost:8000
```

## 🔧 Additional Configuration

### File Permissions

Ensure the following directories are writable:

```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### Create Storage Link

```bash
php artisan storage:link
```

### Configure Task Scheduling (Production)

Add the following cron entry to your server:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## 🔑 Setting Up External Services

### Stripe Setup

1. Create a Stripe account at [stripe.com](https://stripe.com)
2. Get your API keys from the Stripe dashboard
3. Add the keys to your `.env` file
4. Test the payment flow in test mode

### Google OAuth Setup

1. Go to [Google Cloud Console](https://console.cloud.google.com)
2. Create a new project or select existing one
3. Enable Google+ API
4. Create OAuth 2.0 credentials
5. Add authorized redirect URIs:
   - `http://localhost:8000/auth/google-callback` (development)
   - `https://yourdomain.com/auth/google-callback` (production)
6. Add the credentials to your `.env` file

## 👤 Default Admin Account

After seeding the database, you can log in with the default admin account:

- **Email**: admin@bestagadiractivities.com
- **Password**: password

**⚠️ Important**: Change this password immediately in production!

## 🧪 Testing the Installation

### 1. Access the Application
- Visit `http://localhost:8000`
- You should see the homepage with activities

### 2. Test User Registration
- Click on "Login" and try registering a new account
- Test Google OAuth login

### 3. Test Admin Access
- Visit `http://localhost:8000/admin/dashboard`
- Log in with the default admin credentials
- Explore the admin features

### 4. Test Booking Flow
- Select an activity and try the booking process
- Use Stripe test card numbers for testing

## 🐛 Troubleshooting

### Common Issues

#### 1. Database Connection Error
```bash
# Check if SQLite file exists
ls -la database/database.sqlite

# If not, create it
touch database/database.sqlite
php artisan migrate
```

#### 2. Permission Errors
```bash
# Fix storage permissions
sudo chown -R www-data:www-data storage
sudo chmod -R 755 storage
```

#### 3. Composer Memory Limit
```bash
# Increase memory limit for Composer
php -d memory_limit=-1 /usr/local/bin/composer install
```

#### 4. Node.js Build Errors
```bash
# Clear npm cache
npm cache clean --force

# Remove node_modules and reinstall
rm -rf node_modules
npm install
```

### Laravel Specific Issues

#### Clear Application Cache
```bash
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
```

#### Regenerate Autoload Files
```bash
composer dump-autoload
```

## 🚀 Production Deployment

### Server Requirements
- **PHP 8.2+** with required extensions
- **Web server** (Nginx/Apache)
- **MySQL** database
- **SSL certificate** (recommended)

### Production Environment

1. **Set APP_ENV to production**:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Optimize for production**:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   composer install --optimize-autoloader --no-dev
   ```

3. **Set up proper web server configuration**
4. **Configure SSL certificate**
5. **Set up database backups**
6. **Configure monitoring and logging**

### Docker Deployment (Optional)

```bash
# Build Docker image
docker build -t best-agadir-activities .

# Run with docker-compose
docker-compose up -d
```

## 📞 Support

If you encounter any issues during installation:

1. Check the [troubleshooting section](#-troubleshooting)
2. Review Laravel's [documentation](https://laravel.com/docs)
3. Contact support: bizougarnziyad3@gmail.com

## 🔄 Updates

To update the application:

```bash
# Pull latest changes
git pull origin main

# Update dependencies
composer install
npm install

# Run migrations
php artisan migrate

# Build assets
npm run build

# Clear caches
php artisan cache:clear
```

---

**Happy coding! 🎉**
