<p align="center">
  <b>Sistem Pemesanan Kue Ultah</b><br>
  <i>(SweetCake)</i><br><br>
  <img src="https://github.com/user-attachments/assets/3b46afe6-4be0-40ac-be1b-d7ba9f8f81cc" width="150"><br><br>
  <b>IHKSAN</b><br>
  <b>D0223049</b><br><br>
  Framework Web Based<br>
  2025
</p>

---

## Role dan Fitur-fiturnya

| Role     | Fitur                                                                                                                                   |
|----------|-----------------------------------------------------------------------------------------------------------------------------------------|
| Admin    | - Mengelola seluruh data pengguna (penjual & pelanggan) <br> - Melihat dan menghapus produk <br> - Melihat semua transaksi             |
| Penjual  | - Menambahkan, mengedit, dan menghapus produk <br> - Melihat pesanan terhadap produk miliknya <br> - Menetapkan kurir <br> - Mengubah status pesanan |
| Customer | - Melihat dan mencari produk <br> - Menambahkan produk ke keranjang dan melakukan pemesanan <br> - Melihat riwayat pesanan mereka      |

---

# 📦 Struktur Tabel Database

## Tabel 1: users

| Nama Field | Tipe Data    | Keterangan                                 |
|------------|--------------|--------------------------------------------|
| id         | BIGINT       | Primary key, auto increment                |
| name       | VARCHAR(255) | Nama lengkap pengguna                      |
| email      | VARCHAR(255) | Email unik untuk login                     |
| password   | VARCHAR(255) | Password terenkripsi                       |
| role       | ENUM         | Role pengguna: admin, penjual, pembeli|
| created_at | TIMESTAMP    | Waktu dibuat                               |
| updated_at | TIMESTAMP    | Waktu diperbarui                           |

---

## Tabel 2: penjuals

| Nama Field | Tipe Data    | Keterangan                                 |
|------------|--------------|--------------------------------------------|
| id         | BIGINT       | Primary key                                |
| user_id    | BIGINT       | Relasi ke users, hanya jika role = penjual |
| store_name | VARCHAR(255) | Nama toko                                  |
| address    | VARCHAR(255) | Alamat toko                                |
| created_at | TIMESTAMP    | Waktu dibuat                               |
| updated_at | TIMESTAMP    | Waktu diperbarui                           |

---

## Tabel 3: pembelis

| Nama Field    | Tipe Data    | Keterangan                                   |
|---------------|--------------|----------------------------------------------|
| id            | BIGINT       | Primary key                                  |
| user_id       | BIGINT       | Relasi ke users, hanya jika role = pembeli |
| phone_number  | VARCHAR(50)  | Nomor HP                                     |
| address       | VARCHAR(255) | Alamat pelanggan                             |
| created_at    | TIMESTAMP    | Waktu dibuat                                 |
| updated_at    | TIMESTAMP    | Waktu diperbarui                             |

---

## Tabel 4: produks

| Nama Field  | Tipe Data    | Keterangan                               |
|-------------|--------------|------------------------------------------|
| id          | BIGINT       | Primary key                              |
| seller_id   | BIGINT       | Relasi ke penjual                      |
| name        | VARCHAR(255) | Nama produk                              |
| description | TEXT         | Deskripsi produk                         |
| price       | DECIMAL      | Harga produk                             |
| stok        | unsignedIn   | Stok Produk                              |
|             | teger        |                                          |
| image       | VARCHAR(255) | Nama file gambar produk (opsional)     |
| created_at  | TIMESTAMP    | Waktu dibuat                             |
| updated_at  | TIMESTAMP    | Waktu diperbarui                         |

---

## Tabel 5: pesanans

| Nama Field   | Tipe Data     | Keterangan                                                   |
|--------------|---------------|--------------------------------------------------------------|
| id           | BIGINT        | Primary key                                                  |
| customer_id  | BIGINT        | Relasi ke pembeli                                          |
| total_price  | DECIMAL       | Total harga pesanan                                          |
| status       | ENUM          | pending, confirmed, on_delivery, completed, cancelled |
| is_paid      | BOOLEAN       | Status pembayaran: false saat pesan, true saat dibayar   |
| courier_id   | BIGINT        | Relasi ke kurirs (opsional)                            |
| created_at   | TIMESTAMP     | Waktu dibuat                                                 |
| updated_at   | TIMESTAMP     | Waktu diperbarui                                             |

---

## Tabel 6: item_pesanans

| Nama Field | Tipe Data    | Keterangan                               |
|------------|--------------|------------------------------------------|
| id         | BIGINT       | Primary key                              |
| order_id   | BIGINT       | Relasi ke pesanans                       |
| product_id | BIGINT       | Relasi ke produks                     |
| quantity   | INTEGER      | Jumlah produk                            |
| price      | DECIMAL      | Harga satuan saat dipesan                |
| created_at | TIMESTAMP    | Waktu dibuat                             |
| updated_at | TIMESTAMP    | Waktu diperbarui                         |

---

## Tabel 7: kurirs

| Nama Field | Tipe Data    | Keterangan                               |
|------------|--------------|------------------------------------------|
| id         | BIGINT       | Primary key                              |
| seller_id  | BIGINT       | Relasi ke penjual                      |
| name       | VARCHAR(255) | Nama kurir                               |
| phone      | VARCHAR(20)  | Nomor HP kurir                           |
| created_at | TIMESTAMP    | Waktu dibuat                             |
| updated_at | TIMESTAMP    | Waktu diperbarui                         |

---

## Tabel 8: kategoris

| Nama Field   | Tipe Data    | Keterangan                               |
|--------------|--------------|------------------------------------------|
| id           | BIGINT       | Primary key                              |
| name         | VARCHAR(255) | Nama kategori                            |
| created_at   | TIMESTAMP    | Waktu dibuat                             |
| updated_at   | TIMESTAMP    | Waktu diperbarui                         |

---

## Tabel 9: kategori_produks (Pivot Many-to-Many)

| Nama Field   | Tipe Data    | Keterangan                               |
|--------------|--------------|------------------------------------------|
| id           | BIGINT       | Primary key                              |
| product_id   | BIGINT       | Relasi ke produks                     |
| category_id  | BIGINT       | Relasi ke kategoris                   |
| created_at   | TIMESTAMP    | Waktu dibuat                             |
| updated_at   | TIMESTAMP    | Waktu diperbarui                         |

---

## 🔗 Relasi Antar Tabel

- **users** ↔ penjual / pembeli (One-to-One)  
  > 1 user hanya bisa menjadi 1 penjual atau 1 customer.

- **penjual** ↔ produks (One-to-Many)  
  > 1 penjual bisa memiliki banyak produk.

- **pembeli** ↔ pesanans (One-to-Many)  
  > 1 customer bisa membuat banyak pesanan.

- **pesanans** ↔ item_pesanans (One-to-Many)  
  > 1 order bisa memiliki banyak item produk.

- **produks** ↔ item_pesanans (One-to-Many)  
  > 1 produk bisa dibeli dalam banyak pesanan berbeda.

- **penjual** ↔ kurirs (One-to-Many)  
  > 1 penjual bisa memiliki beberapa kurir.

- **pesanans** ↔ kurirs (Many-to-One, opsional)  
  > 1 order bisa dikirim oleh 1 kurir.

- **produks** ↔ kategoris (Many-to-Many)  
  > 1 produk bisa memiliki banyak kategori, dan 1 kategori bisa memiliki banyak produk, melalui pivot kategori_produks.

---

## 💰 Metode Pembayaran: COD (Cash on Delivery)

- Sistem hanya mendukung *Cash on Delivery*.
- Kurir akan mengantarkan pesanan dan menerima pembayaran langsung dari customer.
- Setelah barang diterima dan customer mengkonfirmasi:
  - Kolom is_paid akan diubah menjadi true
  - Kolom status pesanan akan diubah menjadi completed


---