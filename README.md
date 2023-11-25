# Nama Aplikasi

Deskripsi singkat tentang aplikasi Anda.

## Instalasi

1. Pastikan Anda memiliki PHP dan Composer diinstal di mesin Anda.
2. Clone repositori ini ke mesin lokal Anda:
```bash
git clone https://github.com/ProjectKuliahUNSUB/inventory-barang.git```

3. Pindah ke direktori aplikasi:

```bash
  cd inventory-barang
```

4. Install dependencies menggunakan Composer:

```bash
  composer install
```

5. Salin file `env` menjadi `.env` dan sesuaikan konfigurasi database serta pengaturan lainnya.

6. Generate kunci aplikasi:

```bash
  php spark key:generate
```
7. Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:

```bash
  php spark migrate
```

8.  Jalankan aplikasi: 
```bash
  php spark serve
```

