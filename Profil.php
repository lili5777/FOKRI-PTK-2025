<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Pengguna - FOKRI PTK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <style>
        /* Reset dan Font Global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        /* Body Background */
        body {
            background: linear-gradient(to bottom right, #e0f7fa, #ffffff);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar  */
        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .navbar .logo-container {
            display: flex;
            align-items: center;
        }

        .navbar .logo-container img {
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .navbar .logo-text {
            font-size: 20px;
            color: white;
        }

        .navbar .menu a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .navbar .menu a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Container Utama - Full Screen Layout */
        .container {
            flex: 1;
            max-width: 900px; /* Diperkecil sedikit karena tidak ada foto samping */
            margin: 30px auto;
            padding: 40px;
            background: linear-gradient(135deg, #f0f4ff, #e3f2fd);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            display: flex; /* Tambahkan ini agar konten di tengah */
            justify-content: center; /* Pusatkan konten horizontal */
            align-items: flex-start; /* Sejajarkan konten ke atas */
        }

        /* Profile Container - Full Layout */
        .profile-container-full {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 30px;
            width: 100%; /* Mengisi seluruh lebar container parent */
            text-align: left; /* Teks rata kiri di dalam container ini */
        }

        /* Hapus styling untuk .profile-picture-full dan .profile-picture-full-img */

        /* Profile Info - Full Layout */
        .profile-info-full {
            /* flex-grow: 1; Ini tidak lagi dibutuhkan karena tidak ada flex item lain di sampingnya */
            text-align: left; /* Pastikan rata kiri */
        }

        .profile-info-full h2 {
            color: #1e3a8a;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 25px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.05);
            text-align: center; /* Judul tetap di tengah untuk estetika */
        }

        .profile-info-full p {
            font-size: 18px;
            margin-bottom: 12px;
            line-height: 1.7;
            color: #444;
            display: flex; /* Gunakan flex untuk label dan span agar sejajar */
            align-items: baseline;
        }

        .profile-info-full p strong {
            color: #1e3a8a;
            flex-shrink: 0; /* Mencegah label mengecil */
            width: 180px; /* Lebar label yang cukup */
            margin-right: 15px; /* Jarak antara label dan nilai */
        }

        .profile-info-full p span {
            flex-grow: 1; /* Nilai mengisi sisa ruang */
        }

        .edit-button {
            background: #4CAF50;
            color: white;
            padding: 14px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 17px;
            font-weight: 600;
            margin-top: 30px;
            transition: background 0.3s ease, transform 0.2s ease;
            display: block; /* Tombol jadi block element */
            margin-left: auto; /* Pusatkan tombol jika perlu */
            margin-right: auto; /* Pusatkan tombol jika perlu */
        }

        .edit-button:hover {
            background: #45a049;
            transform: translateY(-2px);
        }

        /* Footer Styling*/
        footer {
            background: #1e3a8a;
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 40px;
            font-size: 14px;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start;
            gap: 20px;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
            text-align: left;
            padding: 10px;
        }

        /* Styling untuk logo di footer */
        .logo-footer {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .logo-footer img {
            height: 45px;
            margin-right: 10px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .logo-text-footer {
            font-size: 24px;
            font-weight: 800;
            color: white;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .footer-section h4 {
            font-size: 16px;
            margin-bottom: 15px;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
        }
        .footer-section:first-child h4 {
            display: none;
        }

        .footer-section p, .footer-section a {
            color: #e0f7fa;
            font-size: 14px;
            line-height: 1.8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #a7d9f7;
            text-decoration: underline;
        }

        .footer-section .social-icons a {
            display: inline-block;
            margin-right: 10px;
            font-size: 20px;
            color: #e0f7fa;
        }
        .footer-section .social-icons a:hover {
            color: #a7d9f7;
            transform: scale(1.1);
        }

        /* Placeholder untuk ikon, bisa diganti dengan Font Awesome atau SVG */
        .icon::before {
            font-family: 'Inter', sans-serif;
            margin-right: 5px;
        }
        .icon-email::before { content: '📧'; }
        .icon-phone::before { content: '📞'; }
        .icon-location::before { content: '📍'; }
        .icon-instagram::before { content: '📸'; }
        .icon-telegram::before { content: '✈️'; }
        .icon-website::before { content: '🌐'; }

        /* Copyright section */
        .footer-copyright {
            width: 100%;
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 13px;
            color: #d1e9f7;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
                max-width: 95%; /* Lebih lebar di mobile */
            }
            .navbar .menu a {
                margin-left: 10px;
                padding: 6px 10px;
                font-size: 14px;
            }
            footer {
                flex-direction: column;
                align-items: center;
                padding: 20px 15px;
            }
            .footer-section {
                text-align: center;
                min-width: unset;
                width: 100%;
            }
            .footer-section .social-icons {
                margin-top: 10px;
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

            /* Penyesuaian responsif untuk halaman profil */
            .profile-container-full {
                padding: 20px;
            }
            /* Hapus styling responsif untuk gambar profil */
            
            .profile-info-full h2 {
                font-size: 26px;
                text-align: center;
            }
            .profile-info-full p {
                font-size: 16px;
                flex-direction: column; /* Label dan nilai tumpuk di mobile */
                align-items: flex-start;
            }
            .profile-info-full p strong {
                width: 100%; /* Label mengisi penuh */
                margin-right: 0;
                margin-bottom: 5px; /* Jarak antara label dan nilai */
            }
            .profile-info-full p span {
                margin-left: 0; /* Hapus margin kiri */
            }
            .edit-button {
                margin-top: 20px;
                padding: 10px 20px;
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .navbar .menu {
                margin-top: 10px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                width: 100%;
            }
            .navbar .menu a {
                margin: 5px;
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
    <div class="menu">
        <a href="user_FRONTEND.php">Dashboard</a>
        <a href="user_Pengumuman.php">Pengumuman</a>
        <a href="user_Publikasi.php">Publikasi</a>
        <a href="user_Timeline.php">Timeline</a>
        <a href="user_Tentang.php">Tentang</a>
        <a href="Profil.php">Profil</a> |
        <a href="#" onclick="logout()">Logout</a>
    </div>
</div>

<div class="container">
    <div class="profile-container-full">
        <div class="profile-info-full">
            <h2>Profil Pengguna</h2>
            <p><strong>Nama Lengkap:</strong> <span id="profileNamaLengkap">Memuat...</span></p>
            <p><strong>Email:</strong> <span id="profileEmail">Memuat...</span></p>
            <p><strong>NIM/NPM:</strong> <span id="profileNimNPM">Memuat...</span></p>
            <p><strong>PTK:</strong> <span id="profilePTK">Memuat...</span></p>
            <p><strong>Angkatan:</strong> <span id="profileAngkatan">Memuat...</span></p>
            <p><strong>Divisi FOKRI:</strong> <span id="profileDivisiFokri">Memuat...</span></p>
            <button class="edit-button" onclick="alert('Fungsi Edit Profil belum diimplementasikan.')">Edit Profil</button>
        </div>
    </div>
</div>

<footer>
    <div class="footer-section">
        <div class="logo-footer">
            <img src="https://yt3.googleusercontent.com/ytc/AIdro_lr1TjnNBLohQi12b3sN5GnZg3ClW8h91aJxAN8D6Kf5Fc=s900-c-k-c0x00ffffff-no-rj" alt="Logo FOKRI PTK Footer">
            <span class="logo-text-footer">FOKRI PTK</span>
        </div>
        <p>Forum Komunikasi Rohani Islam Perguruan Tinggi Kedinasan.Membina insan bertakwa, cerdas, dan berkontribusi.</p>
    </div>
    <div class="footer-section">
        <h4>Kontak</h4>
        <p><span class="icon icon-email"></span> Email: fokri@stis.ac.id</p>
        <p><span class="icon icon-phone"></span> Telp: (021) 123456789</p>
        <p><span class="icon icon-location"></span> Alamat: Jl. Contoh No. 1, Jakarta</p>
    </div>
    <div class="footer-section">
        <h4>Media Sosial</h4>
        <div class="social-icons">
            <a href="https://www.instagram.com/fokri_ptk/" target="_blank" title="Instagram FOKRI PTK"><span class="icon icon-instagram"></span> Instagram</a><br>
            <a href="https://t.me/fokri_ptk" target="_blank" title="Telegram FOKRI PTK"><span class="icon icon-telegram"></span> Telegram</a><br>
            <a href="http://fokri.stis.ac.id/" target="_blank" title="Website FOKRI PTK"><span class="icon icon-website"></span> Website</a>
        </div>
    </div>
    <div class="footer-copyright">
        © 2025 FOKRI PTK. All rights reserved.
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadUserProfile();
    });

    function loadUserProfile() {
        // Coba ambil data user dari sessionStorage dulu, jika tidak ada, coba dari localStorage
        const userDataString = sessionStorage.getItem('currentUser') || localStorage.getItem('currentUser');

        if (userDataString) {
            try {
                const userData = JSON.parse(userDataString);
                
                // Isi elemen HTML dengan data user
                document.getElementById('profileNamaLengkap').textContent = userData.nama_lengkap || 'Tidak Ada Data';
                document.getElementById('profileEmail').textContent = userData.email || 'Tidak Ada Data';
                document.getElementById('profileNimNPM').textContent = userData.nim_npm || 'Tidak Ada Data';
                document.getElementById('profilePTK').textContent = userData.PTK || 'Tidak Ada Data';
                document.getElementById('profileAngkatan').textContent = userData.angkatan || 'Tidak Ada Data';
                document.getElementById('profileDivisiFokri').textContent = userData.divisi_fokri || 'Tidak Ada Data';

            } catch (e) {
                console.error("Error parsing user data from storage:", e);
                alert("Terjadi kesalahan saat memuat profil. Mohon login kembali.");
                // Redirect ke login jika data corrupt
                window.location.href = "index.html";
            }
        } else {
            // Jika tidak ada data user di storage, arahkan ke halaman login
            alert("Anda belum login. Silakan login terlebih dahulu.");
            window.location.href = "index.html";
        }
    }

    function logout() {
        if (confirm("Yakin ingin logout?")) {
            localStorage.clear(); // Hapus data dari localStorage
            sessionStorage.clear(); // Hapus data dari sessionStorage
            window.location.href = "index.html"; // Redirect ke halaman login
        }
    }
</script>

</body>
</html>