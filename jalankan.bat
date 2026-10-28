@echo off
REM Menyalakan Catatin di Laragon. Buka Terminal Laragon di folder ini lalu ketik: jalankan.bat
REM (Cukup Laragon Start All. Database "catatin" dibuat OTOMATIS bila belum ada.)
php artisan catatin:setup
if errorlevel 1 (echo Gagal menyiapkan database. Cek DB_* di file .env & exit /b 1)
echo.
echo Buka http://127.0.0.1:8000   Akun: user@gmail.com / usercatatin
php artisan serve
