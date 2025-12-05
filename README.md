# SIMASET (Sistem Informasi Aset)

SIMASET adalah **Sistem Informasi Aset** berbasis web yang digunakan untuk mengelola data aset seperti tanah, bangunan, ruangan, kategori, dan barang. Sistem ini mendukung **multi-role user**, dengan hak akses berbeda antara **Guest**, **User**, dan **Admin**, sehingga manajemen data menjadi lebih aman dan terstruktur.  

## Fitur Utama

### 1. Autentikasi
- Login menggunakan **email** dan **password**.  
- Terdapat **captcha** pada halaman login menggunakan paket [mews/captcha](https://github.com/mewebstudio/captcha) untuk meningkatkan keamanan.  
- Hak akses berbeda sesuai peran: **Guest**, **User**, dan **Admin**.  

### 2. Dashboard
#### Guest
- Dapat melihat halaman dashboard dasar.  
- Tersedia **search engine** untuk mencari data aset.  

#### User
- **Dashboard** menampilkan 5 card yang berisi jumlah total data untuk:  
  - Tanah  
  - Bangunan  
  - Ruangan  
  - Kategori  
  - Barang  
- **Statistik** berupa bar chart untuk visualisasi jumlah data pada 5 kategori di atas.  
- **Navigasi**: Tanah, Barang, Ruangan, Kategori, Bangunan.  
- Dapat menggunakan **search engine** untuk mencari data aset.  

#### Admin
- Semua fitur **User**, ditambah:  
  - Navigasi tambahan: **User** (hanya untuk admin)  
  - Fitur **Cetak Rekap** untuk mencetak laporan keseluruhan aset.  

### 3. CRUD Aset
- **Tanah**: Input, edit, hapus, dan daftar tanah.  
- **Bangunan**: Input, edit, hapus, dan daftar bangunan, dengan relasi ke tanah.  
- **Ruangan**: Input, edit, hapus, dan daftar ruangan, dengan relasi ke bangunan.  
- **Kategori**: Input, edit, hapus, dan daftar kategori barang.  
- **Barang**: Input, edit, hapus, dan daftar barang, dengan relasi ke kategori dan ruangan.  
- **User** (Admin only): Input, edit, hapus, dan daftar user.  

### 4. Search Engine
- Tersedia di **dashboard** maupun halaman data.  
- Memudahkan pencarian data aset secara cepat.  

### 5. Visualisasi Data
- Statistik **bar chart** untuk 5 kategori data: Tanah, Bangunan, Ruangan, Kategori, dan Barang.  
- Mempermudah admin maupun user dalam memantau jumlah aset.  

### 6. Hak Akses dan Kontrol
| Role      | Akses Navigasi                                    | Fitur Tambahan                                          |
|-----------|---------------------------------------------------|---------------------------------------------------------|
| Guest     | Tanah, Barang, Ruangan, Kategori, Bangunan        | Dashboard cards & bar chart, Search engine              |
| Admin     | Tanah, Barang, Ruangan, Kategori, Bangunan, User  | Cetak rekap, Dashboard cards & bar chart, Search engine |

---

## Teknologi yang Digunakan
- **Framework**: Laravel  
- **Frontend**: Bootstrap 5, Blade Templates  
- **Database**: MySQL / MariaDB  
- **Charting**: Chart.js untuk visualisasi data  
- **Captcha**: mews/captcha  

---

## Cara Menjalankan

# Clone repository
git clone [https://github.com/username/simaset.git](https://github.com/Habz26/orangnagreg)

# Masuk ke direktori project
cd simaset

# Install dependencies
composer install
npm install
npm run dev

# Salin .env.example menjadi .env dan sesuaikan konfigurasi database

# Jalankan migration & seeder
php artisan migrate --seed

pada tabel 'referensi' isi dengan data tsb: <br>
<img width="523" height="69" alt="image" src="https://github.com/user-attachments/assets/c6ec1955-078e-4189-ad86-7ac5bfb47a25" />


# Jalankan aplikasi
npm run dev (sudah include dengan 'php artisan serve')

# Akses aplikasi di browser
http://127.0.0.1:8000

## Sedikit preview singkat

https://github.com/user-attachments/assets/ceffd30a-5aef-436f-b70a-c4389811c94c

