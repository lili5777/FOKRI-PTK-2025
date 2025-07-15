<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengumuman - FOKRI PTK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
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
            /* Untuk mempusatkan main-wrapper jika ada */
        }

        /* Navbar  */
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

        /* Main Content Area Wrapper  */
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

        /* Social Sidebar  */
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

        /* Container Utama (Pengumuman) */
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

        .container h2 {
            /* Tambahkan jika ingin ada judul di dalam container, seperti di FRONTEND */
            font-size: 36px;
            color: #1e3a8a;
            margin-bottom: 20px;
            font-weight: 800;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }


        /* Card untuk Form Tambah Pengumuman */
        .form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 30px;
            /* Spasi lebih besar dari grid pengumuman */
            text-align: left;
            max-width: 800px;
            /* Batasi lebar form agar tidak terlalu lebar */
            margin-left: auto;
            margin-right: auto;
        }

        .form-card h3 {
            color: #1e3a8a;
            font-size: 24px;
            /* Ukuran font lebih besar untuk judul form */
            margin-bottom: 15px;
            text-align: center;
            font-weight: 700;
        }

        .form-card label {
            /* Tambahkan label jika perlu */
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }

        .form-card input,
        .form-card textarea {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0 15px 0;
            /* Sesuaikan margin */
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

        /* Grid untuk Daftar Pengumuman */
        .pengumuman-grid {
            display: grid;
            grid-template-columns: 1fr;
            /* Paksa 1 kolom per baris */
            gap: 25px;
            /* Jarak antar kartu pengumuman */
            margin-top: 30px;
            justify-content: center;
            /* Pusatkan kartu */
            max-width: 800px;
            /* Batasi lebar grid */
            margin-left: auto;
            margin-right: auto;
        }

        /* Card Pengumuman */
        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 20px;
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            /* Border halus */
        }

        .card:hover {
            transform: translateY(-5px) scale(1.02);
            /* Efek sedikit mengangkat dan membesar */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            color: #1e3a8a;
            font-size: 18px;
            /* Ukuran font judul */
            margin-bottom: 8px;
            cursor: pointer;
            transition: color 0.3s ease, text-decoration 0.3s ease;
            font-weight: 700;
        }

        .card h3:hover {
            color: #2a52be;
            text-decoration: underline;
        }

        .card p.card-date {
            /* Untuk tanggal di card */
            font-size: 12px;
            /* Ukuran font kecil untuk tanggal */
            color: #666;
            margin: 0;
            /* Hapus margin default p */
            text-align: right;
            /* Pindahkan tanggal ke kanan */
            width: 100%;
            /* Pastikan mengambil lebar penuh */
        }

        .card .card-content {
            /* Opsional: jika ingin konten selain judul dan tanggal */
            font-size: 14px;
            color: #666;
            margin: 6px 0;
            line-height: 1.6;
            flex-grow: 1;
        }

        .card .card-attachments {
            font-size: 13px;
            color: #444;
            margin-top: 10px;
            word-break: break-all;
        }

        .card .card-attachments a {
            color: #0b6cb3;
            text-decoration: none;
        }

        .card .card-attachments a:hover {
            text-decoration: underline;
        }


        .card button {
            /* Tombol Hapus */
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            margin-top: 15px;
            align-self: flex-start;
            /* Mengatur tombol di kiri bawah */
            width: auto;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .card button:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        /* Footer Styling  */
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


        /* Copyright section  */
        .footer-copyright {
            width: 100%;
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            font-size: 14px;
            color: #d1e9f7;
        }

        /* Modal Overlay  */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal {
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 500px;
            width: 90%;
            text-align: left;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            /* Penting untuk posisi tombol close */
        }

        .modal .close-button {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #aaa;
            transition: color 0.3s ease;
        }

        .modal .close-button:hover {
            color: #555;
        }

        .modal h3 {
            color: #1e3a8a;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .modal p {
            font-size: 15px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .modal #modal-tanggal {
            font-size: 13px;
            color: #777;
            margin-bottom: 15px;
            text-align: left;
            /* Sesuaikan agar rata kiri di modal */
        }

        .modal #modal-lampiran ul {
            list-style-type: none;
            padding: 0;
            margin-top: 15px;
        }

        .modal #modal-lampiran li {
            margin-bottom: 5px;
        }

        .modal #modal-lampiran a {
            color: #1e3a8a;
            text-decoration: none;
            word-break: break-all;
        }

        .modal #modal-lampiran a:hover {
            text-decoration: underline;
        }

        .modal button {
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            margin-top: 20px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .modal button:hover {
            background: #1a2f6b;
            transform: translateY(-2px);
        }

        .hidden {
            display: none;
        }

        /* Message Box Styles (baru ditambahkan) */
        .message-box {
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            display: none;
            /* Default hidden */
        }

        .message-box.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message-box.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }


        /* Responsif untuk layar kecil  */
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

            /* Grid Pengumuman di layar medium */
            .pengumuman-grid {
                grid-template-columns: 1fr;
                /* Tetap satu kolom untuk responsif */
                gap: 20px;
            }

            .card {
                padding: 18px;
                border-radius: 12px;
            }

            .card h3 {
                font-size: 16px;
            }

            .card p {
                font-size: 13px;
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

            /* Responsif Modal */
            .modal {
                padding: 20px;
            }

            .modal h3 {
                font-size: 18px;
            }

            .modal p {
                font-size: 14px;
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

            /* Grid Pengumuman di layar lebih kecil */
            .pengumuman-grid {
                grid-template-columns: 1fr;
                /* Pastikan 1 kolom */
                gap: 15px;
            }
        }

        @media (max-width: 600px) {

            /* Tambahan untuk 1 kolom di ponsel */
            .pengumuman-grid {
                grid-template-columns: 1fr;
                /* Paksa 1 kolom */
                gap: 15px;
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
                /* Ini untuk deskripsi di FRONTEND, tidak ada di pengumuman */
                font-size: 14px;
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

            .card {
                padding: 15px;
                border-radius: 10px;
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
            <div class="container">
                <h2>Pengumuman Resmi FOKRI PTK</h2>
                <p style="max-width: 800px; margin: 20px auto 40px auto; font-style: italic; color: #555; font-size: 17px; line-height: 1.7; border-left: 4px solid #a7d9f7; padding-left: 15px;">"Informasi terkini dan penting dari FOKRI PTK untuk seluruh anggota dan civitas akademika."</p>

                <div class="form-card">
                    <h3>Tambah Pengumuman Baru</h3>
                    <div class="message-box" id="form-message"></div> <input type="text" id="judul" placeholder="Judul Pengumuman">
                    <textarea id="isi" placeholder="Isi pengumuman (multi-paragraf diperbolehkan)"></textarea>
                    <textarea id="lampiran" placeholder="Link lampiran (opsional, pisahkan dengan enter jika lebih dari satu)"></textarea>
                    <button onclick="tambahPengumuman()">Publikasikan Pengumuman</button>
                </div>
                <div class="pengumuman-grid" id="pengumuman-list">
                    <p>Memuat pengumuman...</p>
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

    <div id="modal-detail" class="modal-overlay hidden">
        <div class="modal">
            <span class="close-button" onclick="tutupModal()">×</span>
            <h3 id="modal-judul"></h3>
            <p class="card-date" id="modal-tanggal"></p>
            <p id="modal-isi" style="margin:10px 0;"></p>
            <div id="modal-lampiran"></div>
            <button onclick="tutupModal()">Tutup</button>
        </div>
    </div>

    <script>
        // PASTIKAN URL INI SESUAI DENGAN LOKASI api_pengumuman.php ANDA
        const API_URL = 'http://localhost/fokri/api_pengumuman.php'; // GANTI INI!
        const pengumumanListContainer = document.getElementById('pengumuman-list');
        const formMessageElement = document.getElementById('form-message');

        // Fungsi untuk menampilkan pesan (error/success)
        function showMessage(element, message, type = 'error') {
            element.textContent = message;
            element.className = `message-box ${type}`;
            element.style.display = 'block';
            setTimeout(() => {
                element.style.display = 'none';
            }, 5000); // Pesan akan hilang setelah 5 detik
        }

        // Fungsi untuk memuat pengumuman dari API
        async function loadPengumuman() {
            pengumumanListContainer.innerHTML = '<p style="text-align: center;">Memuat pengumuman...</p>';
            try {
                console.log('Mengambil data dari:', API_URL); // Debug
                const response = await fetch(API_URL);
                console.log('Response status:', response.status); // Debug

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                console.log('Data yang diterima:', result); // Debug

                if (result.data) {
                    pengumumanListContainer.innerHTML = '';
                    if (result.data.length === 0) {
                        pengumumanListContainer.innerHTML = '<p style="text-align: center;">Belum ada pengumuman.</p>';
                        return;
                    }

                    result.data.forEach(item => {
                        const card = document.createElement('div');
                        card.className = "card";
                        card.setAttribute('data-id', item.id);

                        const date = new Date(item.tanggal_publikasi);
                        const formattedDate = date.toLocaleString('id-ID', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });

                        // PERUBAHAN: Gunakan item.lampiran bukan item.link_lampiran
                        const linksArray = item.lampiran ? item.lampiran.split('\n').filter(link => link.trim() !== '') : [];
                        let lampiranHtml = '';
                        if (linksArray.length > 0) {
                            lampiranHtml = '<div class="card-attachments"><strong>Lampiran:</strong><br>';
                            linksArray.forEach(link => {
                                lampiranHtml += `<a href="${link.trim()}" target="_blank">${link.trim()}</a><br>`;
                            });
                            lampiranHtml += '</div>';
                        }

                        // PERUBAHAN: Gunakan item.isi bukan item.isi_pengumuman
                        card.innerHTML = `
                    <h3 data-id="${item.id}" onclick="bukaModal(${item.id})">${item.judul}</h3>
                    <p class="card-date">${formattedDate}</p>
                    <div class="card-content">${item.isi.substring(0, 150)}${item.isi.length > 150 ? '...' : ''}</div>
                    ${lampiranHtml}
                    <button onclick="hapusPengumuman(${item.id}, event)">Hapus</button>
                `;
                        pengumumanListContainer.appendChild(card);
                    });
                } else {
                    showMessage(formMessageElement, result.message || 'Gagal memuat pengumuman.', 'error');
                    pengumumanListContainer.innerHTML = '<p style="text-align: center;">Gagal memuat pengumuman.</p>';
                }
            } catch (error) {
                console.error('Error fetching announcements:', error);
                showMessage(formMessageElement, 'Terjadi kesalahan jaringan saat memuat pengumuman.', 'error');
                pengumumanListContainer.innerHTML = `
            <p style="text-align: center; color: red;">
                Gagal memuat pengumuman. Periksa console untuk detail error.
            </p>
            <p style="text-align: center;">
                <button onclick="loadPengumuman()">Coba Lagi</button>
            </p>
        `;
            }
        }

        // Fungsi untuk menambah pengumuman (sesuaikan field)
        async function tambahPengumuman() {
            const judul = document.getElementById('judul').value.trim();
            const isi = document.getElementById('isi').value.trim();
            const lampiran = document.getElementById('lampiran').value.trim();

            if (!judul || !isi) {
                showMessage(formMessageElement, "Judul dan isi pengumuman wajib diisi.", 'error');
                return;
            }

            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        judul: judul,
                        isi: isi, // PERUBAHAN: Gunakan 'isi' bukan 'isi_pengumuman'
                        lampiran: lampiran // PERUBAHAN: Gunakan 'lampiran' bukan 'link_lampiran'
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage(formMessageElement, "Pengumuman berhasil ditambahkan!", 'success');
                    // Reset form
                    document.getElementById('judul').value = "";
                    document.getElementById('isi').value = "";
                    document.getElementById('lampiran').value = "";
                    // Muat ulang daftar
                    loadPengumuman();
                } else {
                    showMessage(formMessageElement, `Gagal menambahkan pengumuman: ${result.message || 'Terjadi kesalahan.'}`, 'error');
                }
            } catch (error) {
                console.error('Error adding announcement:', error);
                showMessage(formMessageElement, 'Terjadi kesalahan jaringan saat menambahkan pengumuman.', 'error');
            }
        }

        // Fungsi untuk membuka modal detail (sesuaikan field)
        async function bukaModal(id) {
            try {
                const response = await fetch(`${API_URL}?id=${id}`);
                const result = await response.json();

                if (response.ok && result.data) {
                    const item = result.data;
                    document.getElementById('modal-judul').innerText = item.judul;

                    const date = new Date(item.tanggal_publikasi);
                    document.getElementById('modal-tanggal').innerText = date.toLocaleString('id-ID', {
                        dateStyle: 'medium',
                        timeStyle: 'short'
                    });

                    // PERUBAHAN: Gunakan item.isi bukan item.isi_pengumuman
                    document.getElementById('modal-isi').innerHTML = item.isi.replace(/\n/g, '<br>');

                    const lampiranContainer = document.getElementById('modal-lampiran');
                    lampiranContainer.innerHTML = "";
                    // PERUBAHAN: Gunakan item.lampiran bukan item.link_lampiran
                    const linksArray = item.lampiran ? item.lampiran.split('\n').filter(link => link.trim() !== '') : [];

                    if (linksArray.length > 0) {
                        const ul = document.createElement('ul');
                        ul.style.listStyleType = 'disc';
                        ul.style.marginLeft = '20px';
                        const lampiranTitle = document.createElement('p');
                        lampiranTitle.innerHTML = '<strong>Lampiran:</strong>';
                        lampiranContainer.appendChild(lampiranTitle);
                        linksArray.forEach(link => {
                            const li = document.createElement('li');
                            li.innerHTML = `<a href="${link}" target="_blank">${link}</a>`;
                            ul.appendChild(li);
                        });
                        lampiranContainer.appendChild(ul);
                    }
                    document.getElementById('modal-detail').classList.remove('hidden');
                } else {
                    showMessage(formMessageElement, result.message || 'Detail pengumuman tidak ditemukan.', 'error');
                }
            } catch (error) {
                console.error('Error fetching announcement detail:', error);
                showMessage(formMessageElement, 'Gagal memuat detail pengumuman.', 'error');
            }
        }

        // Tambahkan event parameter untuk hapusPengumuman
        async function hapusPengumuman(id, event) {
            if (event) event.stopPropagation(); // Mencegah event bubbling ke card

            if (!confirm("Yakin ingin menghapus pengumuman ini?")) {
                return;
            }

            try {
                const response = await fetch(API_URL, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: id
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage(formMessageElement, "Pengumuman berhasil dihapus!", 'success');
                    // Hapus card langsung dari DOM
                    const cardToRemove = document.querySelector(`.card[data-id="${id}"]`);
                    if (cardToRemove) cardToRemove.remove();

                    // Jika tidak ada pengumuman lagi
                    if (pengumumanListContainer.children.length === 0) {
                        pengumumanListContainer.innerHTML = '<p style="text-align: center;">Belum ada pengumuman.</p>';
                    }
                } else {
                    showMessage(formMessageElement, `Gagal menghapus pengumuman: ${result.message || 'Terjadi kesalahan.'}`, 'error');
                }
            } catch (error) {
                console.error('Error deleting announcement:', error);
                showMessage(formMessageElement, 'Terjadi kesalahan jaringan saat menghapus pengumuman.', 'error');
            }
        }

        // Fungsi untuk memuat pengumuman dari API
        // async function loadPengumuman() {
        //     pengumumanListContainer.innerHTML = '<p style="text-align: center;">Memuat pengumuman...</p>';
        //     try {
        //         const response = await fetch(API_URL);
        //         const result = await response.json();

        //         if (response.ok && result.data) {
        //             pengumumanListContainer.innerHTML = ''; // Kosongkan container
        //             if (result.data.length === 0) {
        //                 pengumumanListContainer.innerHTML = '<p style="text-align: center;">Belum ada pengumuman.</p>';
        //                 return;
        //             }

        //             result.data.forEach(item => {
        //                 const card = document.createElement('div');
        //                 card.className = "card";
        //                 // Simpan ID pengumuman di dataset untuk operasi hapus dan modal
        //                 card.setAttribute('data-id', item.id);

        //                 // Format tanggal agar sesuai dengan tampilan yang diinginkan
        //                 const date = new Date(item.tanggal_publikasi);
        //                 const formattedDate = date.toLocaleString('id-ID', {
        //                     year: 'numeric',
        //                     month: 'long',
        //                     day: 'numeric',
        //                     hour: '2-digit',
        //                     minute: '2-digit'
        //                 });

        //                 // Parse link_lampiran jika ada
        //                 const linksArray = item.link_lampiran ? item.link_lampiran.split('\n').filter(link => link.trim() !== '') : [];
        //                 let lampiranHtml = '';
        //                 if (linksArray.length > 0) {
        //                     lampiranHtml = '<div class="card-attachments"><strong>Lampiran:</strong><br>';
        //                     linksArray.forEach(link => {
        //                         lampiranHtml += `<a href="${link.trim()}" target="_blank">${link.trim()}</a><br>`;
        //                     });
        //                     lampiranHtml += '</div>';
        //                 }

        //                 card.innerHTML = `
        //                 <h3 data-id="${item.id}" onclick="bukaModal(${item.id})">${item.judul}</h3>
        //                 <p class="card-date">${formattedDate}</p>
        //                 <div class="card-content">${item.isi_pengumuman.substring(0, 150)}${item.isi_pengumuman.length > 150 ? '...' : ''}</div>
        //                 ${lampiranHtml}
        //                 <button onclick="hapusPengumuman(${item.id})">Hapus</button>
        //             `;
        //                 pengumumanListContainer.appendChild(card);
        //             });
        //         } else {
        //             showMessage(formMessageElement, result.message || 'Gagal memuat pengumuman.', 'error');
        //             pengumumanListContainer.innerHTML = '<p style="text-align: center;">Gagal memuat pengumuman.</p>';
        //         }
        //     } catch (error) {
        //         console.error('Error fetching announcements:', error);
        //         showMessage(formMessageElement, 'Terjadi kesalahan jaringan saat memuat pengumuman.', 'error');
        //         pengumumanListContainer.innerHTML = '<p style="text-align: center;">Gagal memuat pengumuman. Periksa koneksi server.</p>';
        //     }
        // }

        // Fungsi untuk menambah pengumuman
        // async function tambahPengumuman() {
        //     const judul = document.getElementById('judul').value.trim();
        //     const isi = document.getElementById('isi').value.trim();
        //     const lampiran = document.getElementById('lampiran').value.trim();

        //     if (!judul || !isi) {
        //         showMessage(formMessageElement, "Judul dan isi pengumuman wajib diisi.", 'error');
        //         return;
        //     }

        //     try {
        //         const response = await fetch(API_URL, {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json'
        //             },
        //             body: JSON.stringify({
        //                 judul: judul,
        //                 isi_pengumuman: isi, // Sesuaikan dengan nama kolom di API
        //                 link_lampiran: lampiran
        //             })
        //         });

        //         const result = await response.json();

        //         if (response.ok) {
        //             showMessage(formMessageElement, "Pengumuman berhasil ditambahkan!", 'success');
        //             document.getElementById('judul').value = "";
        //             document.getElementById('isi').value = "";
        //             document.getElementById('lampiran').value = "";
        //             loadPengumuman(); // Muat ulang daftar pengumuman
        //         } else {
        //             showMessage(formMessageElement, `Gagal menambahkan pengumuman: ${result.message || 'Terjadi kesalahan.'}`, 'error');
        //         }
        //     } catch (error) {
        //         console.error('Error adding announcement:', error);
        //         showMessage(formMessageElement, 'Terjadi kesalahan jaringan saat menambahkan pengumuman.', 'error');
        //     }
        // }

        // Fungsi untuk menghapus pengumuman
        // async function hapusPengumuman(id) {
        //     if (!confirm("Yakin ingin menghapus pengumuman ini?")) {
        //         return;
        //     }

        //     try {
        //         const response = await fetch(API_URL, {
        //             method: 'DELETE',
        //             headers: {
        //                 'Content-Type': 'application/json'
        //             },
        //             body: JSON.stringify({
        //                 id: id
        //             })
        //         });

        //         const result = await response.json();

        //         if (response.ok) {
        //             showMessage(formMessageElement, "Pengumuman berhasil dihapus!", 'success');
        //             // Hapus card dari DOM secara langsung untuk efek instan
        //             const cardToRemove = document.querySelector(`.card[data-id="${id}"]`);
        //             if (cardToRemove) {
        //                 cardToRemove.remove();
        //             }
        //             // Jika tidak ada pengumuman lagi, tampilkan pesan
        //             if (pengumumanListContainer.children.length === 0) {
        //                 pengumumanListContainer.innerHTML = '<p style="text-align: center;">Belum ada pengumuman.</p>';
        //             }
        //         } else {
        //             showMessage(formMessageElement, `Gagal menghapus pengumuman: ${result.message || 'Terjadi kesalahan.'}`, 'error');
        //         }
        //     } catch (error) {
        //         console.error('Error deleting announcement:', error);
        //         showMessage(formMessageElement, 'Terjadi kesalahan jaringan saat menghapus pengumuman.', 'error');
        //     }
        // }

        // Fungsi untuk membuka modal detail
        // async function bukaModal(id) {
        //     try {
        //         const response = await fetch(`${API_URL}?id=${id}`);
        //         const result = await response.json();

        //         if (response.ok && result.data) {
        //             const item = result.data;
        //             document.getElementById('modal-judul').innerText = item.judul;

        //             // Format tanggal untuk modal
        //             const date = new Date(item.tanggal_publikasi);
        //             document.getElementById('modal-tanggal').innerText = date.toLocaleString('id-ID', {
        //                 dateStyle: 'medium',
        //                 timeStyle: 'short'
        //             });

        //             document.getElementById('modal-isi').innerHTML = item.isi_pengumuman.replace(/\n/g, '<br>');

        //             const lampiranContainer = document.getElementById('modal-lampiran');
        //             lampiranContainer.innerHTML = "";
        //             const linksArray = item.link_lampiran ? item.link_lampiran.split('\n').filter(link => link.trim() !== '') : [];

        //             if (linksArray.length > 0) {
        //                 const ul = document.createElement('ul');
        //                 ul.style.listStyleType = 'disc';
        //                 ul.style.marginLeft = '20px';
        //                 const lampiranTitle = document.createElement('p');
        //                 lampiranTitle.innerHTML = '<strong>Lampiran:</strong>';
        //                 lampiranContainer.appendChild(lampiranTitle);
        //                 linksArray.forEach(link => {
        //                     const li = document.createElement('li');
        //                     li.innerHTML = `<a href="${link}" target="_blank">${link}</a>`;
        //                     ul.appendChild(li);
        //                 });
        //                 lampiranContainer.appendChild(ul);
        //             }
        //             document.getElementById('modal-detail').classList.remove('hidden');
        //         } else {
        //             showMessage(formMessageElement, result.message || 'Detail pengumuman tidak ditemukan.', 'error');
        //         }
        //     } catch (error) {
        //         console.error('Error fetching announcement detail:', error);
        //         showMessage(formMessageElement, 'Gagal memuat detail pengumuman.', 'error');
        //     }
        // }

        function tutupModal() {
            document.getElementById('modal-detail').classList.add('hidden');
        }

        // Panggil fungsi loadPengumuman saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', loadPengumuman);

        // Fungsi logout (tetap sama)
        function logout() {
            if (confirm("Yakin ingin logout?")) {
                window.location.href = "logout.php";
            }
        }
    </script>

</body>

</html>