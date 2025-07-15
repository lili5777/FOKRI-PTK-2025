<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang FOKRI PTK</title>
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
            position: relative;
            /* Untuk positioning social-sidebar */
        }

        /* Social Sidebar (dipindahkan ke kanan) */
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
            border-top-right-radius: 20px;
            /* Sudut kanan atas */
            border-bottom-right-radius: 20px;
            /* Sudut kanan bawah */
            position: absolute;
            /* Posisi absolut di dalam wrapper */
            right: 0;
            /* Taruh di paling kanan */
            top: 0;
            bottom: 0;
            z-index: 500;
            /* Pastikan di atas konten */
        }

        .social-sidebar .sidebar-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #34495e;
            z-index: -1;
            border-top-right-radius: 20px;
            /* Sudut kanan atas */
            border-bottom-right-radius: 20px;
            /* Sudut kanan bawah */
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

        /* Content Section (Container Utama) */
        .content-section {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            /* Menyesuaikan padding kanan karena sidebar di kanan */
            padding: 50px 40px 50px 40px;
            /* top, right, bottom, left */
            background: linear-gradient(135deg, #ffffff, #f0faff);
            /* Mengurangi lebar content-section agar tidak tumpang tindih dengan sidebar */
            width: calc(100% - 60px);
            /* 60px adalah lebar sidebar */
            position: relative;
            /* Untuk memastikan z-index bekerja */
            z-index: 1;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }


        /* Judul Halaman dalam content-section */
        .content-section h2.page-title {
            font-size: 36px;
            color: #1e3a8a;
            margin-bottom: 20px;
            font-weight: 800;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .content-section .page-description {
            max-width: 800px;
            margin: 20px auto 40px auto;
            font-style: italic;
            color: #555;
            font-size: 17px;
            line-height: 1.7;
            border-left: 4px solid #a7d9f7;
            padding-left: 15px;
            text-align: center;
        }

        /* Bagian Konten (Section) */
        .section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
            text-align: left;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .section h3 {
            color: #1e3a8a;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
        }

        .section p {
            font-size: 17px;
            margin-bottom: 15px;
            line-height: 1.7;
            color: #444;
        }

        .section p:last-child {
            margin-bottom: 0;
        }

        .section img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 25px auto;
            display: block;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
        }

        /* Struktur Organisasi - Bagan */
        .organogram {
            display: flex;
            flex-direction: column;
            /* Mengubah ke kolom untuk menampilkan Masyur di atas Senat di bawah */
            justify-content: center;
            align-items: center;
            /* Pusatkan bagan secara horizontal */
            gap: 40px;
            /* Jarak antar dua bagan utama (Masyur dan Senat) */
            margin-top: 30px;
            padding: 20px;
            background: #f8faff;
            border-radius: 15px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.03);
        }

        /* Kontainer untuk setiap sub-organisasi (Masyur, Senat) */
        .sub-organization-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0;
            /* Jarak antar level akan diatur oleh margin dan garis */
            padding: 20px;
            border: 1px dashed #cce7ff;
            /* Border putus-putus untuk membedakan */
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            width: 100%;
            /* Ambil lebar penuh dari parent organogram */
            max-width: 700px;
            /* Batasi lebar agar tidak terlalu melebar */
            min-width: 300px;
            /* Minimum width untuk setiap bagan */
        }

        .sub-organization-container h4.sub-org-title {
            font-size: 22px;
            /* Disesuaikan agar tidak terlalu besar */
            color: #0b6cb3;
            margin-bottom: 15px;
            font-weight: 700;
            text-align: center;
            width: 100%;
            border-bottom: 2px solid #a7d9f7;
            padding-bottom: 10px;
        }

        .org-level {
            display: flex;
            justify-content: center;
            /* Pusatkan kartu */
            flex-wrap: wrap;
            /* Izinkan wrap untuk kartu dalam level yang sama */
            gap: 20px;
            /* Jarak antar kartu dalam satu level */
            width: 100%;
            /* Lebar penuh di dalam container sub-organisasi */
            position: relative;
            /* Untuk pseudo-elemen garis */
            margin-top: 40px;
            /* Jarak antar level, cukup ruang untuk garis */
        }

        .org-level:first-of-type {
            margin-top: 0;
            /* Level paling atas tidak perlu margin-top */
        }

        .org-card {
            background: #ffffff;
            border: 1px solid #cce7ff;
            border-radius: 12px;
            padding: 12px 15px;
            /* Kurangi padding */
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            min-width: 160px;
            /* Sesuaikan min-width */
            position: relative;
            /* Untuk pseudo-elemen garis */
            flex-basis: auto;
            /* Biarkan browser menentukan lebar berdasarkan konten */
            max-width: 220px;
            /* Maksimal lebar untuk kartu */
        }

        .org-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .org-card.leader {
            /* Ketua dan Wakil */
            max-width: 200px;
            /* Maksimal lebar untuk kartu leader */
        }

        .org-card h4 {
            color: #1e3a8a;
            font-size: 18px;
            /* Disesuaikan */
            font-weight: 700;
            margin-bottom: 5px;
        }

        .org-card p {
            font-size: 14px;
            /* Disesuaikan */
            color: #555;
            margin-bottom: 0;
            line-height: 1.4;
        }

        .org-card .name {
            font-weight: 600;
            color: #333;
        }

        /* ----------- CSS untuk Garis Organogram ----------- */

        /* Garis vertikal di bawah kartu pemimpin (Ketua, Wakil) */
        .org-card.leader::after {
            content: '';
            position: absolute;
            bottom: -20px;
            /* Jarak ke bawah */
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 20px;
            background-color: #a7d9f7;
            z-index: 1;
        }

        /* Garis horizontal di atas grup kartu (contoh: Sekben, Divisi) */
        /* Ini akan muncul di level setelah Ketua dan Wakil Ketua */
        .org-level::before {
            /* Garis horizontal untuk semua level kecuali yang pertama */
            content: '';
            position: absolute;
            top: -20px;
            /* Posisi vertikal garis horizontal */
            left: 0;
            right: 0;
            height: 2px;
            background-color: #a7d9f7;
            z-index: 1;
            width: calc(100% - 40px);
            /* Sesuaikan dengan padding horizontal .org-level */
            margin: 0 auto;
            /* Pusatkan garis horizontal */
        }

        /* Sembunyikan garis horizontal untuk level pertama (Ketua) */
        .org-level:first-of-type::before {
            display: none;
        }

        /* Garis vertikal yang menghubungkan garis horizontal ke setiap kartu anak */
        .org-level .org-card::before {
            content: '';
            position: absolute;
            top: -20px;
            /* Posisi vertikal garis pendek dari horizontal ke kartu */
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 20px;
            background-color: #a7d9f7;
            z-index: 1;
        }

        /* Sembunyikan garis atas pada kartu di level paling atas (Ketua) */
        .org-level:first-of-type .org-card::before {
            display: none;
        }

        /* Menghapus garis bawah pada kartu di level paling bawah */
        .org-level:last-of-type .org-card::after {
            display: none;
        }

        /* ----------- Akhir CSS untuk Garis Organogram ----------- */

        /* Penyesuaian spesifik untuk "Sekretaris dan Bendahara" (2 kolom) */
        .org-level.sekben {
            display: flex;
            /* Pastikan flexbox aktif */
            justify-content: center;
            /* Pusatkan */
            gap: 40px;
            /* Jarak yang lebih lebar antara Sekre dan Bendahara */
            width: 100%;
        }

        .org-level.sekben .org-card {
            flex-basis: calc(50% - 20px);
            /* 2 kartu per baris, dengan gap 40px */
            max-width: 200px;
            /* Maksimal lebar untuk kartu Sekben */
            min-width: 150px;
        }

        /* Penyesuaian spesifik untuk "Divisi" (satu baris, disesuaikan lebarnya, TANPA SCROLL) */
        .org-level.divisi {
            display: flex;
            flex-wrap: wrap;
            /* Izinkan wrapping agar tidak ada scroll */
            justify-content: center;
            /* Pusatkan */
            gap: 15px;
            /* Jarak antar divisi */
            width: 100%;
            overflow-x: visible;
            /* Pastikan tidak ada scroll */
            padding-bottom: 0;
            /* Hapus padding scrollbar */
        }

        .org-level.divisi .org-card {
            flex-shrink: 1;
            /* Izinkan kartu mengecil jika perlu */
            flex-grow: 1;
            /* Izinkan kartu tumbuh jika ada ruang */
            flex-basis: calc(33.333% - 10px);
            /* Contoh: 3 kartu per baris */
            max-width: 180px;
            /* Batasi maksimal lebar per kartu divisi */
            min-width: 150px;
            /* Jaga agar tidak terlalu kecil */
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

            .content-section {
                width: calc(100% - 60px);
                /* Pertahankan lebar konten untuk sidebar */
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
            }

            .social-sidebar {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
            }

            .sub-organization-container {
                max-width: 600px;
                /* Sedikit perkecil max-width agar lebih rapi di layar menengah */
            }

            .org-level.divisi .org-card {
                flex-basis: calc(50% - 10px);
                /* 2 kartu per baris di layar menengah */
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
                position: relative;
                /* Kembali ke relatif agar sidebar bisa di dalam */
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
                /* Kembali ke static atau relatif agar tidak tumpang tindih */
                order: 1;
                /* Posisikan di atas konten utama jika flex-direction column */
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
                padding: 30px 20px;
                width: 100%;
                /* Ambil lebar penuh */
                order: 2;
                /* Posisikan di bawah sidebar */
            }

            .content-section h2.page-title {
                font-size: 32px;
            }

            .content-section .page-description {
                font-size: 15px;
            }

            .section {
                padding: 25px 20px;
                margin-bottom: 20px;
            }

            .section h3 {
                font-size: 24px;
            }

            .section p {
                font-size: 15px;
            }

            /* Responsif Struktur Organisasi */
            .organogram {
                flex-direction: column;
                /* Tetap kolom */
                gap: 30px;
            }

            .sub-organization-container {
                flex-basis: 100%;
                max-width: 90%;
                /* Kontainer bagan akan memenuhi lebar */
            }

            /* Di layar kecil, setiap kartu akan menjadi satu kolom penuh */
            .org-card {
                flex-basis: 100%;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }

            .org-level.sekben .org-card {
                flex-basis: calc(50% - 20px);
                /* Tetap 2 kartu */
                max-width: 200px;
            }

            .org-level.divisi .org-card {
                flex-basis: calc(50% - 10px);
                /* 2 kartu per baris di mobile */
            }

            .org-level {
                flex-direction: row;
                /* Kembali ke baris untuk kartu dalam satu level */
                flex-wrap: wrap;
                /* Izinkan wrapping */
                align-items: flex-start;
                /* Sejajarkan ke atas */
                justify-content: center;
                gap: 15px;
                /* Jarak antar kartu dalam satu level */
            }

            /* Garis responsif */
            .org-card.leader::after {
                /* Garis vertikal di bawah leader di mobile */
                content: '';
                position: absolute;
                bottom: -20px;
                /* Jarak ke bawah */
                left: 50%;
                transform: translateX(-50%);
                width: 2px;
                height: 20px;
                background-color: #a7d9f7;
                z-index: 1;
                display: block;
                /* Pastikan terlihat */
            }

            .org-level::before {
                /* Garis horizontal menjadi vertikal panjang di tengah */
                left: 50%;
                right: auto;
                transform: translateX(-50%);
                width: 2px;
                height: 40px;
                /* Tinggi untuk konektor antar level */
                background-color: #a7d9f7;
                top: -40px;
                /* Posisikan lebih tinggi */
            }

            .org-level:first-of-type::before {
                display: none;
                /* Sembunyikan garis di atas level pertama */
            }

            .org-level .org-card::before {
                /* Garis pendek dari garis vertikal pusat ke kartu */
                content: '';
                position: absolute;
                top: -20px;
                left: 50%;
                transform: translateX(-50%);
                width: 2px;
                height: 20px;
                background-color: #a7d9f7;
                z-index: 1;
                display: block;
            }

            .org-level:first-of-type .org-card::before {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .social-sidebar a {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }

            .content-section h2.page-title {
                font-size: 28px;
            }

            .section h3 {
                font-size: 20px;
            }

            .section p {
                font-size: 14px;
            }

            /* Font size untuk kartu organisasi */
            .org-card h4 {
                font-size: 16px;
                /* Disesuaikan lagi untuk layar lebih kecil */
            }

            .org-card p {
                font-size: 12px;
                /* Disesuaikan lagi untuk layar lebih kecil */
            }

            .sub-organization-container h4.sub-org-title {
                font-size: 20px;
                /* Judul sub-organisasi juga disesuaikan */
            }

            .org-level.divisi .org-card {
                flex-basis: calc(50% - 10px);
                /* Tetap 2 kartu per baris */
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

            .content-section h2.page-title {
                font-size: 24px;
            }

            .content-section .page-description {
                font-size: 13px;
                margin: 15px auto 30px auto;
            }

            .section {
                padding: 15px;
            }

            .section h3 {
                font-size: 18px;
            }

            .section p {
                font-size: 12px;
            }

            .org-card {
                padding: 10px 12px;
                /* Kurangi padding lagi */
            }

            .org-card h4 {
                font-size: 15px;
                /* Lebih kecil lagi */
            }

            .org-card p {
                font-size: 11px;
                /* Lebih kecil lagi */
            }

            .sub-organization-container h4.sub-org-title {
                font-size: 18px;
                /* Judul sub-organisasi juga lebih kecil */
            }

            .org-level.divisi .org-card {
                flex-basis: 100%;
                /* Satu kartu per baris di layar sangat kecil */
                max-width: 250px;
                /* Batasi lebar kartu di layar sangat kecil */
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
            <h2 class="page-title">Tentang FOKRI PTK</h2>

            <div class="section">
                <p>
                    Forum Komunikasi Rohani Islam (FOKRI) Politeknik Statistika STIS adalah organisasi dakwah kampus
                    yang berfokus pada pembinaan keislaman dan pengembangan potensi mahasiswa agar menjadi insan yang
                    bertaqwa, cerdas, serta berkontribusi untuk masyarakat dan bangsa.
                </p>
                <img src="https://osccdn.medcom.id/images/content/2022/02/22/088008f099098d63940c5033a80c38dc.jpg" alt="FOKRI PTK">
            </div>

            <div class="section">
                <h3>Visi FOKRI PTK</h3>
                <p>
                    Menjadi pusat kegiatan rohani Islam di Politeknik Statistika STIS yang progresif dan solutif
                    dalam membina mahasiswa berakhlakul karimah serta meningkatkan kepedulian sosial dan lingkungan.
                </p>
            </div>

            <div class="section">
                <h3>Misi FOKRI PTK</h3>
                <p>1. Membina mahasiswa agar memiliki akidah yang lurus dan akhlak yang mulia.</p>
                <p>2. Mengadakan kegiatan kajian, mentoring, dan pelatihan untuk meningkatkan kualitas iman dan ilmu.</p>
                <p>3. Menjalin ukhuwah islamiyah antaranggota serta meningkatkan kepedulian sosial di lingkungan kampus dan masyarakat.</p>
                <p>4. Mengoptimalkan peran mahasiswa dalam menyebarkan nilai-nilai kebaikan dan keislaman di kampus.</p>
            </div>

            <div class="section">
                <h3>Struktur Organisasi FOKRI PTK</h3>
                <div class="organogram">
                    <div class="sub-organization-container">
                        <h4 class="sub-org-title">Masyur FOKRI (Majelis Syura FOKRI)</h4>
                        <div class="org-level">
                            <div class="org-card leader">
                                <h4>Ketua Masyur</h4>
                                <p class="name">Bpk. Irfan Maulana</p>
                            </div>
                        </div>
                        <div class="org-level">
                            <div class="org-card leader">
                                <h4>Wakil Ketua Masyur</h4>
                                <p class="name">Ibu Nuraini</p>
                            </div>
                        </div>
                        <div class="org-level sekben">
                            <div class="org-card">
                                <h4>Sekretaris Masyur</h4>
                                <p class="name">Andi Setiawan</p>
                            </div>
                            <div class="org-card">
                                <h4>Bendahara Masyur</h4>
                                <p class="name">Ani Suryani</p>
                            </div>
                        </div>
                        <div class="org-level divisi">
                            <div class="org-card">
                                <h4>Komisi Aspirasi</h4>
                                <p class="name">Anggota A</p>
                            </div>
                            <div class="org-card">
                                <h4>Komisi Legislasi</h4>
                                <p class="name">Anggota B</p>
                            </div>
                            <div class="org-card">
                                <h4>Komisi Pengawasan</h4>
                                <p class="name">Anggota C</p>
                            </div>
                        </div>
                    </div>

                    <div class="sub-organization-container">
                        <h4 class="sub-org-title">Senat FOKRI (Badan Eksekutif Mahasiswa)</h4>
                        <div class="org-level">
                            <div class="org-card leader">
                                <h4>Ketua Senat</h4>
                                <p class="name">Fatimah Nurul</p>
                            </div>
                        </div>
                        <div class="org-level">
                            <div class="org-card leader">
                                <h4>Wakil Ketua Senat</h4>
                                <p class="name">Rizki Darmawan</p>
                            </div>
                        </div>
                        <div class="org-level sekben">
                            <div class="org-card">
                                <h4>Sekretaris Umum Senat</h4>
                                <p class="name">Siti Aminah</p>
                            </div>
                            <div class="org-card">
                                <h4>Bendahara Umum Senat</h4>
                                <p class="name">Budi Santoso</p>
                            </div>
                        </div>
                        <div class="org-level divisi">
                            <div class="org-card">
                                <h4>Kadiv Humas</h4>
                                <p class="name">Rizky Pratama</p>
                            </div>
                            <div class="org-card">
                                <h4>Kadiv Pelayanan Umat</h4>
                                <p class="name">Dewi Lestari</p>
                            </div>
                            <div class="org-card">
                                <h4>Kadiv Tarbiyah</h4>
                                <p class="name">Muhammad Iqbal</p>
                            </div>
                            <div class="org-card">
                                <h4>Kadiv Kemuslimahan</h4>
                                <p class="name">Aisyah Putri</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                <a href="https://www.instagram.com/fokri_ptk/" target="_blank" title="Instagram FOKRI PTK"><span class="fab fa-instagram"></span> Instagram</a><br>
                <a href="https://t.me/fokri_ptk" target="_blank" title="Telegram FOKRI PTK"><span class="fab fa-telegram-plane"></span> Telegram</a><br>
                <a href="http://fokri.stis.ac.id/" target="_blank" title="Website FOKRI PTK"><span class="fas fa-globe"></span> Website</a>
            </div>
        </div>
        <div class="footer-copyright">
            © 2025 FOKRI PTK. All rights reserved.
        </div>
    </footer>

    <script>
        function logout() {
            if (confirm("Yakin ingin logout?")) {
                window.location.href = "logout.php";
            }
        }
    </script>

</body>

</html>