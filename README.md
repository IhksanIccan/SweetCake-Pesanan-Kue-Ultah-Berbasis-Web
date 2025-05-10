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

<hr>

<h2>Role dan Fitur-fiturnya</h2>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>Role</th>
    <th>Fitur</th>
  </tr>
  <tr>
    <td>Admin</td>
    <td>
      - Mengelola data user (tambah staff, edit, hapus)<br>
      - Mengelola data kue<br>
      - Mengelola seluruh pesanan
    </td>
  </tr>
  <tr>
    <td>Customer</td>
    <td>
      - Melihat daftar kue<br>
      - Melakukan pemesanan<br>
      - Melihat riwayat & status pesanan
    </td>
  </tr>
  <tr>
    <td>Staff</td>
    <td>
      - Melihat pesanan yang masuk<br>
      - Mengubah status pesanan (diproses, selesai, dibatalkan)
    </td>
  </tr>
</table>

<hr>

<h2>Tabel 1: <code>users</code></h2>
<table border="1" cellspacing="0" cellpadding="5">
  <tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
  <tr><td>name</td><td>VARCHAR(255)</td><td>Nama lengkap pengguna</td></tr>
  <tr><td>email</td><td>VARCHAR(255)</td><td>Unik, digunakan saat login</td></tr>
  <tr><td>password</td><td>VARCHAR(255)</td><td>Terenkripsi (bcrypt)</td></tr>
  <tr><td>role</td><td>ENUM</td><td>admin, customer, atau staff</td></tr>
  <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu data dibuat</td></tr>
  <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu data diperbarui</td></tr>
</table>

<h2>Tabel 2: <code>kues</code></h2>
<table border="1" cellspacing="0" cellpadding="5">
  <tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
  <tr><td>nama_kue</td><td>VARCHAR(255)</td><td>Nama kue</td></tr>
  <tr><td>deskripsi</td><td>TEXT</td><td>Deskripsi tambahan</td></tr>
  <tr><td>harga</td><td>INTEGER</td><td>Harga dalam rupiah</td></tr>
  <tr><td>gambar</td><td>VARCHAR(255)</td><td>Path gambar</td></tr>
  <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu dibuat</td></tr>
  <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu diperbarui</td></tr>
</table>

<h2>Tabel 3: <code>pesanans</code></h2>
<table border="1" cellspacing="0" cellpadding="5">
  <tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
  <tr><td>user_id</td><td>BIGINT</td><td>Relasi ke tabel <code>users</code></td></tr>
  <tr><td>kue_id</td><td>BIGINT</td><td>Relasi ke tabel <code>kues</code></td></tr>
  <tr><td>jumlah</td><td>INTEGER</td><td>Jumlah kue dipesan</td></tr>
  <tr><td>tanggal_pesan</td><td>DATE</td><td>Tanggal pemesanan</td></tr>
  <tr><td>status</td><td>VARCHAR(50)</td><td>menunggu / diproses / selesai</td></tr>
  <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu dibuat</td></tr>
  <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu diperbarui</td></tr>
</table>

<h2>Tabel 4: <code>staff_profiles</code></h2>
<table border="1" cellspacing="0" cellpadding="5">
  <tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
  <tr><td>user_id</td><td>BIGINT</td><td>Relasi ke <code>users</code></td></tr>
  <tr><td>jabatan</td><td>VARCHAR(100)</td><td>Opsional, deskripsi jabatan</td></tr>
  <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu dibuat</td></tr>
  <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu diperbarui</td></tr>
</table>

<hr>

<h2>Relasi Antar Tabel</h2>
<ul>
  <li><b>One to One</b>: <code>users</code> ↔ <code>staff_profiles</code><br>
      → Satu user dengan role 'staff' memiliki satu data profil tambahan.</li>
  <li><b>One to Many</b>: <code>users</code> → <code>pesanans</code><br>
      → Customer dapat membuat banyak pesanan.</li>
  <li><b>One to Many</b>: <code>kues</code> → <code>pesanans</code><br>
      → Satu jenis kue bisa dipesan berkali-kali oleh banyak user.</li>
  <li><b>Many to Many (opsional)</b>: <code>users</code> ↔ <code>kues</code><br>
      → Digunakan untuk fitur favorit kue (jika dibuat).</li>
</ul>

