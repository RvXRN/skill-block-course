# Tugas E-Learning Semester 5
## Skill Block Courses

ini adalah sebuah kursus rancangan kami yang beranggotakan 4 orang
- Rizki Anas Mustakim
- Andreas Stephen Hadisuwito
- Fajar Hermawan 
- Yusup Afifur Rohman
## Fitur 
- Login Register ✗
- Add Course ✗
- Forum Discuss ✗
- Full UI ✗
## Cara Install
- clone github 
```
git clone https://github.com/RvXRN/skill-block-course && cd skill-block-course
```
- install dependensi
```
composer install && npm install
```
- migrasi database 
```
php artisan migrate 
```
- dummy test user
```
php artisan db:seed --class=UserSeeder
```
- jalankan aplikasi gunakan 2 terminal/cmd
```
php artisan serve
npm run dev
```
- buka aplikasi
http://localhost:8000
