<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publikasi - FOKRI PTK</title>
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
            background: linear-gradient(135deg, #e0f2f7, #f0f8ff);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(to right, #1e3a8a, #0b6cb3);
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
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

        /* Styling untuk semua link di menu dan auth-links */
        .navbar .menu a,
        .navbar .auth-links a {
            color: white;
            margin-left: 20px;
            /* Sesuaikan jarak antar item menu jika perlu */
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            /* Untuk mensejajarkan ikon dan teks */
            align-items: center;
            /* Untuk mensejajarkan ikon dan teks */
            white-space: nowrap;
            /* Mencegah teks patah baris */
        }

        .navbar .menu a:hover,
        .navbar .auth-links a:hover {
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

        /* Ikon dalam navbar */
        .navbar .menu a i,
        .navbar .auth-links a i {
            margin-right: 8px;
            /* Jarak antara ikon dan teks */
            font-size: 1em;
            /* Ukuran ikon, disesuaikan agar proporsional dengan teks */
        }

        /* Main Content Area Wrapper */
        .main-content-area-wrapper {
            display: flex;
            width: 100%;
            max-width: 1400px;
            margin: 20px auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            background-color: white;
        }

        /* Social Sidebar */
        .social-sidebar {
            width: 60px;
            flex-shrink: 0;
            background: transparent;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            gap: 15px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            position: relative;
            z-index: 1;
        }

        .social-sidebar .sidebar-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #34495e;
            z-index: -1;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        .social-sidebar a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            color: white;
            text-decoration: none;
            font-size: 22px;
            border-radius: 50%;
            transition: transform 0.3s ease, opacity 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .social-sidebar a:hover {
            transform: scale(1.15);
            opacity: 0.9;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .social-sidebar a.twitter {
            background-color: #1DA1F2;
        }

        .social-sidebar a.facebook {
            background-color: #3B5998;
        }

        .social-sidebar a.youtube {
            background-color: #FF0000;
        }

        .social-sidebar a.instagram {
            background-image: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        }

        .social-sidebar a.tiktok {
            background-color: #000000;
        }


        /* Content Section */
        .content-section {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        /* Container Utama (Publikasi) */
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

        .container h2 {
            font-size: 36px;
            color: #1e3a8a;
            margin-bottom: 20px;
            font-weight: 800;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* CONTAINER PUBLIKASI UNTUK USER (TANPA FORM TAMBAH) */
        .publikasi-list-container {
            display: flex;
            flex-direction: column;
            /* Ini yang membuat item menumpuk vertikal */
            gap: 20px;
            /* Jarak antar publikasi */
            margin-top: 30px;
            max-width: 800px;
            /* Lebar maksimal sesuai card */
            margin-left: auto;
            margin-right: auto;
            align-items: center;
            /* Pusatkan jika itemnya tidak selebar max-width */
        }

        /* CARD PUBLIKASI UNTUK USER */
        .publikasi-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 25px;
            width: 100%;
            /* Mengambil lebar penuh dari parent container-nya */
            text-align: left;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .publikasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .publikasi-card h3 {
            color: #1e3a8a;
            font-size: 20px;
            /* Ukuran font judul */
            margin-bottom: 8px;
            font-weight: 700;
        }

        .publikasi-card .publikasi-meta {
            font-size: 13px;
            color: #777;
            margin-bottom: 15px;
            border-bottom: 1px dashed #eee;
            /* Garis pemisah di bawah meta */
            padding-bottom: 8px;
        }

        .publikasi-card p {
            font-size: 15px;
            color: #444;
            margin: 10px 0;
            line-height: 1.7;
        }

        .publikasi-card .lampiran-list {
            list-style-type: none;
            padding-left: 0;
            margin-top: 15px;
            border-top: 1px dashed #eee;
            /* Garis pemisah di atas lampiran */
            padding-top: 10px;
        }

        .publikasi-card .lampiran-list li {
            margin-bottom: 5px;
            font-size: 14px;
        }

        .publikasi-card .lampiran-list li a {
            color: #1e3a8a;
            text-decoration: none;
            word-break: break-all;
        }

        .publikasi-card .lampiran-list li a:hover {
            text-decoration: underline;
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
            border-bottom-right-radius: 20px;
        }

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
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.8);
        }

        .logo-text-footer {
            font-size: 26px;
            font-weight: 800;
            color: white;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
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

        .footer-section p,
        .footer-section a {
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
        .fas.fa-home::before {
            content: '\f015';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fas.fa-bullhorn::before {
            content: '\f0a1';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fas.fa-book::before {
            content: '\f02d';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fas.fa-history::before {
            content: '\f1da';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fas.fa-info-circle::before {
            content: '\f05a';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fas.fa-user::before {
            content: '\f007';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fas.fa-sign-out-alt::before {
            content: '\f2f5';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        /* Ikon logout */


        .fab.fa-instagram::before {
            content: '\f16d';
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400;
        }

        .fab.fa-telegram-plane::before {
            content: '\f2c6';
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400;
        }

        .fas.fa-globe::before {
            content: '\f0ac';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fab.fa-twitter::before {
            content: '\f099';
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400;
        }

        .fab.fa-facebook-f::before {
            content: '\f39e';
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400;
        }

        .fab.fa-youtube::before {
            content: '\f167';
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400;
        }

        .fab.fa-tiktok::before {
            content: '\e07b';
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400;
        }

        .fas.fa-envelope::before {
            content: '\f0e0';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fas.fa-phone::before {
            content: '\f095';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .fas.fa-map-marker-alt::before {
            content: '\f3c5';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }


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
                position: static;
                border-radius: 0;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

            .navbar .menu a i,
            .navbar .auth-links a i {
                font-size: 0.9em;
                /* Sesuaikan ukuran ikon untuk responsif */
                margin-right: 5px;
            }

            .main-content-area-wrapper {
                flex-direction: column;
                margin: 0;
                border-radius: 0;
                box-shadow: none;
            }

            .social-sidebar {
                width: 100%;
                height: auto;
                flex-direction: row;
                padding: 10px 0;
                justify-content: center;
                border-radius: 0;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                position: static;
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

            .container {
                padding: 30px 20px;
                margin: 25px auto;
                border-radius: 0;
                box-shadow: none;
            }

            .container h2 {
                font-size: 32px;
            }

            /* Publikasi Card di layar medium */
            .publikasi-list-container {
                gap: 15px;
            }

            .publikasi-card {
                padding: 18px;
                border-radius: 12px;
            }

            .publikasi-card h3 {
                font-size: 18px;
            }

            .publikasi-card p {
                font-size: 14px;
            }

            /* Responsif Footer */
            footer {
                flex-direction: column;
                align-items: center;
                padding: 20px 15px;
                border-bottom-right-radius: 0;
            }

            .footer-section {
                text-align: center;
                min-width: unset;
                width: 100%;
            }

            .footer-section .social-icons {
                margin-top: 10px;
                justify-content: center;
            }

            .footer-section .social-icons a {
                margin: 0 8px;
            }

            .logo-footer {
                justify-content: center;
                margin-bottom: 20px;
            }

            .logo-footer img {
                height: 40px;
            }

            .logo-text-footer {
                font-size: 22px;
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

            .publikasi-card {
                padding: 15px;
                border-radius: 10px;
            }

            .publikasi-card h3 {
                font-size: 16px;
            }

            .publikasi-card p {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo-container">
            <img src="https://yt3.googleusercontent.com/ytc/AIdro_lr1TjnNBLohQi12b3sN5GnZg3ClW8h91aJxAN8D6Kf5Fc=s900-c-k-c0x00ffffff-no-rj" alt="Logo FOKRI PTK">
            <span class="logo-text">FOKRI PTK</span>
        </div>
        <div class="main-nav-content">
            <div class="menu">
                <a href="user_FRONTEND.php"><i class="fas fa-home"></i> Dashboard</a>
                <a href="user_pengumuman.php"><i class="fas fa-bullhorn"></i> Pengumuman</a>
                <a href="user_publikasi.php"><i class="fas fa-book"></i> Publikasi</a>
                <a href="user_Timeline.php"><i class="fas fa-history"></i> Timeline</a>
                <a href="user_Tentang.php"><i class="fas fa-info-circle"></i> Tentang</a>
            </div>
            <div class="auth-links">
                <a href="Profil.php"><i class="fas fa-user"></i> Profil</a>
                <a href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
            <div class="container">
                <h2>Publikasi Kami</h2>
                <p style="max-width: 800px; margin: 20px auto 40px auto; font-style: italic; color: #555; font-size: 17px; line-height: 1.7; border-left: 4px solid #a7d9f7; padding-left: 15px;">"Lihat berbagai publikasi terbaru dan arsip dari FOKRI PTK."</p>

                <div class="publikasi-list-container" id="publikasi-list">
                    <p>Memuat publikasi...</p>
                </div>
            </div>

            <div class="modal-overlay" id="detailModal">
                <div class="modal-content">
                    <button class="close-modal" onclick="closeDetailModal()">&times;</button>
                    <h2 id="modalJudul"></h2>
                    <p class="modal-meta"><span id="modalTanggal"></span></p>
                    <div id="modalIsi" class="modal-body"></div>
                    <div id="modalLampiran" class="modal-lampiran"></div>
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
                        <a href="https://www.facebook.com/fokriptk" target="_blank" title="Facebook FOKRI PTK"><span class="fab fa-facebook-f"></i></a>
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
        // URL ke API PHP Anda
        // Sesuaikan ini jika file api_publikasi.php Anda berada di lokasi yang berbeda
        const API_URL = 'http://localhost/fokri/api_publikasi.php';
        const publikasiListContainer = document.getElementById('publikasi-list');


        // function loadPublikasi() {
        //     publikasiListContainer.innerHTML = "<p style='text-align: center;'>Memuat publikasi...</p>";

        //     fetch(API_URL)
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error(`HTTP error! status: ${response.status}`);
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             if (data.success && data.data.length > 0) {
        //                 publikasiListContainer.innerHTML = "";
        //                 data.data.forEach(item => {
        //                     const card = document.createElement('div');
        //                     card.className = "publikasi-card";

        //                     // Potong teks isi untuk preview
        //                     const previewText = item.isi.length > 150 ?
        //                         item.isi.substring(0, 150) + "..." : item.isi;

        //                     card.innerHTML = `
        //                     <h3>${item.judul}</h3>
        //                     <p class="publikasi-meta">${item.tanggal}</p>
        //                     <p>${previewText.replace(/\n/g,'<br>')}</p>
        //                     <button class="lihat-detail-btn" onclick="showDetailModal(${item.id})">Lihat Detail</button>
        //                 `;
        //                     publikasiListContainer.appendChild(card);
        //                 });
        //             } else {
        //                 publikasiListContainer.innerHTML = "<p style='text-align:center; color:#555; padding:20px;'>Belum ada publikasi yang tersedia saat ini.</p>";
        //             }
        //         })
        //         .catch(error => {
        //             console.error("Error fetching publikasi:", error);
        //             publikasiListContainer.innerHTML = `<p style='text-align:center; color:red; padding:20px;'>Gagal memuat publikasi: ${error.message}</p>`;
        //         });
        // }



        function loadPublikasi() {
            publikasiListContainer.innerHTML = `
        <div style="text-align: center; padding: 20px;">
            <div class="loading-spinner" style="margin: 0 auto; width: 50px; height: 50px; border: 5px solid #f3f3f3; border-top: 5px solid #1e3a8a; border-radius: 50%; animation: spin 1s linear infinite;"></div>
            <p style="margin-top: 10px;">Memuat publikasi...</p>
        </div>
    `;

            fetch(API_URL)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Data received:", data); // Debugging

                    // Periksa apakah data ada dan sesuai format yang diharapkan
                    if (data && Array.isArray(data.data)) {
                        if (data.data.length > 0) {
                            renderPublikasi(data.data);
                        } else {
                            publikasiListContainer.innerHTML = `
                        <div style="text-align: center; padding: 20px; color: #555;">
                            <i class="fas fa-info-circle" style="font-size: 24px; margin-bottom: 10px;"></i>
                            <p>Belum ada publikasi yang tersedia saat ini.</p>
                        </div>
                    `;
                        }
                    } else if (Array.isArray(data)) {
                        // Jika API langsung mengembalikan array tanpa wrapper
                        if (data.length > 0) {
                            renderPublikasi(data);
                        } else {
                            publikasiListContainer.innerHTML = `
                        <div style="text-align: center; padding: 20px; color: #555;">
                            <i class="fas fa-info-circle" style="font-size: 24px; margin-bottom: 10px;"></i>
                            <p>Belum ada publikasi yang tersedia saat ini.</p>
                        </div>
                    `;
                        }
                    } else {
                        throw new Error("Format data tidak dikenali");
                    }
                })
                .catch(error => {
                    console.error("Error fetching publikasi:", error);
                    publikasiListContainer.innerHTML = `
                <div style="text-align: center; padding: 20px; color: #d32f2f;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 24px; margin-bottom: 10px;"></i>
                    <p>Gagal memuat publikasi: ${error.message}</p>
                    <button onclick="loadPublikasi()" style="margin-top: 10px; padding: 8px 16px; background: #1e3a8a; color: white; border: none; border-radius: 4px; cursor: pointer;">
                        <i class="fas fa-sync-alt"></i> Coba Lagi
                    </button>
                </div>
            `;
                });
        }

        function renderPublikasi(publikasiItems) {
            publikasiListContainer.innerHTML = "";

            publikasiItems.forEach(item => {
                const card = document.createElement('div');
                card.className = "publikasi-card";

                // Format tanggal jika diperlukan
                const tanggal = item.tanggal ? new Date(item.tanggal).toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }) : 'Tanpa tanggal';

                // Buat lampiran jika ada
                let lampiranHTML = "";
                if (item.gambar_url || item.dokumen_url || item.youtube_link) {
                    lampiranHTML = `<div class="lampiran-list"><h4 style="margin-top: 15px; font-size: 14px; color: #555;">Lampiran:</h4><ul style="padding-left: 20px;">`;

                    if (item.gambar_url) {
                        lampiranHTML += `<li><a href="${item.gambar_url}" target="_blank"><i class="fas fa-image"></i> Lihat Gambar</a></li>`;
                    }
                    if (item.dokumen_url) {
                        lampiranHTML += `<li><a href="${item.dokumen_url}" target="_blank"><i class="fas fa-file-pdf"></i> Unduh Dokumen</a></li>`;
                    }
                    if (item.youtube_link) {
                        lampiranHTML += `<li><a href="${item.youtube_link}" target="_blank"><i class="fab fa-youtube"></i> Tonton di YouTube</a></li>`;
                    }

                    lampiranHTML += `</ul></div>`;
                }

                card.innerHTML = `
            <h3>${item.judul || 'Judul tidak tersedia'}</h3>
            <p class="publikasi-meta"><i class="far fa-calendar-alt"></i> ${tanggal}</p>
            <p>${item.isi ? item.isi.replace(/\n/g,'<br>') : 'Konten tidak tersedia'}</p>
            ${lampiranHTML}
        `;

                publikasiListContainer.appendChild(card);
            });
        }

        // Tambahkan style untuk spinner
        const style = document.createElement('style');
        style.textContent = `
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
`;
        document.head.appendChild(style);

        // Panggil fungsi loadPublikasi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', loadPublikasi);

        function logout() {
            if (confirm("Yakin ingin logout?")) {
                // Jika Anda memiliki sistem autentikasi berbasis sesi/token,
                // Anda mungkin perlu memanggil API logout di backend juga.
                localStorage.clear(); // Hapus semua data Local Storage
                window.location.href = "index.html"; // ganti ke halaman loginmu
            }
        }
    </script>

</body>

</html>