<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Timeline Kegiatan Kepengurusan - FOKRI PTK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
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
            /* Untuk mempusatkan main-wrapper jika ada */
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
            /* Tetap sticky di atas */
            top: 0;
            z-index: 1000;
            width: 100%;
            /* Lebar penuh */
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
            /* Menggabungkan menu dan auth-links */
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


        /* Content Section  */
        .content-section {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        /* Container Utama Timeline */
        .container {
            flex: 1;
            /* Biarkan container mengisi ruang tersisa, mendorong footer ke bawah */
            width: 100%;
            /* Penting agar container mengisi content-section */
            max-width: 100%;
            /* Mengambil lebar penuh dari parent (.content-section) */
            margin: 40px auto;
            /* Margin atas/bawah dan pusatkan */
            padding: 50px 40px;
            /* Padding yang lebih besar */
            text-align: center;
            background: linear-gradient(135deg, #ffffff, #f0faff);
            border-radius: 15px;
            /* Tetap pakai 15px untuk konsistensi */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        /* Judul Halaman */
        .container h2 {
            font-size: 36px;
            color: #1e3a8a;
            margin-bottom: 20px;
            font-weight: 800;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .container .description {
            max-width: 800px;
            margin: 20px auto 40px auto;
            font-style: italic;
            color: #555;
            font-size: 17px;
            line-height: 1.7;
            border-left: 4px solid #a7d9f7;
            padding-left: 15px;
        }

        /* Container Tombol Bulan */
        #bulan-container {
            display: flex;
            flex-wrap: wrap;
            /* Izinkan tombol melipat ke baris baru */
            justify-content: center;
            gap: 15px;
            /* Jarak antar tombol lebih besar */
            margin-bottom: 40px;
            /* Margin bawah lebih besar */
        }

        /* Tombol Bulan */
        .bulan-btn {
            padding: 12px 22px;
            /* Padding lebih besar */
            background: white;
            border: 2px solid #1e3a8a;
            /* Border lebih tebal */
            color: #1e3a8a;
            border-radius: 10px;
            /* Sudut lebih membulat */
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            font-weight: 600;
            /* Lebih tebal */
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Bayangan lebih jelas */

            /* Aturan untuk memastikan 6 tombol per baris di layar lebar */
            flex: 0 0 calc(100% / 6 - 15px * 5 / 6);
            /* Untuk 6 tombol per baris dengan gap 15px */
            max-width: calc(100% / 6 - 15px * 5 / 6);
            /* Pastikan lebar maksimum untuk 6 item */
        }

        .bulan-btn:hover {
            background: #1e3a8a;
            color: white;
            transform: translateY(-3px);
            /* Efek lift lebih jelas */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .bulan-btn.active {
            /* Gaya untuk tombol bulan yang aktif */
            background: #1e3a8a;
            color: white;
            border-color: #1e3a8a;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(-1px);
        }

        /* FullCalendar Styling */
        #calendar {
            background: white;
            padding: 25px;
            /* Padding lebih besar */
            border-radius: 18px;
            /* Sudut lebih membulat */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            /* Bayangan yang lebih kuat */
            max-width: 900px;
            /* Batasi lebar kalender */
            margin: 0 auto;
            /* Pusatkan kalender */
            border: 1px solid rgba(0, 0, 0, 0.05);
            /* Border halus */
        }

        /* Gaya FullCalendar internal */
        .fc-theme-standard .fc-scrollgrid {
            /* Border dihilangkan untuk tampilan yang lebih bersih */
            border: none;
        }

        .fc-theme-standard td,
        .fc-theme-standard th {
            /* Border sel dihilangkan */
            border: none;
        }

        .fc .fc-button-primary {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
            color: white;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background 0.3s ease, border-color 0.3s ease, transform 0.2s ease;
        }

        .fc .fc-button-primary:not(:disabled):hover {
            background-color: #1a2f6b;
            border-color: #1a2f6b;
            transform: translateY(-1px);
        }

        .fc .fc-button-primary:focus {
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.3);
            /* Bayangan fokus */
        }


        .fc .fc-daygrid-day-number {
            color: #333;
            font-weight: 500;
            font-size: 15px;
            padding: 5px;
        }

        .fc .fc-daygrid-day-top {
            /* Memastikan nomor hari di pojok kanan atas */
            flex-direction: row-reverse;
        }

        .fc-event {
            background-color: #4CAF50;
            /* Warna hijau tua */
            border-color: #4CAF50;
            color: white;
            border-radius: 6px;
            /* Lebih membulat */
            padding: 3px 6px;
            font-size: 13px;
            white-space: normal;
            transition: background-color 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .fc-event:hover {
            background-color: #43a047;
            /* Sedikit lebih gelap saat hover */
            transform: scale(1.02);
        }

        .fc-event-main-frame {
            /* Memastikan judul event rata kiri */
            justify-content: flex-start;
        }

        .fc-event-title {
            font-weight: 500;
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
            /* Sesuai dengan border-radius wrapper */
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


        /* Copyright section*/
        .footer-copyright {
            width: 100%;
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            font-size: 14px;
            color: #d1e9f7;
        }

        /* Responsif untuk layar kecil*/
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

            .container .description {
                font-size: 15px;
            }

            /* Responsif Tombol Bulan */
            #bulan-container {
                gap: 10px;
                margin-bottom: 30px;
            }

            .bulan-btn {
                padding: 10px 18px;
                font-size: 14px;
                flex: 0 0 calc(100% / 4 - 10px * 3 / 4);
                /* Misal 4 tombol per baris */
                max-width: calc(100% / 4 - 10px * 3 / 4);
            }

            /* Responsif Calendar */
            #calendar {
                padding: 20px;
                border-radius: 15px;
            }

            .fc-toolbar.fc-header-toolbar {
                flex-direction: column;
                align-items: center;
            }

            .fc-toolbar-chunk {
                margin-bottom: 10px;
            }

            .fc .fc-button-group {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .fc .fc-button {
                margin: 5px;
            }

            /* Responsif Footer */
            footer {
                flex-direction: column;
                align-items: center;
                padding: 20px 15px;
                border-bottom-right-radius: 0;
                /* Sesuaikan */
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

            .footer-section h4 {
                text-align: center;
            }

            .footer-section h4::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }

        @media (max-width: 768px) {
            .social-sidebar a {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }

            .bulan-btn {
                padding: 8px 15px;
                font-size: 13px;
                flex: 0 0 calc(100% / 3 - 8px * 2 / 3);
                /* Misal 3 tombol per baris */
                max-width: calc(100% / 3 - 8px * 2 / 3);
            }

            #calendar {
                padding: 15px;
            }

            .fc .fc-button-primary {
                padding: 6px 10px;
                font-size: 13px;
            }

            .fc .fc-daygrid-day-number {
                font-size: 13px;
            }

            .fc-event {
                font-size: 11px;
                padding: 2px 4px;
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

            .container .description {
                font-size: 14px;
                margin: 15px auto 30px auto;
            }

            #bulan-container {
                gap: 8px;
                margin-bottom: 25px;
            }

            .bulan-btn {
                padding: 7px 12px;
                font-size: 12px;
                flex: 0 0 calc(100% / 2 - 5px / 2);
                /* Misal 2 tombol per baris */
                max-width: calc(100% / 2 - 5px / 2);
            }

            #calendar {
                padding: 10px;
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
            <div class="container">
                <h2>Timeline Kegiatan Kepengurusan</h2>
                <p class="description">Lihat jadwal kegiatan penting, rapat, dan acara FOKRI PTK yang akan datang.</p>

                <div id="bulan-container"></div>
                <div id="calendar"></div>
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

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        const bulanContainer = document.getElementById('bulan-container');
        const calendarEl = document.getElementById('calendar');
        const bulanList = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const today = new Date();
        const bulanSekarang = today.getMonth(); // 0-indexed (Jan=0)

        // URL API Timeline Anda
        const API_URL = 'http://localhost/fokri/api_timeline.php'; // Ganti ini dengan URL yang benar!

        function renderBulanButtons() {
            bulanContainer.innerHTML = "";
            for (let i = 0; i < 12; i++) {
                const btn = createButton(bulanList[i], i);
                if (i === bulanSekarang) {
                    btn.classList.add('active');
                }
                bulanContainer.appendChild(btn);
            }
        }

        function createButton(label, monthIndex) {
            const btn = document.createElement('button');
            btn.className = "bulan-btn";
            btn.innerText = label;
            btn.onclick = () => {
                document.querySelectorAll('.bulan-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                initCalendar(monthIndex);
            };
            return btn;
        }

        let calendar;

        function initCalendar(monthIndex) {
            // Hancurkan kalender sebelumnya jika ada
            if (calendar) {
                calendar.destroy();
            }

            // Buat instance kalender baru
            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: `${today.getFullYear()}-${(monthIndex + 1).toString().padStart(2, '0')}-01`,
                editable: true,
                selectable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: {
                    url: API_URL,
                    method: 'GET',
                    success: function(response) {
                        console.log('Events loaded successfully:', response);
                        // Pastikan response memiliki format yang benar
                        if (response && response.success && Array.isArray(response.events)) {
                            return response.events.map(event => ({
                                id: event.id,
                                title: event.title,
                                start: event.start,
                                description: event.description,
                                url: event.url || null,
                                allDay: true
                            }));
                        } else {
                            console.error('Invalid response format:', response);
                            return [];
                        }
                    },
                    failure: function(error) {
                        console.error('Failed to load events:', error);
                        alert('Gagal memuat kegiatan. Silakan cek koneksi atau hubungi admin.');
                        return [];
                    }
                },
                eventContent: function(arg) {
                    // Custom event rendering
                    const eventEl = document.createElement('div');
                    eventEl.className = 'fc-event-main-frame';

                    const titleEl = document.createElement('div');
                    titleEl.className = 'fc-event-title';
                    titleEl.innerText = arg.event.title;

                    eventEl.appendChild(titleEl);

                    return {
                        domNodes: [eventEl]
                    };
                },
                dateClick: async function(info) {
                    // Handler klik tanggal untuk menambah event baru
                    const title = prompt(`Masukkan judul kegiatan pada ${info.dateStr}:`);
                    if (!title) return;

                    const description = prompt(`Masukkan deskripsi kegiatan ${title}:`);
                    const lampiran = prompt(`Masukkan link lampiran (opsional) untuk ${title}:`);

                    try {
                        const response = await fetch(API_URL, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                title: title,
                                description: description,
                                start: info.dateStr,
                                url: lampiran
                            })
                        });

                        const result = await response.json();

                        if (result.success) {
                            alert('Kegiatan berhasil ditambahkan!');
                            // Tambahkan event ke kalender
                            calendar.addEvent({
                                id: result.id,
                                title: title,
                                start: info.dateStr,
                                description: description,
                                url: lampiran,
                                allDay: true
                            });
                        } else {
                            throw new Error(result.message || 'Gagal menambahkan kegiatan');
                        }
                    } catch (error) {
                        console.error('Error adding event:', error);
                        alert(`Gagal menambahkan kegiatan: ${error.message}`);
                    }
                },
                eventClick: async function(info) {
                    // Mencegah perilaku default yang bisa menyebabkan redirect
                    info.jsEvent.preventDefault();

                    const action = prompt(
                        `Kegiatan: ${info.event.title}\n\n` +
                        `Pilih aksi: [H]apus atau [U]bah`, "U"
                    );

                    // Jika user menekan cancel atau tidak memilih aksi, keluar dari fungsi
                    if (action === null) return;

                    if (action.toUpperCase() === 'H') {
                        if (confirm(`Yakin menghapus kegiatan "${info.event.title}"?`)) {
                            try {
                                const response = await fetch(API_URL, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        id: info.event.id
                                    })
                                });

                                const result = await response.json();

                                if (result.success) {
                                    alert('Kegiatan berhasil dihapus!');
                                    // Refresh kalender setelah delete
                                    calendar.refetchEvents();
                                } else {
                                    throw new Error(result.message || 'Gagal menghapus kegiatan');
                                }
                            } catch (error) {
                                console.error('Error deleting event:', error);
                                alert(`Gagal menghapus kegiatan: ${error.message}`);
                            }
                        }
                    } else if (action.toUpperCase() === 'U') {
                        const newTitle = prompt('Judul baru:', info.event.title);
                        // Jika user menekan cancel, keluar dari fungsi
                        if (newTitle === null) return;

                        const newDesc = prompt('Deskripsi baru:', info.event.extendedProps.description || '');
                        // Jika user menekan cancel, keluar dari fungsi
                        if (newDesc === null) return;

                        const newUrl = prompt('Link lampiran baru:', info.event.url || '');
                        // Jika user menekan cancel, keluar dari fungsi
                        if (newUrl === null) return;

                        try {
                            const response = await fetch(API_URL, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    id: info.event.id,
                                    title: newTitle,
                                    description: newDesc,
                                    url: newUrl,
                                    start: info.event.startStr
                                })
                            });

                            const result = await response.json();

                            if (result.success) {
                                alert('Kegiatan berhasil diperbarui!');
                                // Refresh kalender setelah update
                                calendar.refetchEvents();
                            } else {
                                throw new Error(result.message || 'Gagal memperbarui kegiatan');
                            }
                        } catch (error) {
                            console.error('Error updating event:', error);
                            alert(`Gagal memperbarui kegiatan: ${error.message}`);
                        }
                    }
                },

                eventDrop: async function(info) {
                    try {
                        const response = await fetch(API_URL, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: info.event.id,
                                title: info.event.title,
                                description: info.event.extendedProps.description,
                                url: info.event.url,
                                start: info.event.startStr,
                                end: info.event.endStr
                            })
                        });

                        const result = await response.json();

                        if (result.success) {
                            alert('Kegiatan berhasil diperbarui!');
                            // Redirect ke halaman Timeline setelah update
                            window.location.href = 'Timeline.php';
                        } else {
                            throw new Error(result.message || 'Gagal memperbarui tanggal kegiatan');
                        }
                    } catch (error) {
                        console.error('Error updating event date:', error);
                        alert(`Gagal memperbarui tanggal kegiatan: ${error.message}`);
                        info.revert();
                    }
                },

                eventDidMount: function(info) {
                    // Solusi sederhana tanpa Bootstrap
                    if (info.event.extendedProps.description) {
                        info.el.setAttribute('title', info.event.extendedProps.description);
                        info.el.style.cursor = 'help';

                        // Efek hover sederhana
                        info.el.addEventListener('mouseenter', function() {
                            // Anda bisa membuat tooltip custom di sini jika perlu
                        });
                    }
                },
            });

            // Render kalender
            calendar.render();
        }

        // Fungsi untuk inisialisasi atau memperbarui kalender
        // function initCalendar(monthIndex){
        //     if(calendar){
        //         calendar.destroy(); // Hancurkan instance kalender sebelumnya jika ada
        //     }

        //     calendar = new FullCalendar.Calendar(calendarEl, {
        //         initialView: 'dayGridMonth',
        //         initialDate: `${today.getFullYear()}-${(monthIndex + 1).toString().padStart(2, '0')}-01`,
        //         editable: true,
        //         selectable: true,
        //         headerToolbar: {
        //             left: 'prev,next today',
        //             center: 'title',
        //             right: 'dayGridMonth,timeGridWeek'
        //         },
        //         events: { // FullCalendar akan memuat events dari URL ini
        //             url: API_URL,
        //             method: 'GET',
        //             failure: function() {
        //                 alert('Gagal memuat kegiatan. Periksa koneksi server atau API.');
        //             }
        //         },
        //         dateClick: async function(info){
        //             const title = prompt(`Masukkan judul kegiatan pada ${info.dateStr}:`);
        //             if(!title) return;

        //             const description = prompt(`Masukkan deskripsi kegiatan ${title}:`);
        //             // Lampiran bersifat opsional, jadi bisa kosong
        //             const lampiran = prompt(`Masukkan link lampiran (opsional) untuk ${title}:`);

        //             try {
        //                 const response = await fetch(API_URL, {
        //                     method: 'POST',
        //                     headers: {
        //                         'Content-Type': 'application/json'
        //                     },
        //                     body: JSON.stringify({
        //                         title: title,
        //                         description: description,
        //                         start: info.dateStr,
        //                         url: lampiran // FullCalendar menggunakan 'url' untuk link, sesuaikan dengan 'lampiran' di database
        //                     })
        //                 });
        //                 const result = await response.json();
        //                 if(result.success){
        //                     alert('Kegiatan berhasil ditambahkan!');
        //                     // Tambahkan event ke kalender FullCalendar secara lokal
        //                     calendar.addEvent({
        //                         id: result.id, // Gunakan ID dari database
        //                         title: title,
        //                         start: info.dateStr,
        //                         description: description,
        //                         url: lampiran,
        //                         allDay: true
        //                     });
        //                 } else {
        //                     alert('Gagal menambahkan kegiatan: ' + result.message);
        //                 }
        //             } catch (error) {
        //                 console.error('Error adding event:', error);
        //                 alert('Terjadi kesalahan jaringan saat menambahkan kegiatan.');
        //             }
        //         },
        //         eventClick: async function(info){
        //             if(confirm(`Hapus kegiatan "${info.event.title}" ini?`)){
        //                 try {
        //                     const response = await fetch(API_URL, {
        //                         method: 'DELETE',
        //                         headers: {
        //                             'Content-Type': 'application/json'
        //                         },
        //                         body: JSON.stringify({ id: info.event.id })
        //                     });
        //                     const result = await response.json();
        //                     if(result.success){
        //                         alert('Kegiatan berhasil dihapus!');
        //                         info.event.remove(); // Hapus event dari kalender secara lokal
        //                     } else {
        //                         alert('Gagal menghapus kegiatan: ' + result.message);
        //                     }
        //                 } catch (error) {
        //                     console.error('Error deleting event:', error);
        //                     alert('Terjadi kesalahan jaringan saat menghapus kegiatan.');
        //                 }
        //             }
        //         },
        //         eventDrop: async function(info) { // Handler saat event dipindahkan
        //             const newStart = info.event.startStr;
        //             const newEnd = info.event.endStr; // Jika ada end date

        //             try {
        //                 const response = await fetch(API_URL, {
        //                     method: 'PUT',
        //                     headers: {
        //                         'Content-Type': 'application/json'
        //                     },
        //                     body: JSON.stringify({
        //                         id: info.event.id,
        //                         title: info.event.title,
        //                         start: newStart,
        //                         description: info.event.extendedProps.description, // Ambil dari extendedProps
        //                         url: info.event.url // Ambil dari URL
        //                     })
        //                 });
        //                 const result = await response.json();
        //                 if(result.success){
        //                     alert('Kegiatan berhasil diperbarui!');
        //                 } else {
        //                     alert('Gagal memperbarui kegiatan: ' + result.message);
        //                     info.revert(); // Kembalikan event ke posisi semula jika gagal
        //                 }
        //             } catch (error) {
        //                 console.error('Error updating event:', error);
        //                 alert('Terjadi kesalahan jaringan saat memperbarui kegiatan.');
        //                 info.revert(); // Kembalikan event ke posisi semula jika gagal
        //             }
        //         }
        //     });
        //     calendar.render();
        // }

        // Inisialisasi awal
        renderBulanButtons();
        initCalendar(bulanSekarang);

        // Logout Function
        function logout() {
            if (confirm("Yakin ingin logout?")) {
                // Asumsi logout memanggil API backend untuk menghapus sesi, dll.
                // Untuk saat ini, kita hanya membersihkan localStorage dan redirect.
                localStorage.clear();
                window.location.href = "index.html"; // ganti ke halaman loginmu
            }
        }
    </script>

</body>

</html>