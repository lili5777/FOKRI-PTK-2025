<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard FOKRI PTK</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
/* Reset dan Font Global */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    background: linear-gradient(135deg, #e0f2f7, #f0f8ff); /* Background global halaman */
    color: #333;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center; /* Untuk mempusatkan main-wrapper */
}

/* Navbar (tetap di luar main-layout-wrapper agar bisa full width dan di atas) */
.navbar {
    background: linear-gradient(to right, #1e3a8a, #0b6cb3);
    color: white;
    padding: 15px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 700;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    position: sticky; /* Tetap sticky di atas */
    top: 0;
    z-index: 1000;
    width: 100%; /* Lebar penuh */
    min-height: 70px;
}

.navbar .logo-container {
    display: flex;
    align-items: center;
}

.navbar .logo-container img {
    height: 40px;
    margin-right: 10px;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.8);
}

.navbar .logo-text {
    font-size: 22px;
    color: white;
    font-weight: 800;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
}

.navbar .main-nav-content {
    display: flex;
    align-items: center;
    flex-grow: 1;
    justify-content: flex-end;
}

.navbar .menu {
    display: flex;
    align-items: center;
    margin-right: 20px;
}

.navbar .menu a {
    color: white;
    margin-left: 20px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    padding: 8px 12px;
    border-radius: 8px;
    transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
}

.navbar .menu a:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
}
.navbar .menu a::after {
    content: '';
    position: absolute;
    width: 100%;
    transform: scaleX(0);
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: #ffffff;
    transform-origin: bottom right;
    transition: transform 0.25s ease-out;
}
.navbar .menu a:hover::after {
    transform: scaleX(1);
    transform-origin: bottom left;
}

.navbar .auth-links {
    display: flex;
    align-items: center;
    margin-left: 10px;
}

.navbar .auth-links a {
    color: white;
    margin-left: 15px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    padding: 8px 12px;
    border-radius: 8px;
    transition: background 0.3s ease, transform 0.2s ease;
}

.navbar .auth-links a:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

/* Wrapper Utama untuk Konten (Hero, Main Container, Footer) dan Sidebar Sosial */
.main-content-area-wrapper {
    display: flex; /* Menggunakan Flexbox untuk tata letak kolom */
    width: 100%; /* Ambil lebar penuh */
    max-width: 1400px; /* Batasi lebar maksimal */
    margin: 20px auto; /* Margin atas/bawah dan pusatkan */
    border-radius: 20px;
    overflow: hidden; /* Penting untuk border-radius di elemen anak */
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15); /* Shadow untuk seluruh wrapper */
    background-color: white; /* Latar belakang untuk area konten utama */
}

/* Sidebar Media Sosial (Kolom Kiri) */
.social-sidebar {
    width: 60px; /* Lebar sidebar tetap */
    flex-shrink: 0; /* Pastikan tidak mengecil */
    background: transparent; /* Awalnya transparan, biar background muncul di .sidebar-bg */
    padding: 20px 0; /* Padding vertikal */
    display: flex;
    flex-direction: column;
    align-items: center; /* Pusatkan ikon horizontal */
    justify-content: flex-start; /* Mulai dari atas */
    gap: 15px; /* Jarak antar ikon */
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    position: relative; /* Penting untuk background overlay */
    z-index: 1; /* Pastikan ikon di atas background overlay */
}

.social-sidebar .sidebar-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #34495e; /* Warna latar belakang untuk bagian sosial media */
    z-index: -1; /* Di belakang ikon */
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
}

.social-sidebar a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px; /* Ukuran kotak ikon */
    height: 45px;
    color: white;
    text-decoration: none;
    font-size: 22px; /* Ukuran ikon */
    border-radius: 50%; /* Membuat lingkaran */
    transition: transform 0.3s ease, opacity 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2); /* Shadow kecil di ikon */
}

.social-sidebar a:hover {
    transform: scale(1.15); /* Efek membesar lebih terasa */
    opacity: 0.9;
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
}

/* Warna background spesifik untuk setiap ikon */
.social-sidebar a.twitter { background-color: #1DA1F2; }
.social-sidebar a.facebook { background-color: #3B5998; }
.social-sidebar a.youtube { background-color: #FF0000; }
.social-sidebar a.instagram { background-image: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); } /* Gradient Instagram */
.social-sidebar a.tiktok { background-color: #000000; }

/* Konten Utama (Kolom Kanan) */
.content-section {
    flex-grow: 1; /* Mengambil sisa ruang horizontal */
    display: flex;
    flex-direction: column; /* Konten di dalamnya ditumpuk vertikal */
    /* background-color: white; (background sudah di main-content-area-wrapper) */
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
}

/* Hero Section */
.hero {
    width: 100%;
    max-width: 100%;
    margin: 0;
    border-radius: 0;
    box-shadow: none;
    overflow: hidden;
}

.hero img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 0;
}

/* Main Container */
.container {
    flex: 1;
    width: 100%;
    max-width: 100%;
    margin: 40px auto;
    padding: 50px 40px;
    text-align: center;
    background: linear-gradient(135deg, #ffffff, #f0faff);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

/* ... (CSS untuk h2, p, search-box, grid, card, dll. tetap sama) ... */
.container h2 {
    font-size: 36px;
    color: #1e3a8a;
    margin-bottom: 20px;
    font-weight: 800;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

.container p {
    max-width: 800px;
    margin: 20px auto 40px auto;
    font-style: italic;
    color: #555;
    font-size: 17px;
    line-height: 1.7;
    border-left: 4px solid #a7d9f7;
    padding-left: 15px;
}

.search-box {
    margin: 30px auto;
    max-width: 500px;
    position: relative;
}

.search-box input {
    width: 100%;
    padding: 16px 20px;
    border-radius: 15px;
    border: 2px solid #a7d9f7;
    font-size: 17px;
    box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.08);
    outline: none;
    transition: border 0.3s, box-shadow 0.3s;
}

.search-box input:focus {
    border: 2px solid #64b5f6;
    box-shadow: 0 0 0 5px rgba(100, 181, 246, 0.4);
}

.grid {
    display: grid;
    /* Ubah ini untuk mengatur 3 kolom */
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Menggunakan minmax untuk fleksibilitas */
    gap: 30px;
    margin-top: 40px;
    justify-content: center; /* Pusatkan grid jika ada sisa ruang */
    max-width: 1000px; /* Batasi lebar grid agar tidak terlalu melebar pada layar besar */
    margin-left: auto;
    margin-right: auto;
}

/* Sesuaikan card agar ukurannya lebih proporsional untuk 3 kolom */
.card {
    padding: 25px; /* Sedikit kurangi padding agar lebih ringkas */
    border-radius: 20px; /* Sedikit kurangi border-radius */
}

.card img {
    width: 60px; /* Sedikit kurangi ukuran gambar */
    height: 60px;
    margin-bottom: 10px; /* Kurangi margin bawah */
}

.card h3 {
    font-size: 18px; /* Sedikit kurangi ukuran font judul */
    margin-bottom: 8px;
}

.card p {
    font-size: 14px; /* Sedikit kurangi ukuran font deskripsi */
}

/* Sesuaikan media query untuk grid agar tetap bagus di layar yang lebih kecil */
@media (max-width: 992px) {
    .grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Kembali ke 2 kolom atau lebih kecil jika perlu */
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Bisa 2 kolom atau 1 kolom jika kartu tidak muat */
        gap: 15px;
    }
}

@media (max-width: 600px) { /* Tambahkan breakpoint ini untuk memastikan 1 kolom di HP kecil */
    .grid {
        grid-template-columns: 1fr; /* Paksa 1 kolom di layar yang sangat kecil */
        gap: 15px;
    }
    .card {
        padding: 20px;
    }
}

.card {
    background: white;
    padding: 30px;
    border-radius: 25px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    cursor: pointer;
    transition: 0.4s ease-in-out;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    border: 1px solid rgba(0, 0, 0, 0.05);
    position: relative;
    overflow: hidden;
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
    transition: transform 0.5s ease;
    z-index: 1;
    transform: scale(0);
    border-radius: 25px;
}

.card:hover::before {
    transform: scale(1.1);
    opacity: 0.5;
}

.card:hover {
    transform: translateY(-10px) scale(1.04);
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.18);
    z-index: 2;
}

.card.humas:hover { background: linear-gradient(135deg, #e3f2fd, #bbdefb); }
.card.kesekretariatan:hover { background: linear-gradient(135deg, #e8f5e9, #c8e6c9); }
.card.kebendaharaan:hover { background: linear-gradient(135deg, #fffde7, #fff9c4); }
.card.pelayanan:hover { background: linear-gradient(135deg, #f3e5f5, #e1bee7); }
.card.tarbiyah:hover { background: linear-gradient(135deg, #ffe0b2, #ffcc80); }
.card.kemuslimahan:hover { background: linear-gradient(135deg, #fce4ec, #f8bbd0); }

.card img {
    width: 70px;
    height: 70px;
    margin-bottom: 15px;
    object-fit: contain;
    filter: drop-shadow(0 3px 5px rgba(0,0,0,0.1));
}

.card h3 {
    color: #1e3a8a;
    margin-bottom: 10px;
    font-size: 20px;
    font-weight: 700;
}

.card p {
    font-size: 15px;
    color: #666;
    line-height: 1.5;
    margin: 0;
}

/* Footer Styling */
footer {
    background: linear-gradient(to right, #1e3a8a, #0b6cb3);
    color: white;
    text-align: center;
    padding: 40px 30px;
    margin-top: 50px;
    font-size: 14px;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: flex-start;
    gap: 30px;
    border-bottom-right-radius: 20px; /* Sesuai dengan border-radius wrapper */
}

/* ... (CSS untuk footer-section, logo-footer, dll. tetap sama) ... */
.footer-section {
    flex: 1;
    min-width: 250px;
    text-align: left;
    padding: 10px;
}

.logo-footer {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.logo-footer img {
    height: 50px;
    margin-right: 15px;
    border-radius: 50%;
    box-shadow: 0 3px 8px rgba(0,0,0,0.3);
    border: 2px solid rgba(255, 255, 255, 0.8);
}

.logo-text-footer {
    font-size: 26px;
    font-weight: 800;
    color: white;
    text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
}

.footer-section h4 {
    font-size: 18px;
    margin-bottom: 18px;
    color: #ffffff;
    font-weight: 700;
    text-transform: uppercase;
    position: relative;
    padding-bottom: 8px;
}
.footer-section h4::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 3px;
    background-color: #a7d9f7;
    border-radius: 2px;
}
.footer-section:first-child h4 {
    display: none;
}

.footer-section p, .footer-section a {
    color: #e0f7fa;
    font-size: 15px;
    line-height: 1.8;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section a:hover {
    color: #a7d9f7;
    text-decoration: underline;
}

.footer-section .social-icons {
    display: flex;
    justify-content: flex-start;
    gap: 15px;
    margin-top: 15px;
    flex-wrap: wrap;
}

.footer-section .social-icons a {
    display: inline-block;
    font-size: 24px;
    color: #e0f7fa;
    transition: color 0.3s ease, transform 0.2s ease;
}
.footer-section .social-icons a:hover {
    color: #f0faff;
    transform: translateY(-3px) scale(1.1);
}

/* Penggunaan Font Awesome Icons */
.fab.fa-instagram::before { content: '\f16d'; font-family: 'Font Awesome 6 Brands'; font-weight: 400; }
.fab.fa-telegram-plane::before { content: '\f2c6'; font-family: 'Font Awesome 6 Brands'; font-weight: 400; }
.fas.fa-globe::before { content: '\f0ac'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
.fab.fa-twitter::before { content: '\f099'; font-family: 'Font Awesome 6 Brands'; font-weight: 400; }
.fab.fa-facebook-f::before { content: '\f39e'; font-family: 'Font Awesome 6 Brands'; font-weight: 400; }
.fab.fa-youtube::before { content: '\f167'; font-family: 'Font Awesome 6 Brands'; font-weight: 400; }
.fab.fa-tiktok::before { content: '\e07b'; font-family: 'Font Awesome 6 Brands'; font-weight: 400; }
.fas.fa-envelope::before { content: '\f0e0'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
.fas.fa-phone::before { content: '\f095'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
.fas.fa-map-marker-alt::before { content: '\f3c5'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }


/* Copyright section */
.footer-copyright {
    width: 100%;
    text-align: center;
    margin-top: 30px;
    padding-top: 25px;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    font-size: 14px;
    color: #d1e9f7;
}

/* Responsif untuk layar kecil */
@media (max-width: 1200px) {
    .main-content-area-wrapper {
        width: 100%;
        margin: 0;
        border-radius: 0;
        box-shadow: none;
    }
}

@media (max-width: 992px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px 20px;
        min-height: unset;
        position: static; /* Navbar tidak sticky pada mobile */
        border-radius: 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Shadow tetap ada */
    }
    .navbar .logo-container {
        width: 100%;
        justify-content: center;
        margin-bottom: 10px;
    }
    .navbar .main-nav-content {
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    .navbar .menu {
        margin-right: 0;
        margin-bottom: 10px;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
    }
    .navbar .menu a {
        margin: 5px 8px;
        font-size: 14px;
        padding: 6px 10px;
    }
    .navbar .auth-links {
        margin-left: 0;
        width: 100%;
        justify-content: center;
        margin-bottom: 10px;
    }
    .navbar .auth-links a {
        margin: 0 8px;
        font-size: 14px;
        padding: 6px 10px;
    }

    .main-content-area-wrapper {
        flex-direction: column; /* Ubah layout menjadi satu kolom */
        margin: 0;
        border-radius: 0;
        box-shadow: none;
    }
    .social-sidebar {
        width: 100%; /* Sidebar mengambil lebar penuh */
        height: auto; /* Tinggi otomatis */
        flex-direction: row; /* Ikon disusun horizontal */
        padding: 10px 0;
        justify-content: center; /* Pusatkan ikon horizontal */
        border-radius: 0; /* Hapus border-radius */
        box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Shadow di bawah sidebar */
        position: static; /* Tidak lagi sticky */
    }
    .social-sidebar .sidebar-bg {
        border-radius: 0;
    }
    .social-sidebar a {
        width: 38px;
        height: 38px;
        font-size: 18px;
    }

    .content-section {
        border-radius: 0;
    }
    .hero {
        margin: 0;
        border-radius: 0;
        box-shadow: none;
    }
    .container {
        padding: 30px 20px;
        margin: 25px auto;
        border-radius: 0;
        box-shadow: none;
    }
    .container h2 {
        font-size: 32px;
    }
    .container p {
        font-size: 16px;
    }
    .grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }
    .card {
        padding: 20px;
        border-radius: 15px;
    }
    .card img {
        width: 60px;
        height: 60px;
    }
    .card h3 {
        font-size: 17px;
    }
    .footer {
        border-bottom-right-radius: 0;
    }
}

@media (max-width: 768px) {
    .social-sidebar a {
        width: 35px;
        height: 35px;
        font-size: 16px;
    }
    .footer-section {
        min-width: unset;
        width: 100%;
        text-align: center;
    }
    .logo-footer {
        justify-content: center;
    }
    .footer-section h4 {
        text-align: center;
    }
    .footer-section h4::after {
        left: 50%;
        transform: translateX(-50%);
    }
    .footer-section .social-icons {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .navbar .logo-text {
        font-size: 18px;
    }
    .navbar .logo-container img {
        height: 30px;
    }
    .navbar .menu a,
    .navbar .auth-links a {
        font-size: 12px;
        padding: 5px 8px;
    }
    .container h2 {
        font-size: 26px;
    }
    .container p {
        font-size: 14px;
    }
    .search-box input {
        padding: 10px 15px;
        font-size: 14px;
    }
    .card img {
        width: 45px;
        height: 45px;
    }
    .card h3 {
        font-size: 15px;
    }
    .card p {
        font-size: 12px;
    }
}

</style>
</head>
<body>

<div class="navbar">
    <div class="logo-container">
        <img src="https://yt3.googleusercontent.com/ytc/AIdro_lr1TjnNBLohQi12b3sN5GnZg3ClW8h91aJxAN8D6Kf5Fc=s900-c-k-c0x00ffffff-no-rj" alt="Logo FOKRI PTK">
        <span class="logo-text">Halaman Admin</span>
    </div>
    <div class="main-nav-content">
        <div class="menu">
            <a href="FRONTEND.php">Dashboard</a>
            <a href="Pengumuman.php">Pengumuman</a>
            <a href="Publikasi.php">Publikasi</a>
            <a href="Timeline.php">Timeline</a>
            <a href="Tentang.php">Tentang</a>
        </div>
        <div class="auth-links">
            <a href="#" onclick="logout()">Logout</a>
        </div>
    </div>
</div>

<div class="main-content-area-wrapper">
    <div class="social-sidebar">
        <div class="sidebar-bg"></div>
        <a href="https://twitter.com/fokriptk" target="_blank" title="Twitter FOKRI PTK" class="twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://www.facebook.com/fokriptk" target="_blank" title="Facebook FOKRI PTK" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.youtube.com/@fokriptkindonesia8340" target="_blank" title="YouTube FOKRI PTK" class="youtube"><i class="fab fa-youtube"></i></a>
        <a href="https://www.instagram.com/fokriptkindonesia/" target="_blank" title="Instagram FOKRI PTK" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://www.tiktok.com/@fokriptki" target="_blank" title="TikTok FOKRI PTK" class="tiktok"><i class="fab fa-tiktok"></i></a>
    </div>

    <div class="content-section">
        <div class="hero">
            <img src="https://bic.id/wp-content/uploads/2021/10/BIMBINGAN-KEDINASAN-2022-11.png" alt="Bimbingan Kedinasan 2022-2023">
        </div>

        <div class="container">
            <h2>Selamat Datang di Dashboard FOKRI PTK</h2>
            <p>"Barangsiapa memudahkan urusan orang lain, Allah akan memudahkan urusannya di dunia dan akhirat." (HR. Muslim)</p>

            <div class="search-box">
                <input type="text" id="search" placeholder="Cari Divisi..." onkeyup="searchDivisi()">
            </div>

            <div class="grid" id="divisi-grid">
                <div class="card kesekretariatan" onclick="window.location.href='PROKER.php?divisi=Kesekretariatan'">
                    <img src="https://static.vecteezy.com/system/resources/previews/001/486/411/original/open-book-icon-free-vector.jpg" alt="Kesekretariatan"> <h3>Divisi Kesekretariatan</h3>
                    <p>Klik untuk kelola program kerja</p>
                </div>
                <div class="card kebendaharaan" onclick="window.location.href='PROKER.php?divisi=Kebendaharaan'">
                    <img src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-coin-money-icon-png-image_5278199.jpg" alt="Kebendaharaan"> <h3>Divisi Kebendaharaan</h3>
                    <p>Klik untuk kelola program kerja</p>
                </div>
                <div class="card humas" onclick="window.location.href='PROKER.php?divisi=Humas'">
                    <img src="https://png.pngtree.com/png-clipart/20220720/original/pngtree-cute-best-friend-muslimah-cartoon-png-image_8389455.png" alt="Humas"> <h3>Divisi Humas</h3>
                    <p>Klik untuk kelola program kerja</p>
                </div>
                <div class="card pelayanan" onclick="window.location.href='PROKER.php?divisi=Pelayanan Umat'">
                    <img src="https://png.pngtree.com/png-clipart/20230825/original/pngtree-cartoon-muslim-kid-greeting-salaam-picture-image_8654637.png" alt="Pelayanan Umat"> <h3>Divisi Pelayanan Umat</h3>
                    <p>Klik untuk kelola program kerja</p>
                </div>
                <div class="card tarbiyah" onclick="window.location.href='PROKER.php?divisi=Tarbiyah'">
                    <img src="https://cdn.pixabay.com/photo/2022/09/17/15/34/muslim-7461232_1280.png" alt="Tarbiyah"> <h3>Divisi Tarbiyah</h3>
                    <p>Klik untuk kelola program kerja</p>
                </div>
                <div class="card kemuslimahan" onclick="window.location.href='PROKER.php?divisi=Kemuslimahan'">
                    <img src="https://www.clipartmax.com/png/middle/216-2162062_chibi-clipart-muslimah-budak-perempuan-muslimah-kartun.png" alt="Kemuslimahan"> <h3>Divisi Kemuslimahan</h3>
                    <p>Klik untuk kelola program kerja</p>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-section">
                <div class="logo-footer">
                    <img src="https://yt3.googleusercontent.com/ytc/AIdro_lr1TjnNBLohQi12b3sN5GnZg3ClW8h91aJxAN8D6Kf5Fc=s900-c-k-c0x00ffffff-no-rj" alt="Logo FOKRI PTK Footer">
                    <span class="logo-text-footer">FOKRI PTK</span>
                </div>
                <p>Forum Komunikasi Rohani Islam Perguruan Tinggi Kedinasan. Membina insan bertakwa, cerdas, dan berkontribusi.</p>
            </div>
            <div class="footer-section">
                <h4>Kontak</h4>
                <p><span class="fas fa-envelope"></span> Email: fokri@stis.ac.id</p>
                <p><span class="fas fa-phone"></span> Telp: (021) 123456789</p>
                <p><span class="fas fa-map-marker-alt"></span> Alamat: Jl. Contoh No. 1, Jakarta</p>
            </div>
            <div class="footer-section">
                <h4>Media Sosial</h4>
                <div class="social-icons">
                    <a href="https://www.instagram.com/fokri_ptk/" target="_blank" title="Instagram FOKRI PTK"><span class="fab fa-instagram"></span></a>
                    <a href="https://t.me/fokri_ptk" target="_blank" title="Telegram FOKRI PTK"><span class="fab fa-telegram-plane"></span></a>
                    <a href="http://fokri.stis.ac.id/" target="_blank" title="Website FOKRI PTK"><span class="fas fa-globe"></span></a>
                    <a href="https://twitter.com/fokriptk" target="_blank" title="Twitter FOKRI PTK"><span class="fab fa-twitter"></span></a>
                    <a href="https://www.facebook.com/fokriptk" target="_blank" title="Facebook FOKRI PTK"><span class="fab fa-facebook-f"></span></a>
                    <a href="https://www.youtube.com/c/fokriptk" target="_blank" title="YouTube FOKRI PTK"><span class="fab fa-youtube"></span></a>
                    <a href="https://www.tiktok.com/@fokriptk" target="_blank" title="TikTok FOKRI PTK"><span class="fab fa-tiktok"></span></a>
                </div>
            </div>
            <div class="footer-copyright">
                © 2025 FOKRI PTK. All rights reserved.
            </div>
        </footer>
    </div>
</div>

<script>
function searchDivisi() {
    const input = document.getElementById('search').value.toLowerCase();
    const cards = document.querySelectorAll('.grid .card');
    cards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        card.style.display = title.includes(input) ? 'flex' : 'none';
    });
}

function logout() {
    if (confirm("Yakin ingin logout?")) {
        localStorage.clear();
        window.location.href = "index.html"; // ganti ke halaman loginmu
    }
}
</script>

</body>
</html>