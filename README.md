<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 🏠 HouseHub - House Rent Management System

A simple and user-friendly house rent management system built with **Laravel 10**, using the **Breeze starter kit** for authentication.  
This version is designed specifically for **landlords** to manage multiple buildings, floors, flats, renters, rent reports, and monthly invoices.

---

## 📌 Features

- 🔐 Breeze-based Authentication (Landlord role)
- 🏢 Manage multiple Buildings → Floors → Flats
- 👥 Assign Renters to Flats with start/leave month tracking
- 💵 Define Flat Details: rooms, size, rent fee, extra fees
- 📆 Monthly Rent Report auto-generated for each renter
- 💳 Record Payments per renter/month
- 📊 Track Due & Advance Balances across months
- 🧾 Generate Monthly Invoices per renter with a full breakdown
- 📚 Role-based access (Spatie Laravel Permission)
- ✨ Clean, modular, and extendable code

---

## 🛠️ Tech Stack

- **Laravel 10**
- **Laravel Breeze** (with Blade)
- **Spatie Laravel Permission**
- **MySQL**
- **Tailwind CSS** (via Breeze)
- **Custom Template Mastered**
- **AJAX** for adding utility charges dynamically

---

## 🗂️ Database Overview

### Entities:

- `users`: All users (initially Landlord only)
- `buildings`: Owned by landlord
- `floors`: Belong to buildings
- `flats`: Belong to floors; store rent info
- `renters`: Assigned to flats
- `payments`: Monthly payments by renters
- `monthly_rent_reports`: Summary of rent dues, balances per flat/month

---

## 📦 Installation

```bash
git clone https://github.com/your-username/house-rent-management.git
cd house-rent-management

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure your DB credentials in `.env`
php artisan migrate
php artisan db:seed 

# Start the server
php artisan serve
npm run dev
```
