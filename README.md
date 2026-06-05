# Laravel CRUD Product Application

Aplikasi CRUD sederhana berbasis Laravel untuk mengelola data produk. Aplikasi ini memiliki tampilan dashboard produk yang lebih rapi, form tambah/edit produk, serta fitur hapus produk.

## Fitur

- Menampilkan daftar produk
- Menambahkan produk baru
- Mengubah data produk
- Menghapus produk
- Validasi input produk
- Dashboard ringkas berisi total produk, total stok, dan estimasi nilai produk
- UI responsif dengan CSS statis di `public/product-ui.css`

## Tech Stack

- PHP 8.2
- Laravel 12
- MySQL atau SQLite
- Blade
- CSS
- Pest / PHPUnit

## Struktur Utama

- `app/Models/Product.php` untuk model produk
- `app/Http/Controllers/ProductController.php` untuk logic CRUD
- `resources/views/products/index.blade.php` untuk halaman daftar produk
- `resources/views/products/create.blade.php` untuk halaman tambah produk
- `resources/views/products/edit.blade.php` untuk halaman edit produk
- `public/product-ui.css` untuk styling halaman CRUD produk
- `database/migrations/2026_06_05_114647_create_products_table.php` untuk tabel produk

## Instalasi

Clone atau buka folder project ini, lalu jalankan:

```bash
composer install
```

Salin file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur koneksi database di file `.env`, lalu jalankan migration:

```bash
php artisan migrate
```

## Menjalankan Aplikasi

Jalankan server Laravel:

```bash
php artisan serve
```

Buka aplikasi di browser:

```text
http://127.0.0.1:8000/product
```

## Route Produk

| Method | URL | Nama Route | Fungsi |
| --- | --- | --- | --- |
| GET | `/product` | `product.index` | Menampilkan daftar produk |
| GET | `/product/create` | `product.create` | Menampilkan form tambah produk |
| POST | `/product` | `product.store` | Menyimpan produk baru |
| GET | `/product/{product}/edit` | `product.edit` | Menampilkan form edit produk |
| PUT | `/product/{product}/update` | `product.update` | Menyimpan perubahan produk |
| DELETE | `/product/{product}/delete` | `product.delete` | Menghapus produk |

## Menjalankan Test

```bash
php artisan test --compact
```

## Catatan UI

Halaman CRUD produk menggunakan file CSS statis `public/product-ui.css`, sehingga tampilan dapat langsung digunakan tanpa menjalankan `npm run dev` atau `npm run build`.
