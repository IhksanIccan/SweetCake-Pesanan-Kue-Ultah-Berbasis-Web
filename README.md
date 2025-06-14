<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan SweetCake</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 40px;
      color: #333;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }
    th, td {
      border: 1px solid #999;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    h2 {
      margin-top: 40px;
      border-bottom: 2px solid #333;
      padding-bottom: 5px;
    }
    .center {
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="center">
    <h1>SweetCake</h1>
    <p><i>(Pesanan Kue Ultah Berbasis Web)</i></p>
    <img src="https://github.com/user-attachments/assets/8186e035-a8c5-4974-beee-ca21c8e2b71b" width="150" alt="Logo"><br><br>
    <strong>IHKSAN</strong><br>
    <strong>D0223049</strong><br>
    <p>Framework Web Based<br>2025</p>
  </div>

  <hr>

  <h2>Role dan Fitur-Fitur</h2>
  <table>
    <thead>
      <tr>
        <th>Role</th>
        <th>Fitur-Fitur</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Admin</td>
        <td>
          - Kelola semua pengguna<br>
          - Kelola semua pesanan<br>
          - Pantau data kue
        </td>
      </tr>
      <tr>
        <td>Penjual</td>
        <td>
          - Tambah/edit/hapus kue<br>
          - Lihat pesanan yang masuk
        </td>
      </tr>
      <tr>
        <td>Pembeli</td>
        <td>
          - Lihat daftar kue<br>
          - Pesan kue<br>
          - Lihat status dan riwayat pesanan
        </td>
      </tr>
    </tbody>
  </table>

  <h2>Struktur Tabel</h2>

  <h3>1. users</h3>
  <table>
    <thead>
      <tr>
        <th>Field</th><th>Tipe Data</th><th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>BIGINT</td><td>Primary key, auto increment</td></tr>
      <tr><td>name</td><td>VARCHAR(255)</td><td>Nama lengkap pengguna</td></tr>
      <tr><td>email</td><td>VARCHAR(255)</td><td>Email unik untuk login</td></tr>
      <tr><td>password</td><td>VARCHAR(255)</td><td>Password terenkripsi</td></tr>
      <tr><td>role</td><td>ENUM</td><td>admin, penjual, pembeli</td></tr>
      <tr><td>created_at</td><td>TIMESTAMP</td><td>Tanggal dibuat otomatis</td></tr>
      <tr><td>updated_at</td><td>TIMESTAMP</td><td>Tanggal diperbarui otomatis</td></tr>
    </tbody>
  </table>

  <h3>2. profiles</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
      <tr><td>user_id</td><td>BIGINT</td><td>Relasi ke tabel users</td></tr>
      <tr><td>alamat</td><td>TEXT</td><td>Alamat lengkap pengguna</td></tr>
      <tr><td>no_hp</td><td>VARCHAR(20)</td><td>Nomor telepon pengguna</td></tr>
      <tr><td>created_at</td><td>TIMESTAMP</td><td>Tanggal dibuat</td></tr>
      <tr><td>updated_at</td><td>TIMESTAMP</td><td>Tanggal diperbarui</td></tr>
    </tbody>
  </table>

  <h3>3. kues</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
      <tr><td>user_id</td><td>BIGINT</td><td>Foreign key ke users (penjual)</td></tr>
      <tr><td>nama_kue</td><td>VARCHAR(255)</td><td>Nama kue</td></tr>
      <tr><td>deskripsi</td><td>TEXT</td><td>Deskripsi kue</td></tr>
      <tr><td>harga</td><td>INTEGER</td><td>Harga dalam rupiah</td></tr>
      <tr><td>gambar</td><td>VARCHAR(255)</td><td>Nama file gambar kue</td></tr>
      <tr><td>created_at</td><td>TIMESTAMP</td><td>Tanggal dibuat</td></tr>
      <tr><td>updated_at</td><td>TIMESTAMP</td><td>Tanggal diperbarui</td></tr>
    </tbody>
  </table>

  <h3>4. pesanans</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
      <tr><td>user_id</td><td>BIGINT</td><td>Relasi ke users (pembeli)</td></tr>
      <tr><td>tanggal_pesan</td><td>DATE</td><td>Tanggal dilakukan pemesanan</td></tr>
      <tr><td>status</td><td>VARCHAR(50)</td><td>Status: menunggu, diproses, selesai, dibatalkan</td></tr>
      <tr><td>created_at</td><td>TIMESTAMP</td><td>Tanggal dibuat</td></tr>
      <tr><td>updated_at</td><td>TIMESTAMP</td><td>Tanggal diperbarui</td></tr>
    </tbody>
  </table>

  <h3>5. kue_pesanan (pivot)</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
      <tr><td>pesanan_id</td><td>BIGINT</td><td>Foreign key ke pesanans</td></tr>
      <tr><td>kue_id</td><td>BIGINT</td><td>Foreign key ke kues</td></tr>
      <tr><td>jumlah</td><td>INTEGER</td><td>Jumlah item yang dipesan</td></tr>
      <tr><td>created_at</td><td>TIMESTAMP</td><td>Tanggal dibuat</td></tr>
      <tr><td>updated_at</td><td>TIMESTAMP</td><td>Tanggal diperbarui</td></tr>
    </tbody>
  </table>

  <h3>6. pembayaran</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>BIGINT</td><td>Primary key</td></tr>
      <tr><td>pesanan_id</td><td>BIGINT</td><td>Relasi ke pesanans</td></tr>
      <tr><td>metode</td><td>VARCHAR(100)</td><td>Transfer, COD, dll</td></tr>
      <tr><td>status_bayar</td><td>VARCHAR(50)</td><td>Lunas / Belum Lunas</td></tr>
      <tr><td>created_at</td><td>TIMESTAMP</td><td>Tanggal dibuat</td></tr>
      <tr><td>updated_at</td><td>TIMESTAMP</td><td>Tanggal diperbarui</td></tr>
    </tbody>
  </table>

  <h2>Relasi Antar Tabel</h2>
  <table>
    <thead>
      <tr>
        <th>Relasi</th>
        <th>Jenis Relasi</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>users ↔ profiles</td><td>One to One</td><td>Setiap pengguna memiliki 1 profil</td></tr>
      <tr><td>users ↔ kues</td><td>One to Many</td><td>Penjual memiliki banyak kue</td></tr>
      <tr><td>users ↔ pesanans</td><td>One to Many</td><td>Pembeli dapat memiliki banyak pesanan</td></tr>
      <tr><td>pesanans ↔ kues</td><td>Many to Many</td><td>Relasi lewat tabel pivot kue_pesanan</td></tr>
      <tr><td>pesanans ↔ pembayaran</td><td>One to One</td><td>Satu pesanan memiliki satu data pembayaran</td></tr>
    </tbody>
  </table>

</body>
</html>
