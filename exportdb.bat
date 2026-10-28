@echo off
REM Membuat file db_catatin.sql (struktur + isi + trigger + function) dari database "catatin" yang sedang dipakai.
REM Jalankan dari Terminal Laragon di folder ini:  exportdb.bat
mysqldump -u root --routines --triggers --single-transaction --default-character-set=utf8mb4 catatin > db_catatin.sql
if errorlevel 1 (echo Gagal. Jalankan dari Terminal Laragon, dan isi -p bila MySQL-mu memakai sandi. & exit /b 1)
echo Selesai: db_catatin.sql
