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

        /* Main Content Area Wrapper*/
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

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            background-color: white;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-20px);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-container {
            transform: translateY(0);
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 22px;
            font-weight: 700;
            color: #1e3a8a;
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #777;
            transition: color 0.2s ease;
        }

        .modal-close:hover {
            color: #333;
        }

        .modal-body {
            padding: 20px;
        }

        .event-date {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .event-date i {
            margin-right: 8px;
            color: #1e3a8a;
        }

        .event-description {
            line-height: 1.6;
            margin-bottom: 20px;
            color: #444;
        }

        .event-link {
            display: inline-block;
            padding: 8px 16px;
            background-color: #1e3a8a;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .event-link:hover {
            background-color: #172b63;
        }

        @media (max-width: 768px) {
            .modal-container {
                width: 95%;
            }

            .modal-title {
                font-size: 20px;
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
                <h2>Timeline Kegiatan Kepengurusan</h2>
                <p class="description">Lihat jadwal kegiatan penting, rapat, dan acara FOKRI PTK yang akan datang.</p>

                <div id="bulan-container"></div>
                <div id="calendar"></div>
            </div>

            <!-- Modal untuk Detail Event -->
            <div class="modal-overlay" id="eventModal">
                <div class="modal-container">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalEventTitle">Judul Event</h3>
                        <button class="modal-close" id="modalClose">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="event-date" id="modalEventDate">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Tanggal Event</span>
                        </div>
                        <div class="event-description" id="modalEventDescription">
                            Deskripsi event akan muncul di sini...
                        </div>
                        <!-- <a href="#" target="_blank" class="event-link" id="modalEventLink">
                            <i class="fas fa-external-link-alt"></i> Lihat Lampiran
                        </a> -->
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

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        const bulanContainer = document.getElementById('bulan-container');
        const calendarEl = document.getElementById('calendar');
        const bulanList = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const today = new Date();
        const bulanSekarang = today.getMonth();

        // URL API Timeline - pastikan ini benar
        const API_URL = 'http://localhost/fokri/api_timeline.php';

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
            if (calendar) {
                calendar.destroy();
            }

            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: `${today.getFullYear()}-${(monthIndex + 1).toString().padStart(2, '0')}-01`,
                editable: false,
                selectable: false,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: {
                    url: API_URL,
                    method: 'GET',
                    extraParams: {
                        format: 'fc' // Parameter tambahan jika diperlukan
                    },
                    success: function(response) {
                        console.log('Events loaded:', response);
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
                eventDidMount: function(info) {
                    // Tambahkan tooltip sederhana
                    if (info.event.extendedProps.description) {
                        info.el.setAttribute('title', info.event.extendedProps.description);
                        info.el.style.cursor = 'pointer';
                    }
                },
                eventClick: function(info) {
                    const modal = document.getElementById('eventModal');
                    const modalTitle = document.getElementById('modalEventTitle');
                    const modalDate = document.getElementById('modalEventDate');
                    const modalDesc = document.getElementById('modalEventDescription');
                    // const modalLink = document.getElementById('modalEventLink');

                    // Isi data modal
                    modalTitle.textContent = info.event.title;

                    // Format tanggal
                    const eventDate = new Date(info.event.start);
                    const options = {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    modalDate.querySelector('span').textContent = eventDate.toLocaleDateString('id-ID', options);

                    // Deskripsi event
                    if (info.event.extendedProps.description) {
                        modalDesc.textContent = info.event.extendedProps.description;
                        modalDesc.style.display = 'block';
                    } else {
                        modalDesc.style.display = 'none';
                    }

                    // Link lampiran
                    // if (info.event.url) {
                    //     modalLink.href = info.event.url;
                    //     modalLink.style.display = 'inline-block';
                    // } else {
                    //     modalLink.style.display = 'none';
                    // }

                    // Tampilkan modal
                    modal.classList.add('active');

                    // Tutup modal ketika klik close button
                    document.getElementById('modalClose').onclick = function() {
                        modal.classList.remove('active');
                    };

                    // Tutup modal ketika klik di luar konten
                    modal.onclick = function(e) {
                        if (e.target === modal) {
                            modal.classList.remove('active');
                        }
                    };

                    // Prevent default behavior
                    info.jsEvent.preventDefault();
                }
            });

            calendar.render();
        }

        // Inisialisasi awal
        document.addEventListener('DOMContentLoaded', function() {
            renderBulanButtons();
            initCalendar(bulanSekarang);
        });

        function logout() {
            if (confirm("Yakin ingin logout?")) {
                localStorage.clear();
                window.location.href = "index.html";
            }
        }
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
const bulanContainer = document.getElementById('bulan-container');
const calendarEl = document.getElementById('calendar');
const bulanList = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
const today = new Date();
const bulanSekarang = today.getMonth(); // 0-indexed (Jan=0)

// URL API Timeline Anda
const API_URL = 'http://localhost/fokri/api_timeline.php'; // Ganti ini dengan URL yang benar!

function renderBulanButtons(){
    bulanContainer.innerHTML = "";
    for(let i=0; i<12; i++){
        const btn = createButton(bulanList[i], i);
        if(i === bulanSekarang){
            btn.classList.add('active');
        }
        bulanContainer.appendChild(btn);
    }
}

function createButton(label, monthIndex){
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

// Fungsi untuk inisialisasi atau memperbarui kalender
function initCalendar(monthIndex){
    if(calendar){
        calendar.destroy(); // Hancurkan instance kalender sebelumnya jika ada
    }

    calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: `${today.getFullYear()}-${(monthIndex + 1).toString().padStart(2, '0')}-01`,
        editable: false, // Set to false to prevent dragging/resizing events
        selectable: false, // Set to false to prevent dateClick (adding events)
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        events: { // FullCalendar akan memuat events dari URL ini
            url: API_URL,
            method: 'GET',
            failure: function() {
                alert('Gagal memuat kegiatan. Periksa koneksi server atau API.');
            }
        },
        eventClick: function(info) {
            // Display event details in a more user-friendly way, e.g., a modal or alert
            let eventDetails = `Judul: ${info.event.title}\n`;
            if (info.event.extendedProps.description) {
                eventDetails += `Deskripsi: ${info.event.extendedProps.description}\n`;
            }
            if (info.event.url) {
                eventDetails += `Lampiran: ${info.event.url}\n`;
                // Optionally, you can add a button or link to open the attachment
                // For now, just show the URL
            }
            alert(eventDetails);
        }
    });
    calendar.render();
}

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
</script> -->

</body>

</html>