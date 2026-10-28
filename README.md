# Catatin — Laravel + MySQL (login, sinkronisasi Android)

Aplikasi pencatat barang/memo/tabel. Data di MySQL, dijaga trigger database (validasi + riwayat + Urungkan).
Tiap akun hanya melihat datanya sendiri. Aplikasi Android bisa menyinkronkan data lewat token Sanctum.

## Jalankan di Laragon (Windows)
1. Laragon: Start All (database "catatin" dibuat otomatis, tidak perlu HeidiSQL).
2. Salin `.env.example` menjadi `.env` (bila belum ada), lalu `php artisan key:generate`.
3. Terminal Laragon di folder ini: `jalankan.bat`  (sama dengan `php artisan catatin:setup` lalu `php artisan serve`).
4. Buka http://127.0.0.1:8000 — akun bawaan `user@gmail.com` / `usercatatin`. Akun baru yang mendaftar mulai kosong.

Tidak perlu import file SQL. Database baru langsung berisi data contoh. Untuk membuat file `.sql` terbaru dari databasemu (mis. untuk dikumpulkan): `exportdb.bat`. `catatin:setup` membuat tabel, trigger, view, dan akun bawaan; aman dijalankan berulang dan tidak menghapus data.

## Aplikasi Android
Di aplikasi Android ketuk lencana status di atas, isi alamat server (harus https://), email, kata sandi. Token Sanctum dipakai untuk sinkron.

## Struktur penting
- `routes/web.php` halaman + login; `routes/catatin.php` API web (sesi); `routes/api.php` API Android (token Sanctum)
- `app/Http/Controllers/SyncController.php` sinkronisasi dua arah + konflik versi
- `app/Support/CatatinSetup.php` & `CatatinTriggers.php` penyiapan database otomatis
- `resources/views/catatin.blade.php` tampilan (dibuat dari index.html)
