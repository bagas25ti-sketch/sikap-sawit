# Cara pasang (di laptop)

1. Pastikan project Laravel sudah terinstal dan `.env` terhubung ke database
   (Laravel 11+ memakai SQLite secara default, tidak perlu setup tambahan).
2. Salin isi folder ini ke root project Laravel, timpa file yang sama
   (`routes/web.php`, `database/seeders/DatabaseSeeder.php`).
3. Jalankan:

       php artisan migrate
       php artisan db:seed
       php artisan serve

4. Buka http://127.0.0.1:8000 (Dashboard) dan http://127.0.0.1:8000/perlengkapan (CRUD).

Push ke GitHub:

    git add .
    git commit -m "Terapkan template Skydash dan CRUD perlengkapan"
    git push
