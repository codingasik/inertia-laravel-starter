# Laravel 13 + React + Inertia Starter

Starter project sederhana untuk membangun aplikasi web menggunakan **Laravel 13, React JS, Inertia.js, dan Tailwind CSS 4**.

Repository ini dibuat untuk mempermudah proses setup Laravel dengan React dan Inertia, sehingga kamu tidak perlu melakukan konfigurasi manual dari awal atau menghadapi potensi konflik dependency saat instalasi.

Cocok untuk belajar maupun sebagai fondasi awal membangun aplikasi web.

## Tech Stack

- **Laravel 13** — Backend framework
- **React JS** — Frontend library
- **Inertia.js** — Penghubung Laravel dan React
- **Tailwind CSS 4** — Utility-first CSS framework
- **Vite** — Frontend build tool

## Fitur dan Konfigurasi

Beberapa konfigurasi dasar sudah disiapkan di dalam repository ini:

- Integrasi Laravel 13 dengan React JS dan Inertia.js.
- Konfigurasi Vite untuk React dan Tailwind CSS.
- Root Blade template dengan Inertia dan Tailwind CSS.
- Middleware `HandleInertiaRequests`.
- React entry point (`app.jsx`).
- Contoh halaman React pertama (`Welcome.jsx`).
- Routing Laravel yang sudah terhubung dengan halaman React.
- Model, migration, factory, dan seeder yang sudah disiapkan.
- File `.env.example` sebagai template konfigurasi environment.

**Tujuan starter ini:** kamu bisa langsung fokus belajar dan mengembangkan aplikasi, tanpa perlu mengulang konfigurasi awal.

---

## 1. Requirements

Pastikan perangkat kamu sudah memiliki beberapa software berikut:

| Software | Kebutuhan |
|---|---|
| PHP | 8.3 atau lebih baru |
| Composer | Composer 2 |
| Node.js | 20.19+ atau 22.12+ |
| NPM | Terpasang bersama Node.js |
| Git | Untuk clone repository |
| Database | MySQL / MariaDB atau database yang dikonfigurasi di `.env` |
| Code Editor | Visual Studio Code (direkomendasikan) |

### Rekomendasi: Menggunakan Laragon

Jika menggunakan Windows, kamu bisa menggunakan Laragon untuk mempermudah pengelolaan PHP, MySQL, dan web server lokal.

Panduan instalasi Laragon 6 bisa kamu baca di sini:

https://github.com/codingasik/install-laragon-versi-6

Pastikan PHP dan Composer sudah bisa dijalankan melalui terminal.

Cek instalasi dengan perintah:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

Jika semua perintah menampilkan versi masing-masing software, berarti kebutuhan awal sudah terpenuhi.

---

## 2. Clone Repository

Buka terminal atau terminal di Visual Studio Code.

Clone repository ini:

```bash
git clone https://github.com/codingasik/inertia-laravel-starter.git inertia-laravel
```

Masuk ke folder project:

```bash
cd inertia-laravel
```

---

## 3. Install Dependencies

Install dependency Laravel menggunakan Composer:

```bash
composer install
```

Selanjutnya, install dependency frontend menggunakan NPM:

```bash
npm install
```

Semua konfigurasi dependency Laravel, React, Inertia, dan Vite sudah disiapkan di repository ini.

Kamu tidak perlu menginstalnya satu per satu lagi.

---

## 4. Environment Configuration

Buat file `.env` berdasarkan template yang sudah tersedia.

Untuk Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Atau menggunakan Command Prompt:

```cmd
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### Konfigurasi Database

Buka file `.env`, kemudian sesuaikan konfigurasi database dengan database lokal kamu.

Contoh menggunakan MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inertia_laravel
DB_USERNAME=root
DB_PASSWORD=
```

Buat database dengan nama `inertia_laravel` melalui phpMyAdmin, HeidiSQL, atau database management tool lainnya.

Sesuaikan username dan password dengan konfigurasi database di perangkat kamu.

---

## 5. Migration dan Seeder

Project ini sudah menyediakan beberapa file Model, Migration, Factory, dan Seeder.

Jalankan migration sekaligus seeder menggunakan perintah:

```bash
php artisan migrate --seed
```

Perintah tersebut akan membuat tabel database sekaligus mengisi data awal sesuai konfigurasi seeder yang tersedia.

Jika ingin menjalankan migration saja:

```bash
php artisan migrate
```

---

## 6. Menjalankan Project

Setelah semua proses instalasi selesai, buka dua terminal di folder project.

**Terminal 1 — Menjalankan Laravel**

```bash
php artisan serve
```

Secara default, Laravel akan berjalan di:

```text
http://127.0.0.1:8000
```

**Terminal 2 — Menjalankan Vite**

```bash
npm run dev
```

Vite akan menjalankan development server untuk memproses file React dan CSS.

Sekarang buka browser:

http://127.0.0.1:8000

Jika semua konfigurasi berhasil, kamu akan melihat halaman React pertama yang sudah terhubung dengan Laravel melalui Inertia.js.

---

## 7. Struktur Folder Penting

Berikut beberapa folder dan file penting dalam project ini:

```text
inertia-laravel/
├── app/
│   ├── Http/
│   │   └── Middleware/
│   │       └── HandleInertiaRequests.php
│   └── Models/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   ├── pages/
│   │   │   └── Welcome.jsx
│   │   └── app.jsx
│   └── views/
│       └── app.blade.php
│
├── routes/
│   └── web.php
│
├── bootstrap/
│   └── app.php
│
├── vite.config.js
├── package.json
└── composer.json
```

### Beberapa file yang perlu kamu ketahui

| File | Fungsi |
|---|---|
| `routes/web.php` | Mengatur routing aplikasi Laravel |
| `resources/js/app.jsx` | Entry point aplikasi React |
| `resources/js/pages/` | Menyimpan halaman React |
| `resources/views/app.blade.php` | Root template aplikasi Inertia |
| `vite.config.js` | Konfigurasi Vite dan plugin frontend |
| `HandleInertiaRequests.php` | Middleware untuk menangani request Inertia |

---

## 8. Membuat Halaman React Baru

Untuk membuat halaman React baru, buat file di dalam folder:

```text
resources/js/pages/
```

Contohnya, buat file `About.jsx`:

```jsx
export default function About() {
    return (
        <div className="min-h-screen flex items-center justify-center">
            <h1 className="text-3xl font-bold">
                About Page
            </h1>
        </div>
    );
}
```

Kemudian tambahkan route di `routes/web.php`:

```php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/about', function () {
    return Inertia::render('About');
});
```

Jalankan aplikasi dan buka:

```text
http://127.0.0.1:8000/about
```

Halaman React akan ditampilkan melalui Inertia tanpa perlu membuat aplikasi frontend dan backend secara terpisah.

---

## 9. Build untuk Production

Jika ingin melakukan build frontend untuk kebutuhan production, jalankan:

```bash
npm run build
```

Vite akan mengompilasi file JavaScript dan CSS ke dalam folder `public/build`.

Untuk development sehari-hari, tetap gunakan:

```bash
npm run dev
```

---

## Credits

Starter project ini dibuat dan disediakan oleh **Coding Asik** untuk membantu proses belajar dan pengembangan aplikasi web menggunakan Laravel, React, dan Inertia.js.

Website: https://codingasikacademy.com

Instagram: https://instagram.com/codingasik

TikTok: https://tiktok.com/@codingasik

YouTube: https://youtube.com/codingasik

---

**Happy Coding! 🚀**

Belajar, praktik, dan kembangkan project-mu bersama Coding Asik.