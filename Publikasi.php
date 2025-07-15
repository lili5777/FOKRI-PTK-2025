<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publikasi - FOKRI PTK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* CSS Anda yang sudah ada */
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

        /* Card untuk Form Tambah Publikasi */
        .form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 30px;
            text-align: left;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-card h3 {
            color: #1e3a8a;
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: 700;
        }

        .form-card input,
        .form-card textarea {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0 15px 0;
            border: 1px solid #a7d9f7;
            border-radius: 10px;
            font-size: 16px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            outline: none;
            transition: border 0.3s, box-shadow 0.3s;
            resize: vertical;
        }

        .form-card input:focus,
        .form-card textarea:focus {
            border: 1px solid #64b5f6;
            box-shadow: 0 0 0 4px rgba(100, 181, 246, 0.2);
        }

        .form-card button {
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .form-card button:hover {
            background: #1a2f6b;
            transform: translateY(-2px);
        }

        /* CONTAINER BARU UNTUK DAFTAR PUBLIKASI */
        .publikasi-list-container {
            display: flex;
            flex-direction: column;
            /* Ini yang membuat item menumpuk vertikal */
            gap: 20px;
            /* Jarak antar publikasi */
            margin-top: 30px;
            max-width: 800px;
            /* Lebar maksimal sesuai form card */
            margin-left: auto;
            margin-right: auto;
            align-items: center;
            /* Pusatkan jika itemnya tidak selebar max-width */
        }

        /* CARD PUBLIKASI BARU */
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

        .publikasi-card .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            margin-top: 20px;
            float: right;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .publikasi-card .delete-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .publikasi-card::after {
            /* Clearfix untuk float */
            content: "";
            display: table;
            clear: both;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            background: white;
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 20px;
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header button {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .like-btn {
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
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

            .form-card {
                padding: 20px;
            }

            .form-card input,
            .form-card textarea {
                padding: 10px 12px;
                font-size: 14px;
            }

            .form-card button {
                padding: 10px 15px;
                font-size: 14px;
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

            .publikasi-card .delete-btn {
                font-size: 12px;
                padding: 6px 12px;
            }
        }

        .publikasi-card .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 15px;
            transition: background 0.3s ease, transform 0.2s ease;
            float: right;
        }

        .publikasi-card .delete-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .publikasi-meta {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .publikasi-meta span {
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin: 15px 0;
            flex-wrap: wrap;
        }

        .action-btn {
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background 0.3s ease;
        }

        .action-btn:hover {
            background: #0b6cb3;
        }

        .action-btn i {
            font-size: 16px;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .delete-btn:hover {
            background: #c82333;
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
                <h2>Publikasi Kami</h2>
                <p style="max-width: 800px; margin: 20px auto 40px auto; font-style: italic; color: #555; font-size: 17px; line-height: 1.7; border-left: 4px solid #a7d9f7; padding-left: 15px;">"Lihat berbagai publikasi terbaru dan arsip dari FOKRI PTK."</p>

                <div class="form-card">
                    <h3>Tambah Publikasi Baru</h3>
                    <input type="text" id="judul" placeholder="Judul Publikasi">
                    <textarea id="isi" placeholder="Deskripsi publikasi (multi-paragraf diperbolehkan)"></textarea>
                    <input type="file" id="gambar_file" accept=".jpg,.jpeg,.png" placeholder="Upload Gambar (opsional)">
                    <input type="file" id="dokumen_file" accept=".pdf" placeholder="Upload Dokumen (opsional)">
                    <input type="text" id="youtube_link" placeholder="Link YouTube (opsional)">
                    <button onclick="tambahPublikasi()">Publikasikan</button>
                </div>
                <div class="publikasi-grid" id="publikasi-list">
                    <p>Memuat pengumuman...</p>
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

            function loadPublikasi() {
                const container = document.getElementById('publikasi-list');
                container.innerHTML = "";

                fetch(API_URL)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.data.length > 0) {
                            data.data.forEach(item => {
                                const card = document.createElement('div');
                                card.className = "publikasi-card";
                                card.onclick = (e) => {
                                    // Jika yang diklik bukan tombol delete, tampilkan modal
                                    if (!e.target.classList.contains('delete-btn')) {
                                        showDetailPublikasi(item.id, e);
                                    }
                                };

                                card.innerHTML = `
                        <h3>${item.judul}</h3>
                        <p class="publikasi-meta">${item.tanggal}</p>
                        <p>${item.isi.substring(0, 100)}...</p>
                        <button class="delete-btn" onclick="hapusPublikasi(${item.id}, event)">Hapus</button>
                    `;
                                container.appendChild(card);
                            });
                        } else {
                            container.innerHTML = "<p>Belum ada publikasi</p>";
                        }
                    });
            }

            function closeModal() {
                const modal = document.getElementById('publikasiModal');
                if (modal) modal.remove();
                loadPublikasi(); // Refresh list setelah menutup modal
            }

            function showDetailPublikasi(id, event) {
                if (event) {
                    event.stopPropagation();
                }

                fetch(`${API_URL}?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const item = data.data[0];

                            // Buat tombol untuk gambar jika ada
                            const gambarButton = item.gambar_url ?
                                `<button class="action-btn" onclick="window.open('${item.gambar_url}', '_blank')">
                        <i class="fas fa-image"></i> Lihat Foto
                    </button>` : '';

                            // Buat tombol untuk dokumen jika ada
                            const dokumenButton = item.dokumen_url ?
                                `<button class="action-btn" onclick="window.open('${item.dokumen_url}', '_blank')">
                        <i class="fas fa-file-pdf"></i> Lihat Dokumen
                    </button>` : '';

                            // Buat embed YouTube jika ada
                            const youtubeEmbed = item.youtube_link ?
                                `<div style="margin-top:15px;">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/${extractYouTubeID(item.youtube_link)}" frameborder="0" allowfullscreen></iframe>
                    </div>` : '';

                            const modal = `
                    <div class="modal-overlay active" id="publikasiModal">
                        <div class="modal-container">
                            <div class="modal-header">
                                <h3>${item.judul}</h3>
                                <button onclick="closeModal()">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p class="publikasi-meta">${item.tanggal} <span><i class="fas fa-eye"></i> ${item.view_count || 0}</span> | 
        <span><i class="fas fa-heart"></i> ${item.like_count || 0}</span></p>
                                <p>${item.isi.replace(/\n/g,'<br>')}</p>
                                
                                <div class="action-buttons">
                                    ${gambarButton}
                                    ${dokumenButton}
                                </div>
                                
                                ${youtubeEmbed}
                                
                                <button class="delete-btn" onclick="hapusPublikasi(${item.id}, event)">
                                    <i class="fas fa-trash"></i> Hapus Publikasi
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                            document.body.insertAdjacentHTML('beforeend', modal);
                        }
                    });
            }

            // Fungsi untuk mengekstrak ID dari link YouTube
            function extractYouTubeID(url) {
                const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                const match = url.match(regExp);
                return (match && match[2].length === 11) ? match[2] : null;
            }

            function tambahPublikasi() {
                const judul = document.getElementById('judul').value.trim();
                const isi = document.getElementById('isi').value.trim();
                const youtube_link = document.getElementById('youtube_link').value.trim();
                const gambar_file = document.getElementById('gambar_file').files[0] || null;
                const dokumen_file = document.getElementById('dokumen_file').files[0] || null;

                if (!judul || !isi) {
                    alert("Judul dan deskripsi publikasi wajib diisi.");
                    return;
                }

                const formData = new FormData();
                formData.append('judul', judul);
                formData.append('isi', isi);
                formData.append('youtube_link', youtube_link);

                if (gambar_file) {
                    formData.append('gambar_publikasi', gambar_file); // Sesuaikan dengan nama di backend
                }
                if (dokumen_file) {
                    formData.append('dokumen_publikasi', dokumen_file); // Sesuaikan dengan nama di backend
                }

                fetch(API_URL, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw err;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            // Reset form
                            document.getElementById('judul').value = "";
                            document.getElementById('isi').value = "";
                            document.getElementById('youtube_link').value = "";
                            document.getElementById('gambar_file').value = "";
                            document.getElementById('dokumen_file').value = "";
                            loadPublikasi();
                        } else {
                            alert("Error: " + data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error adding publikasi:", error);
                        alert("Gagal menambahkan publikasi: " + (error.message || "Coba lagi nanti."));
                    });
            }

            // function tambahPublikasi() {
            //     const judul = document.getElementById('judul').value.trim();
            //     const isi = document.getElementById('isi').value.trim();
            //     const youtube_link = document.getElementById('youtube_link').value.trim();
            //     const gambar_url = document.getElementById('gambar_url')?.files?.[0] || null;
            //     const dokumen_url = document.getElementById('dokumen_url')?.files?.[0] || null;

            //     if (!judul || !isi) {
            //         alert("Judul dan deskripsi publikasi wajib diisi.");
            //         return;
            //     }

            //     const formData = new FormData();
            //     formData.append('judul', judul);
            //     formData.append('isi', isi);
            //     formData.append('youtube_link', youtube_link);

            //     if (gambar_file) {
            //         formData.append('gambar_url', gambar_file);
            //     }
            //     if (dokumen_file) {
            //         formData.append('dokumen_url', dokumen_file);
            //     }

            //     fetch(API_URL, {
            //         method: 'POST',
            //         body: formData
            //     })
            //     .then(response => {
            //         if (!response.ok) {
            //             throw new Error(`HTTP error! status: ${response.status}`);
            //         }
            //         return response.json();
            //     })
            //     .then(data => {
            //         if (data.success) {
            //             alert(data.message);
            //             document.getElementById('judul').value = "";
            //             document.getElementById('isi').value = "";
            //             document.getElementById('youtube_link').value = "";
            //             if (document.getElementById('gambar_url')) document.getElementById('gambar_url').value = "";
            //             if (document.getElementById('dokumen_url')) document.getElementById('dokumen_url').value = "";
            //             loadPublikasi();
            //         } else {
            //             alert("Error: " + data.message);
            //         }
            //     })
            //     .catch(error => {
            //         console.error("Error adding publikasi:", error);
            //         alert("Gagal menambahkan publikasi. Coba lagi nanti.");
            //     });
            // }

            function hapusPublikasi(id) {
                if (!confirm("Yakin ingin menghapus publikasi ini?")) return;

                // Kirim permintaan DELETE ke PHP API dengan ID sebagai parameter URL
                fetch(`${API_URL}?id=${id}`, {
                        method: 'DELETE'
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            loadPublikasi(); // Muat ulang publikasi dari database
                            alert(data.message);
                        } else {
                            alert("Error: " + data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error deleting publikasi:", error);
                        alert("Gagal menghapus publikasi. Coba lagi nanti. " + error.message);
                    });
            }

            // Initial load when the page loads
            loadPublikasi();

            function logout() {
                if (confirm("Yakin ingin logout?")) {
                    window.location.href = "logout.php";
                }
            }
        </script>

</body>

</html>