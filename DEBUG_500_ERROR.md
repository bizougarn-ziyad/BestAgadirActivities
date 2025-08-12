# Deployment Troubleshooting Guide

## Current Status: 500 Server Error

### Changes Made to Fix 500 Error:

1. **Enabled Debug Mode**: Set `APP_DEBUG=true` in vercel.json to see actual errors
2. **Reverted Session Configuration**: Using cookies instead of database sessions
3. **Simplified Build Configuration**: Removed complex file inclusion patterns
4. **Removed Complex Middleware**: Commented out CORS middleware that might cause issues
5. **Simplified Database Handling**: No more complex database copying logic

### Steps to Deploy and Debug:

1. **Deploy the current changes**:
   ```bash
   vercel --prod
   ```

2. **If still getting 500 error, check the debug endpoint**:
   Visit: `https://vala-project-agadir.vercel.app/api/debug.php`
   
3. **Check Vercel logs**:
   - Go to Vercel dashboard
   - Click on your project
   - Go to Functions tab
   - Check the logs for detailed error messages

### Most Likely Causes of 500 Error:

1. **Missing Environment Variables**: Make sure these are set in Vercel:
   - `APP_KEY` (generate with `php artisan key:generate`)
   - `GOOGLE_CLIENT_ID`
   - `GOOGLE_CLIENT_SECRET`

2. **Database Issues**: SQLite file permissions or missing tables

3. **Autoloader Issues**: Missing vendor files or incorrect paths

4. **Configuration Cache**: Laravel might have cached config with wrong paths

### Quick Fixes to Try:

#### Fix 1: Add APP_KEY to Vercel
1. Run locally: `php artisan key:generate --show`
2. Copy the generated key
3. Add to Vercel environment variables as `APP_KEY`

#### Fix 2: Update vercel.json with minimal config
The current vercel.json should work, but if not, try removing mail config temporarily.

#### Fix 3: Check the debug endpoint
After deploying, visit `/api/debug.php` to see what's failing.

### If debug page shows specific errors:
1. **"Class not found"**: Autoloader issue, check vendor directory
2. **"Database connection failed"**: SQLite permissions issue
3. **"Config cache"**: Clear all cache before deploying

### Environment Variables Needed:
```
APP_KEY=base64:your_key_here
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
```

The debug endpoint will help us identify the exact issue.
