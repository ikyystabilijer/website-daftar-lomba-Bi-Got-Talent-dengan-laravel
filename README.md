# Laravel Project

Aplikasi ini dibuat menggunakan **Laravel** dan digunakan untuk Mengelola pendaftaran lomba bi got tallent.

## 🛠️ Teknologi yang Digunakan

* PHP 8.5+
* Laravel 13
* MySQL / MariaDB
* Composer
* Node.js & NPM
* Vite

---

## 📋 Persyaratan

Pastikan perangkat sudah memiliki:

* PHP
* Composer
* MySQL / MariaDB
* Node.js
* NPM
* Git

Cek versi:

```bash
php -v
composer -V
node -v
npm -v
```

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/ikyystabilijer/website-daftar-lomba-Bi-Got-Talent-dengan-laravel
```

Masuk ke folder project:

```bash
cd website-daftar-lomba-Bi-Got-Talent-dengan-laravel
```

---

### 2. Install Dependency Laravel

Install dependency PHP menggunakan Composer:

```bash
composer install
```

---

### 3. Install Dependency Frontend

```bash
npm install
```

---

### 4. Buat File `.env`

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Kemudian buka file `.env`:

```bash
nano .env
```

Atau bisa menggunakan VS Code:

```bash
code .env
```

Sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_bi_got_talent
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan konfigurasi MySQL/MariaDB di komputer.

---

### 5. Generate Application Key

Jalankan:

```bash
php artisan key:generate
```

Perintah ini akan membuat `APP_KEY` pada file `.env`.

---

### 6. Buat Database

Buat database baru melalui **phpMyAdmin**, MySQL, atau MariaDB.

Contoh:

```sql
CREATE DATABASE nama_database;
```

Pastikan nama database sama dengan konfigurasi:

```env
DB_DATABASE=nama_database
```

---

### 7. Jalankan Migration

Untuk membuat tabel database:

```bash
php artisan migrate
```

Jika project memiliki seeder dan membutuhkan data awal:

```bash
php artisan db:seed
```

Atau langsung menjalankan migration sekaligus seeder:

```bash
php artisan migrate --seed
```

> ⚠️ Jangan menjalankan `php artisan migrate:fresh --seed` pada database yang berisi data penting karena perintah tersebut akan menghapus seluruh tabel dan membuatnya kembali.

---

### 8. Buat Storage Link

Jika project menggunakan upload gambar/file:

```bash
php artisan storage:link
```

---

### 9. Jalankan Vite

Buka terminal baru dan jalankan:

```bash
npm run dev
```

Biarkan terminal ini tetap berjalan selama development.

---

### 10. Jalankan Laravel

Buka terminal lain:

```bash
php artisan serve
```

Kemudian buka:

```text
http://127.0.0.1:8000
```

---

# 🔐 Login

Gunakan akun berikut untuk masuk ke aplikasi.

## Admin

```text
Email    : admin@bigottalent.test
Password : password123
```

## User / Siswa

sesuai dengan yang kamu tambahkan di menu kelola akun siswa pada dashboard admin

> Jika akun login dibuat melalui seeder, jalankan terlebih dahulu:

```bash
php artisan migrate --seed
```

Jika akun dibuat secara manual, silakan buat akun melalui halaman registrasi atau database sesuai kebutuhan aplikasi.

---

# 📖 Cara Menggunakan Project

## 1. Login

Buka halaman:

```text
http://127.0.0.1:8000
```

Masukkan email dan password sesuai akun yang tersedia.

## 2. Dashboard

Setelah berhasil login, pengguna akan diarahkan ke halaman dashboard.

Pada dashboard, pengguna dapat mengakses fitur sesuai dengan role yang dimiliki.

## 3. Admin

Admin dapat mengakses fitur seperti:

* Mengelola data pengguna
* Menambah data
* Mengubah data
* Menghapus data
* Melihat data
  
## 4. User

User dapat menggunakan fitur seperti:

* Daftar Lomba
sesuai dengan yang kamu tambahkan di dashboard admin

---

# 🧹 Membersihkan Cache

Jika mengalami masalah konfigurasi, route, atau view, coba jalankan:

```bash
php artisan optimize:clear
```

Atau secara terpisah:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

# 🔄 Menjalankan Project Setelah Pernah Diinstall

Jika project sudah pernah di-setup sebelumnya, biasanya cukup:

```bash
composer install
npm install
```

Pastikan `.env` sudah tersedia dan database sudah terhubung.

Kemudian:

```bash
php artisan migrate
```

Jalankan:

```bash
npm run dev
```

Dan di terminal lain:

```bash
php artisan serve
```

Buka:

```text
http://127.0.0.1:8000
```

---

# ⚠️ Troubleshooting

### APP_KEY belum tersedia

Jalankan:

```bash
php artisan key:generate
```

### Database tidak ditemukan

Pastikan database sudah dibuat dan konfigurasi `.env` sudah benar.

Kemudian jalankan:

```bash
php artisan migrate
```

### Perubahan `.env` tidak terbaca

Jalankan:

```bash
php artisan optimize:clear
```

### Tampilan CSS/JavaScript tidak muncul

Pastikan Vite sedang berjalan:

```bash
npm run dev
```

### Storage gambar/file tidak muncul

Jalankan:

```bash
php artisan storage:
```

---

# 👨‍💻 Developer

**Nama:** [Ikyy stabilijer]

**GitHub:** https://github.com/ikyystabilijer

---

# 📄 License

Project ini dibuat untuk keperluan pembelajaran / tugas / portfolio.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
