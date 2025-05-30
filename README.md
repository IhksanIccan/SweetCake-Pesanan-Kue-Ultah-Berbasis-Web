<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->

<p align="center">
  <b>SweetCake</b><br>
  <i>(Pesanan Kue Ultah Berbasis Web)</i><br><br>
  <img src="https://github.com/user-attachments/assets/8186e035-a8c5-4974-beee-ca21c8e2b71b" width="150"><br><br>
  <b>IHKSAN</b><br>
  <b>D0223049</b><br><br>
  Framework Web Based<br>
  2025
</p>

---

### **Role dan Fitur-Fitur**

| Role     | Fitur-Fitur                                                                    |
| -------- | ------------------------------------------------------------------------------ |
| Admin    | - Kelola data kue (tambah, edit, hapus)<br>- Kelola pesanan<br>- Kelola user   |
| Customer | - Lihat daftar kue<br>- Pesan kue<br>- Lihat status pesanan                    |
| Staff    | - Lihat pesanan yang masuk<br>- Update status pesanan (diproses, selesai, dll) |

---

### **Struktur Tabel**

#### **1. users**

| Field       | Tipe Data    | Keterangan                  |
| ----------- | ------------ | --------------------------- |
| id          | BIGINT       | Primary key, auto increment |
| name        | VARCHAR(255) | Nama lengkap                |
| email       | VARCHAR(255) | Email unik untuk login      |
| password    | VARCHAR(255) | Password terenkripsi        |
| role        | ENUM         | admin, customer, staff      |
| created\_at | TIMESTAMP    | Tanggal dibuat              |
| updated\_at | TIMESTAMP    | Tanggal diperbarui          |

#### **2. customer\_profiles**

| Field       | Tipe Data   | Keterangan                  |
| ----------- | ----------- | --------------------------- |
| id          | BIGINT      | Primary key, auto increment |
| user\_id    | BIGINT      | Foreign key ke `users`      |
| alamat      | TEXT        | Alamat customer             |
| no\_hp      | VARCHAR(20) | Nomor HP                    |
| created\_at | TIMESTAMP   | Tanggal dibuat              |
| updated\_at | TIMESTAMP   | Tanggal diperbarui          |

#### **3. kues**

| Field       | Tipe Data    | Keterangan                  |
| ----------- | ------------ | --------------------------- |
| id          | BIGINT       | Primary key, auto increment |
| nama\_kue   | VARCHAR(255) | Nama kue                    |
| deskripsi   | TEXT         | Deskripsi kue               |
| harga       | INTEGER      | Harga kue                   |
| gambar      | VARCHAR(255) | Nama file gambar            |
| created\_at | TIMESTAMP    | Tanggal dibuat              |
| updated\_at | TIMESTAMP    | Tanggal diperbarui          |

#### **4. pesanans**

| Field          | Tipe Data   | Keterangan                          |
| -------------- | ----------- | ----------------------------------- |
| id             | BIGINT      | Primary key, auto increment         |
| user\_id       | BIGINT      | Foreign key ke `users` (customer)   |
| kue\_id        | BIGINT      | Foreign key ke `kues`               |
| jumlah         | INTEGER     | Jumlah kue yang dipesan             |
| tanggal\_pesan | DATE        | Tanggal pemesanan                   |
| status         | VARCHAR(50) | Status: menunggu, diproses, selesai |
| created\_at    | TIMESTAMP   | Tanggal dibuat                      |
| updated\_at    | TIMESTAMP   | Tanggal diperbarui                  |

#### **5. pesanan\_staff**

| Field       | Tipe Data | Keterangan                           |
| ----------- | --------- | ------------------------------------ |
| id          | BIGINT    | Primary key, auto increment          |
| pesanan\_id | BIGINT    | Foreign key ke `pesanans`            |
| staff\_id   | BIGINT    | Foreign key ke `users` (role: staff) |
| created\_at | TIMESTAMP | Tanggal dibuat                       |
| updated\_at | TIMESTAMP | Tanggal diperbarui                   |

---

### **Relasi Antar Tabel**

| Relasi                        | Jenis Relasi | Keterangan                                            |
| ----------------------------- | ------------ | ----------------------------------------------------- |
| `users` ↔ `customer_profiles` | One to One   | Setiap customer punya 1 data profil                   |
| `users` ↔ `pesanans`          | One to Many  | Customer bisa membuat banyak pesanan                  |
| `kues` ↔ `pesanans`           | One to Many  | 1 kue bisa dipesan dalam banyak pesanan               |
| `users` ↔ `pesanans` (staff)  | Many to Many | Relasi staff ↔ pesanan melalui tabel `pesanan_staff`  |
