<p align="center"><img src="public/frontend/img/logo.svg" width="380" alt="Vehicle Management System"></p>

<h3 align="center">A complete, production-ready vehicle &amp; fleet management platform</h3>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=flat-square&logo=php" alt="PHP 8.1+">
  <img src="https://img.shields.io/badge/Laravel-10-FF2D20?style=flat-square&logo=laravel" alt="Laravel 10">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat-square&logo=bootstrap" alt="Bootstrap 5">
  <img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="MIT License">
</p>

---

## Overview

**Vehicle Management System (VMS)** is a full-featured web application for businesses that own, rent or operate vehicles - rent-a-car companies, logistics operators, corporate fleets and service centers. It combines a public booking website with a complete back-office: fleet registry, drivers, trips, fuel, maintenance, contacts, double-entry style accounting, reports, staff management and a built-in email templating system.

The project is built with **Laravel 10** and **Bootstrap 5**, supports **English and Bangla (বাংলা)** out of the box, and ships with seeded reference data (111 car brands, 1,900+ car models) so it is usable immediately after installation.

## Key Features

### Fleet Management
- Vehicle registry with multi-image galleries, brand / model / body type / fuel type / transmission / drive type / year profiles
- 111 car brands and 1,900+ car models seeded automatically for instant use
- Driver management with profiles, documents and license details
- Per-vehicle timelines: services, issues, fuel logs and trips

### Trips & Booking
- Multi-step customer booking flow (vehicle selection, details, confirmation)
- Trip records linking vehicle, driver, customer, fare and expenses
- Trip statuses: scheduled, in progress, completed, cancelled
- Customer enquiry forms with email notification

### Financial Management
- Chart of accounts (double-entry style ledger structure)
- Income, expense and transfer records with attachments
- Multiple account types: cash, bank, mobile wallet
- Payment method management
- Reports: account statement, income report, expense report, transfer report, income vs expense, report by payer / payee

### Maintenance Operations
- Service records with cost tracking and linked issues
- Issue tracking per vehicle
- Fuel logs with mileage and cost history

### Contacts (CRM)
- Contacts with photos, groups, phones, emails and notes
- Contact grouping (drivers, clients, suppliers, partners)
- Direct email sending from the contact list
- Server-side searchable, paginated data tables

### Multi-Company & Roles
- Multi-company data scoping - each company only sees its own records
- User types: **admin**, **company user**, **staff**, **driver**, **client**
- Role-based dashboards and route middleware
- Client portal with trip history and profile
- Membership settings: trial period, monthly / yearly pricing, signup toggle

### Content & Marketing Website
- Responsive public website: home, vehicle listings, search, pricing, blog, about, contact, FAQ, terms & privacy pages
- Blog / news module with image uploads
- Rich text editing (TinyMCE) across the admin panel

### Administration & Tools
- General settings, logo & favicon upload, theme options
- Email template manager
- One-click database backup: create, download, delete
- Cache clearing from the admin panel
- English / বাংলা language switcher (easily extendable)
- REST API scaffold with Laravel Sanctum

## Tech Stack

| Layer | Technology |
| --- | --- |
| Backend | PHP 8.1+, Laravel 10, Laravel Sanctum, Laravel UI |
| Database | MySQL / MariaDB |
| Frontend | Blade, Bootstrap 5, jQuery, Vite, Sass |
| UI plugins | Chart.js, DataTables, Select2, SweetAlert2, Toastr, TinyMCE, Dropify, FullCalendar, DateRangePicker, Parsley.js, Font Awesome |
| Images | Intervention Image |

## Requirements

- PHP >= 8.1 with `pdo_mysql`, `openssl`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `fileinfo` and `gd` extensions
- Composer
- MySQL 5.7+ / MariaDB 10.3+
- Node.js 16+ and npm (only needed to rebuild frontend assets)

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/SultanBayezid/Vehicle-Management-System.git
cd Vehicle-Management-System

# 2. Install PHP dependencies
composer install

# 3. Install frontend dependencies and build assets
npm install
npm run build

# 4. Configure the environment
cp .env.example .env
php artisan key:generate

# 5. Create a database and set credentials in .env
#    DB_DATABASE=vehicle_management
#    DB_USERNAME=your_user
#    DB_PASSWORD=your_password

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Start the development server
php artisan serve
```

Visit `http://127.0.0.1:8000` for the public website and `/login` for the admin panel.

### Default Account

| Field | Value |
| --- | --- |
| Email | `admin@example.com` |
| Password | `password` |

> Change these credentials immediately after the first login.

## Configuration Notes

- **Uploads** - user uploaded files are stored in `public/uploads/` (vehicles, drivers, contacts, blogs, transactions, profile pictures). The directories are created automatically; make sure the web server can write to them.
- **Mail** - set `MAIL_*` variables in `.env` or configure the mail driver from Settings after logging in.
- **Membership** - trial period, monthly / yearly cost and signup availability are controlled from the admin Settings screen.
- **Language** - add a new language by dropping a PHP translation file into `resources/language/` and switching from the admin panel.

## Project Structure (highlights)

```
app/
 ├── Http/Controllers/     # Feature controllers (vehicles, trips, finance, reports...)
 ├── Http/Middleware/      # admin, company, staff, driver, client guards
 ├── Models/               # Eloquent models
 ├── Helpers/general.php   # Global helpers (_lang(), get_option(), ...)
 └── Utilities/            # Installer, Overrider, Translator
database/
 ├── migrations/           # Full schema history
 └── seeders/              # Settings, admin user, brands & models reference data
resources/
 ├── views/frontend/       # Public marketing + booking website
 ├── views/backend/        # Admin panel views
 └── language/             # English + বাংলা translations
routes/web.php             # Public, client, company and admin route groups
```

## Contributing

Contributions are welcome. Please read [CONTRIBUTING.md](CONTRIBUTING.md) for the process.

## Security

If you discover a security vulnerability, please email **sultanbayezidai@gmail.com**. All reports will be addressed promptly.

## License

This project is open-sourced software licensed under the [MIT License](LICENSE).

## Author

**Sultan Bayezid** - Senior Full Stack Software Engineer, Bangladesh

- GitHub: [https://github.com/SultanBayezid](https://github.com/SultanBayezid)
- LinkedIn: [https://www.linkedin.com/in/sultanbayezid/](https://www.linkedin.com/in/sultanbayezid/)
- Website: [https://lastlineweb.com](https://lastlineweb.com)
- Email: sultanbayezidai@gmail.com
