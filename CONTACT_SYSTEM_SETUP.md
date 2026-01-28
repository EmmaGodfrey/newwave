# Contact System Setup Instructions

## Overview
The contact system has been fully implemented with the following features:
- Admin-managed contact information (email, phone, address, map URL)
- Contact form that sends emails to the admin-configured email address
- Contact form submissions stored in the database
- Admin panel to view and manage contact messages

## Database Setup

1. **Run the migrations:**
```bash
php artisan migrate
```

This will create two new tables:
- `contact_settings` - Stores the contact information
- `contact_messages` - Stores contact form submissions

2. **Seed default contact settings (optional):**
```bash
php artisan db:seed --class=ContactSettingSeeder
```

## Configuration

### Email Configuration
Make sure your `.env` file has proper email configuration:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@newwavemotorsport.com
MAIL_FROM_NAME="${APP_NAME}"
```

For production, you can use services like:
- **Gmail**: Update MAIL_HOST to smtp.gmail.com
- **Mailgun**: Configure with Mailgun credentials
- **SendGrid**: Configure with SendGrid credentials
- **Amazon SES**: Configure with AWS SES credentials

## Admin Panel Usage

### Managing Contact Settings

1. **Navigate to:** `/admin/contact/settings`
2. **Update the following fields:**
   - Email (where contact form submissions will be sent)
   - Phone number
   - Address
   - Google Map Embed URL (optional)
3. **Click "Update Settings"**

### Viewing Contact Messages

1. **Navigate to:** `/admin/contact/messages`
2. **View all contact form submissions**
3. **Click the eye icon** to view full message details
4. **Click the trash icon** to delete a message
5. Messages are automatically marked as "read" when viewed

## Frontend Features

### Contact Page
The contact page (`/contact`) now:
- Displays contact information from the database
- Shows the custom Google Map if configured
- Submits forms via AJAX
- Sends email notifications to the admin email
- Stores all submissions in the database

### Footer
The footer now displays:
- Email from database
- Phone from database
- Address from database

These values automatically fallback to default values if no settings are configured.

## Routes

### Frontend Routes:
- `GET /contact` - Display contact page
- `POST /contact` - Submit contact form

### Admin Routes:
- `GET /admin/contact/settings` - Edit contact settings
- `PUT /admin/contact/settings` - Update contact settings
- `GET /admin/contact/messages` - List all contact messages
- `GET /admin/contact/messages/{id}` - View specific message
- `DELETE /admin/contact/messages/{id}` - Delete message

## Files Created/Modified

### New Files:
1. **Migrations:**
   - `database/migrations/2026_01_28_000001_create_contact_settings_table.php`
   - `database/migrations/2026_01_28_000002_create_contact_messages_table.php`

2. **Models:**
   - `app/Models/ContactSetting.php`
   - `app/Models/ContactMessage.php`

3. **Controllers:**
   - `app/Http/Controllers/ContactController.php`
   - `app/Http/Controllers/Admin/ContactSettingController.php`
   - `app/Http/Controllers/Admin/ContactMessageController.php`

4. **DataTable:**
   - `app/DataTables/ContactMessageDataTable.php`

5. **Views:**
   - `resources/views/admin/contact/settings.blade.php`
   - `resources/views/admin/contact/messages.blade.php`
   - `resources/views/admin/contact/show.blade.php`
   - `resources/views/emails/contact.blade.php`

6. **Seeder:**
   - `database/seeders/ContactSettingSeeder.php`

### Modified Files:
1. `resources/views/frontend/pages/contact.blade.php` - Updated to use dynamic data
2. `resources/views/frontend/partials/footer.blade.php` - Updated to use dynamic data
3. `routes/web.php` - Added contact routes
4. `app/Providers/AppServiceProvider.php` - Added view composer for global contact settings

## Testing

1. **Test Contact Form:**
   - Visit `/contact`
   - Fill in and submit the form
   - Check that you receive an email
   - Verify the message appears in `/admin/contact/messages`

2. **Test Settings:**
   - Visit `/admin/contact/settings`
   - Update contact information
   - Visit `/contact` to verify changes appear
   - Check footer to verify changes appear

## Google Maps Integration

To update the map on the contact page:

1. Go to [Google Maps](https://www.google.com/maps)
2. Search for your location
3. Click "Share" button
4. Click "Embed a map" tab
5. Copy the URL from the iframe src attribute
6. Paste it into the "Google Map Embed URL" field in admin settings

Example URL format:
```
https://www.google.com/maps/embed?pb=!1m18!1m12!...
```

## Troubleshooting

### Emails Not Sending
1. Check `.env` mail configuration
2. Verify mail credentials are correct
3. Check Laravel logs in `storage/logs/laravel.log`
4. Test with Mailtrap.io for development

### Contact Settings Not Showing
1. Run migrations: `php artisan migrate`
2. Seed default data: `php artisan db:seed --class=ContactSettingSeeder`
3. Or manually add a record via admin panel

### Form Not Submitting
1. Check browser console for JavaScript errors
2. Verify jQuery is loaded
3. Check network tab for AJAX request
4. Verify CSRF token is present in form
