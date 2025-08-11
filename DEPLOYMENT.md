# Deploying Best Agadir Activities to Vercel

This Laravel project is configured for deployment on Vercel.

## Pre-deployment Steps

1. **Build frontend assets locally:**
   ```bash
   npm install
   npm run build
   ```

2. **Ensure your database is ready:**
   - The SQLite database file is already included
   - Run migrations locally if needed: `php artisan migrate`

## Vercel Deployment Steps

1. **Push your code to GitHub:**
   ```bash
   git add .
   git commit -m "Prepare for Vercel deployment"
   git push origin main
   ```

2. **Deploy to Vercel:**
   - Go to [vercel.com](https://vercel.com)
   - Import your GitHub repository
   - Vercel will automatically detect the Laravel project

3. **Environment Variables to set in Vercel:**
   Go to your project settings in Vercel and add these environment variables:
   
   ```
   APP_NAME=Best Agadir Activities
   APP_ENV=production
   APP_KEY=base64:YOUR_GENERATED_APP_KEY
   APP_DEBUG=false
   APP_URL=https://your-app-name.vercel.app
   
   DB_CONNECTION=sqlite
   
   SESSION_DRIVER=array
   CACHE_STORE=array
   QUEUE_CONNECTION=sync
   
   LOG_CHANNEL=stderr
   LOG_LEVEL=error
   
   # Your Google OAuth credentials
   GOOGLE_CLIENT_ID=your_google_client_id
   GOOGLE_CLIENT_SECRET=your_google_client_secret
   GOOGLE_REDIRECT_URI=https://your-app-name.vercel.app/auth/google-callback
   ```

4. **Generate APP_KEY:**
   Run this locally and copy the key:
   ```bash
   php artisan key:generate --show
   ```

## Important Notes

- SQLite database is read-only on Vercel
- Sessions are stored in array (memory) - users will be logged out on each request
- For persistent sessions, consider using a database session driver with an external database
- File uploads won't persist between deployments

## Local Testing

Test your app locally with production settings:
```bash
php artisan serve --env=production
```

## File Structure for Vercel

- `api/index.php` - Entry point for Vercel
- `vercel.json` - Vercel configuration
- `public/build/` - Built frontend assets (included in repo for deployment)
- `database/database.sqlite` - SQLite database (included in repo)
