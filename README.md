# Best Agadir Activities 🏖️

A comprehensive Laravel-based platform for managing and booking exciting activities in Agadir, Morocco. This application provides a complete solution for activity management, user authentication, payment processing, and administrative controls.

## 🌟 Features Overview

### 🎯 Main Platform Features
- **Activity Browsing**: Discover luxurious experiences in Agadir
- **User Authentication**: Multiple login options including Google OAuth
- **Secure Payments**: Stripe integration for safe transactions
- **Favorites System**: Save and manage favorite activities
- **Booking Management**: Complete booking workflow with availability checking
- **Admin Dashboard**: Comprehensive administrative controls
- **Responsive Design**: Mobile-friendly interface

Laravel is accessible, powerful, and provides tools required for large, robust applications.

---

## 🖼️ Application Screenshots

### Homepage - Discover Luxurious Experiences
![Homepage](docs/images/homepage.png)
*Experience the real Morocco, right here in Agadir! Join us for an unforgettable journey through vibrant culture, stunning landscapes, and rich history.*

### Admin Dashboard - Control Center
![Admin Dashboard](docs/images/admin-dashboard.png)
*Welcome to the control center! Manage your Agadir activities platform with ease.*

### Activities Management
![Activities Management](docs/images/activities-management.png)
*Manage all exciting Agadir activities and experiences with full CRUD operations.*

### Admin Management
![Admin Management](docs/images/admin-management.png)
*Manage administrator accounts for your platform with role-based access control.*

### Booking Management
![Booking Management](docs/images/booking-management.png)
*Manage all activity bookings and monitor availability with filtering capabilities.*

### Activity Details
![Activity Details](docs/images/activity-details.png)
*Detailed activity pages with pricing, reviews, and instant booking functionality.*

---

## 🏗️ Technology Stack

- **Framework**: Laravel 12.x
- **Frontend**: Blade Templates with Tailwind CSS
- **Database**: SQLite (development) / MySQL (production)
- **Payment**: Stripe API v17.5
- **Authentication**: Laravel Socialite (Google OAuth)
- **Server Requirements**: PHP 8.2+

---

## 🚀 Key Functionalities

### 1. 👤 User Authentication System

#### Multi-Modal Authentication
- **Traditional Login**: Email and password authentication
- **Google OAuth**: One-click Google sign-in integration
- **Password Reset**: Email-based password recovery
- **Session Management**: Secure session handling

#### Features:
- User registration with validation
- Google OAuth integration with Laravel Socialite
- Password setup for OAuth users
- Remember me functionality
- Secure logout across all guards

```php
// Google OAuth Integration
Route::controller(SocialiteController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('/auth/google-callback', 'handleGoogleCallback');
});
```

---

### 2. 🏛️ Admin Dashboard

#### Complete Administrative Control
The admin dashboard provides comprehensive management capabilities:

#### **Admin Management**
- Create, edit, and delete administrator accounts
- Role-based access control
- Secure admin authentication separate from user authentication

#### **Activity Management**
- Full CRUD operations for activities
- Image upload and management (Base64 encoding)
- Activity status control (active/inactive)
- Pricing and capacity management
- Review and rating system

#### **Booking Management**
- View all bookings with filtering options
- Monitor booking statistics
- Track revenue and participants
- Availability management

```php
// Admin Routes with Authentication Middleware
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('activities', ActivityController::class);
    Route::resource('admins', AdminController::class);
    Route::get('bookings', [BookingController::class, 'adminIndex']);
});
```

---

### 3. 💳 Stripe Payment Integration

#### Secure Payment Processing
- **Stripe Checkout**: Secure hosted payment pages
- **Real-time Processing**: Instant payment confirmation
- **Order Management**: Complete order tracking
- **Session Management**: Secure payment session handling

#### Payment Flow:
1. User selects activity and date
2. Availability verification
3. Stripe Checkout session creation
4. Secure payment processing
5. Order confirmation and email notifications

```php
// Stripe Checkout Session Creation
$checkout_session = $stripe->checkout->sessions->create([
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => ['name' => $activity->name],
            'unit_amount' => $pricePerPerson * 100,
        ],
        'quantity' => $participants,
    ]],
    'mode' => 'payment',
    'success_url' => route('booking.success'),
    'cancel_url' => route('booking.cancel'),
]);
```

---

### 4. 📅 Booking System

#### Complete Booking Management
- **Availability Checking**: Real-time availability verification
- **Date Selection**: Interactive calendar with availability
- **Participant Management**: Group size validation
- **Booking History**: User booking dashboard

#### Key Features:
- Maximum participant validation
- Date-based availability checking
- Booking confirmation system
- PDF booking confirmations (planned)

```php
// Availability Checking
public function isAvailableForDate($date, $participants)
{
    $bookedParticipants = $this->orders()
        ->where('booking_date', $date)
        ->where('status', 'paid')
        ->sum('participants');
    
    return ($bookedParticipants + $participants) <= $this->max_participants;
}
```

---

### 5. ❤️ Favorites System

#### Personal Activity Management
- **Add to Favorites**: Save interesting activities
- **Favorites Dashboard**: Dedicated favorites page
- **Quick Access**: Easy favorite management
- **Authentication Required**: Secure favorites per user

```php
// Favorite Toggle Functionality
public function toggle(Request $request, $activityId)
{
    $favorite = Favorite::where('user_id', $user->id)
                       ->where('activity_id', $activityId)
                       ->first();
    
    if ($favorite) {
        $favorite->delete();
        return response()->json(['is_favorited' => false]);
    } else {
        Favorite::create(['user_id' => $user->id, 'activity_id' => $activityId]);
        return response()->json(['is_favorited' => true]);
    }
}
```

---

### 6. 🔍 Activity Management

#### Comprehensive Activity Features
- **Rich Media Support**: Base64 image storage
- **Review System**: User ratings and reviews
- **Category Management**: Activity categorization
- **SEO Optimization**: SEO-friendly URLs and meta data

#### Activity Model Features:
```php
protected $fillable = [
    'name', 'bio', 'image_data', 'image_mime_type', 
    'price', 'max_participants', 'is_active',
    'average_rating', 'review_count', 'reviews'
];

protected $casts = [
    'price' => 'decimal:2',
    'is_active' => 'boolean',
    'reviews' => 'array'
];
```

---

## 📊 Database Schema

### Core Models
- **UserData**: User accounts and profiles
- **Admin**: Administrator accounts
- **Activity**: Activity listings and details
- **Order**: Booking orders and payments
- **Favorite**: User favorite activities
- **NotificationEmail**: Email notifications

### Key Relationships
```php
// User has many favorites
public function favoriteActivities()
{
    return $this->belongsToMany(Activity::class, 'favorites', 'user_id', 'activity_id')
                ->withTimestamps();
}

// Activity has many orders
public function orders()
{
    return $this->hasMany(Order::class);
}
```

---

## 🔐 Security Features

### Authentication & Authorization
- **Multi-Guard Authentication**: Separate admin and user guards
- **CSRF Protection**: Laravel's built-in CSRF protection
- **Password Hashing**: Bcrypt password hashing
- **Session Security**: Secure session management

### Data Protection
- **Input Validation**: Comprehensive request validation
- **SQL Injection Prevention**: Eloquent ORM protection
- **XSS Protection**: Blade template escaping

---

## 📱 Responsive Design

### Mobile-First Approach
- **Tailwind CSS**: Utility-first CSS framework
- **Responsive Grid**: Mobile-optimized layouts
- **Touch-Friendly**: Mobile interaction optimization
- **Performance**: Optimized for mobile devices

---

## 🚀 Installation & Setup

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- SQLite/MySQL database

### Quick Start
```bash
# Clone the repository
git clone https://github.com/bizougarn-ziyad/BestAgadirActivities.git

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Build assets
npm run build

# Start development server
php artisan serve
```

### Environment Configuration
```env
# Stripe Configuration
STRIPE_PUBLIC_KEY=your_stripe_public_key
STRIPE_SECRET_KEY=your_stripe_secret_key

# Google OAuth
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google-callback
```

---

## 📈 Performance Features

### Optimization
- **Database Indexing**: Optimized database queries
- **Eager Loading**: Reduced N+1 query problems
- **Caching**: Strategic caching implementation
- **Image Optimization**: Efficient image storage

### Scalability
- **Pagination**: Efficient data pagination
- **API Ready**: RESTful API endpoints
- **Queue System**: Background job processing
- **Modular Architecture**: Scalable code structure

---

## 🛠️ Development

### Code Quality
- **PSR Standards**: PHP coding standards compliance
- **Laravel Conventions**: Framework best practices
- **Error Handling**: Comprehensive error management
- **Logging**: Detailed application logging

### Testing
- **PHPUnit**: Unit and feature testing
- **Database Testing**: Database interaction testing
- **API Testing**: Endpoint testing

---

## 📞 Support & Documentation

### API Documentation
- RESTful API endpoints
- Authentication tokens
- Request/response examples
- Error handling guides

### Admin Guide
- Dashboard navigation
- Activity management
- User management
- Booking oversight

---

## 🔮 Future Enhancements

### Planned Features
- **Multi-language Support**: Arabic, French, English
- **Advanced Analytics**: Detailed reporting dashboard
- **Email Notifications**: Automated booking confirmations
- **PDF Generation**: Booking confirmations and invoices
- **Real-time Notifications**: WebSocket integration
- **Mobile App**: Native mobile application

### Technical Improvements
- **API Rate Limiting**: Enhanced security
- **Advanced Caching**: Redis integration
- **CDN Integration**: Asset delivery optimization
- **Monitoring**: Application performance monitoring

---

## 👥 Contributing

We welcome contributions! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

### Development Workflow
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests
5. Submit a pull request

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 🙏 Acknowledgments

- **Laravel Framework**: For the robust foundation
- **Stripe**: For secure payment processing
- **Google**: For OAuth integration
- **Tailwind CSS**: For the beautiful UI
- **Community**: For continuous support and feedback

---

## 📧 Contact

**Developer**: Ziyad Bizougarn  
**Email**: bizougarnziyad3@gmail.com  
**Project**: Best Agadir Activities Platform

---

*Built with ❤️ for the beautiful city of Agadir, Morocco*
