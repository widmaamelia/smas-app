# SMAS App

Panduan ini digunakan untuk menjalankan project **SMAS App** setelah clone dari GitHub. 

## Langkah Singkat

1. Clone repository:

```bash
git clone https://github.com/widmaamelia/smas-app.git smas-app
cd smas-app
```

2. Install dependency backend:

```bash
composer install
```

3. Install dependency frontend:

```bash
npm install
```

4. Salin file environment:

Windows:
```bash
copy .env.example .env
```

Linux/macOS:
```bash
cp .env.example .env
```

5. Generate app key:

```bash
php artisan key:generate
```

6. Atur database di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

7. Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

8. Atur email di `.env` (untuk reset password):

```env
MAIL_MAILER=smtp
MAIL_SCHEME=tls
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=you@example.com
MAIL_PASSWORD=your_email_password
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="SMAS App"
```

9. Jalankan aplikasi:

Terminal 1:
```bash
php artisan serve
```

Terminal 2:
```bash
npm run dev
```
buka terminal untu bikin storage link :
``` bash
php artisan storage:link

```

10. Buka di browser:

```text
http://127.0.0.1:8000
```

## Catatan

- Pastikan database sudah dibuat sebelum migrasi.
- Jika `.env` berubah, jalankan:

```bash
php artisan config:clear
```

- Login admin default dibuat saat seeder dijalankan.

Project **SMAS App** sekarang siap dijalankan.