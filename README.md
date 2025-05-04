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

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Proyek FWB</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      line-height: 1.6;
      background-color: #f9f9f9;
      color: #333;
    }
    h1, h2, h3 {
      color: #2c3e50;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #aaa;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #eaeaea;
    }
    .section {
      margin-bottom: 40px;
    }
  </style>
</head>
<body>

  <h1>Judul Proyek</h1>
  <p><em>(Isi dengan nama proyek Anda)</em></p>

  <div class="section">
    <h2>Nama dan NIM</h2>
    <p><strong>Nama:</strong> (Isi Nama Anda)</p>
    <p><strong>NIM:</strong> (Isi NIM Anda)</p>
  </div>

  <div class="section">
    <h2>Mata Kuliah dan Tahun</h2>
    <p><strong>Mata Kuliah:</strong> (Contoh: Pengembangan Web Berbasis Framework)</p>
    <p><strong>Tahun:</strong> (Contoh: 2025)</p>
  </div>

  <div class="section">
    <h2>Role dan Fitur-fiturnya</h2>
    <ul>
      <li><strong>Admin:</strong> Kelola user, kelola data produk</li>
      <li><strong>User:</strong> Registrasi, login, beli produk</li>
      <!-- Tambah sesuai kebutuhan -->
    </ul>
  </div>

  <div class="section">
    <h2>Tabel-tabel Database</h2>

    <h3>1. Tabel Users</h3>
    <table>
      <tr>
        <th>Nama Field</th>
        <th>Tipe Data</th>
        <th>Keterangan</th>
      </tr>
      <tr>
        <td>id</td>
        <td>INT</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>nama</td>
        <td>VARCHAR(100)</td>
        <td>Nama lengkap user</td>
      </tr>
      <!-- Tambah baris sesuai field Anda -->
    </table>

    <h3>2. Tabel Produk</h3>
    <table>
      <tr>
        <th>Nama Field</th>
        <th>Tipe Data</th>
        <th>Keterangan</th>
      </tr>
      <tr>
        <td>id</td>
        <td>INT</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>nama_produk</td>
        <td>VARCHAR(100)</td>
        <td>Nama produk</td>
      </tr>
      <!-- Tambah baris sesuai field Anda -->
    </table>
  </div>

  <div class="section">
    <h2>Jenis Relasi dan Tabel yang Berelasi</h2>
    <p>Contoh:</p>
    <ul>
      <li>One to Many: 1 user dapat memiliki banyak produk</li>
      <li>Relasi antara tabel <strong>Users</strong> dan <strong>Produk</strong> melalui user_id</li>
    </ul>
  </div>

</body>
</html>
