# Tugas E-Learning Semester 5
## Skill Block Courses

ini adalah sebuah kursus rancangan kami yang beranggotakan 4 orang
- Rizki Anas Mustakim
- Andreas Stephen Hadisuwito
- Fajar Hermawan 
- Yusup Afifur Rohman
## Fitur 
- Login Register ✔️
- Add Materi ✔️
- User Profile ✔️
- Add Course ❌
- Forum Discuss ❌
- Full UI ❌
## Cara Install
- clone github 
```
git clone https://github.com/RvXRN/skill-block-course && cd skill-block-course
```
- install dependensi
```
composer install && npm install
```
- copy env

   - linux
    ```
    cp .env.example .env
    ```
    - windows
    ```
    copy .env.example .env
    ```
    tambahkan kredensial database anda
- generate key app
```
php artisan key:generate
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

- user dummy 
    - admin
    ```
    admin@sekolah.com
    password123
    ```
    - guru
    ```
    guru@sekolah.com
    password123
    ```
    - siswa
    ```
    siswa@sekolah.com
    password123
    ```
 di lisensikan mit dan untuk url project https://github.com/RvXRN/skill-block-course
