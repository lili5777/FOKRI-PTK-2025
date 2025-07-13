<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Program Kerja - FOKRI PTK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body,
        html {
            height: 100%;
            overflow-x: hidden;
            position: relative;
            background: linear-gradient(180deg, #e0f2f7, #f0f8ff);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .bubble {
            position: absolute;
            bottom: -100px;
            background: rgba(173, 216, 230, 0.5);
            /* Light blue bubbles */
            border-radius: 50%;
            animation: bubble-rise 15s infinite ease-in-out;
            opacity: 0.7;
            z-index: -1;
        }

        .bubble:nth-child(1) {
            width: 60px;
            height: 60px;
            left: 10%;
            animation-duration: 12s;
            animation-delay: 0s;
        }

        .bubble:nth-child(2) {
            width: 40px;
            height: 40px;
            left: 25%;
            animation-duration: 10s;
            animation-delay: 2s;
        }

        .bubble:nth-child(3) {
            width: 80px;
            height: 80px;
            left: 40%;
            animation-duration: 18s;
            animation-delay: 4s;
        }

        .bubble:nth-child(4) {
            width: 50px;
            height: 50px;
            left: 60%;
            animation-duration: 14s;
            animation-delay: 1s;
        }

        .bubble:nth-child(5) {
            width: 70px;
            height: 70px;
            left: 80%;
            animation-duration: 16s;
            animation-delay: 3s;
        }

        .bubble:nth-child(6) {
            width: 30px;
            height: 30px;
            left: 5%;
            animation-duration: 11s;
            animation-delay: 5s;
        }

        .bubble:nth-child(7) {
            width: 90px;
            height: 90px;
            left: 70%;
            animation-duration: 20s;
            animation-delay: 0s;
        }

        .bubble:nth-child(8) {
            width: 55px;
            height: 55px;
            left: 90%;
            animation-duration: 13s;
            animation-delay: 2s;
        }

        .bubble:nth-child(9) {
            width: 65px;
            height: 65px;
            left: 15%;
            animation-duration: 17s;
            animation-delay: 4s;
        }

        .bubble:nth-child(10) {
            width: 45px;
            height: 45px;
            left: 30%;
            animation-duration: 9s;
            animation-delay: 1s;
        }

        @keyframes bubble-rise {
            0% {
                transform: translateY(0) scale(0.8);
                opacity: 0.7;
            }

            50% {
                opacity: 0.9;
            }

            100% {
                transform: translateY(-120vh) scale(1.2);
                opacity: 0;
            }
        }

        .navbar {
            background: linear-gradient(to right, #1e3a8a, #0b6cb3);
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: center;
            /* Mengubah ini untuk memusatkan */
            align-items: center;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo {
            flex-grow: 1;
            text-align: center;
        }

        .navbar .logo h1 {
            font-size: 22px;
            font-weight: 700;
            margin: 0;
            color: white;
        }

        .navbar .auth-buttons {
            position: absolute;
            right: 25px;
        }

        .dashboard-button {
            background: none;
            border: 1px solid white;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .dashboard-button:hover {
            background-color: white;
            color: #1e3a8a;
        }

        .hero-section {
            width: 100%;
            background: url('https://blogger.googleusercontent.com/img/b/R29vZ2xlSy9CRUpuQWcwWHJzNmIzaUtJd1k5R1h1QkQ2bXBSdWZtZW50ZDRjVUZ1VWJvN0h4S1pBSnd6SWVqU19Jd3MzcVNzY1N3ZWV2eWVhYkpsVUNpVEJ5bFJ6X0hBVkQydE5pZktvNWRrQ1ByM0F6b3hQY3R3dFpGSDJpMWZpX2JtYUdFRF84LTA3V0JjT1ZJdW9yN3Mwb2xUalEwZDRB/s1600/WhatsApp+Image+2023-11-20+at+10.12.39.jpeg') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 80px 20px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 800;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .hero-content p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .main-wrapper {
            flex-grow: 1;
            width: 100%;
            max-width: 1200px;
            padding: 30px 20px;
            box-sizing: border-box;
        }

        .program-kerja-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: -50px;
            position: relative;
            z-index: 1;
        }

        .program-kerja-section h2 {
            text-align: center;
            color: #1e3a8a;
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: 700;
        }

        .divisi-selector {
            text-align: center;
            margin-bottom: 30px;
        }

        .divisi-selector button {
            background: #0b6cb3;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            margin: 5px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .divisi-selector button:hover {
            background: #1e3a8a;
            transform: translateY(-2px);
        }

        .divisi-selector button.active {
            background: #1e3a8a;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .program-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .program-item {
            background: #f8f8f8;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .program-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .program-item h3 {
            color: #0b6cb3;
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .program-item p {
            font-size: 15px;
            color: #555;
            margin-bottom: 8px;
        }

        .program-item .status {
            font-weight: 600;
            color: #28a745;
            /* Green for active/selesai */
        }

        .program-item .status.ditunda {
            color: #ffc107;
            /* Orange for ditunda */
        }

        .program-item .status.dibatalkan {
            color: #dc3545;
            /* Red for dibatalkan */
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .modal-overlay.visible {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: white;
            padding: 35px;
            border-radius: 15px;
            width: 90%;
            max-width: 650px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .modal-overlay.visible .modal-content {
            transform: translateY(0);
        }

        .modal-content h2 {
            color: #1e3a8a;
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
        }

        .modal-content p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #444;
            line-height: 1.7;
        }

        .modal-content p strong {
            color: #1e3a8a;
        }

        .modal-buttons {
            text-align: center;
            margin-top: 30px;
        }

        .modal-buttons button {
            background: #0b6cb3;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            margin: 0 10px;
            transition: background 0.3s ease;
        }

        .modal-buttons button:hover {
            background: #1e3a8a;
        }

        .modal-buttons button.secondary {
            background: #6c757d;
        }

        .modal-buttons button.secondary:hover {
            background: #5a6268;
        }

        .footer {
            background: #1e3a8a;
            color: white;
            padding: 40px 20px;
            width: 100%;
            text-align: center;
            font-size: 14px;
            margin-top: 50px;
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start;
            gap: 30px;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 20px;
        }

        .footer-section .logo-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .footer-section .logo-footer img {
            height: 50px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .footer-section .logo-text-footer {
            font-size: 24px;
            font-weight: 700;
        }

        .footer-section p {
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .footer-section h4 {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 700;
            position: relative;
        }

        .footer-section h4::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: #0b6cb3;
            margin: 10px auto 0;
        }

        .footer-section .social-icons a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            margin-right: 15px;
            transition: color 0.3s ease;
            display: inline-block;
            margin-bottom: 10px;
        }

        .footer-section .social-icons a:hover {
            color: #e0f2f7;
        }

        .footer-section .social-icons a .fab,
        .footer-section .social-icons a .fas {
            margin-right: 8px;
            font-size: 18px;
        }

        .footer-bottom {
            width: 100%;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 20px;
            margin-top: 20px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 10px 15px;
            }

            .navbar .logo {
                margin-bottom: 10px;
            }

            /* Menghilangkan .navbar .nav-links */
            .hero-content h1 {
                font-size: 36px;
            }

            .hero-content p {
                font-size: 16px;
            }

            .main-wrapper {
                padding: 20px 15px;
            }

            .program-kerja-section {
                padding: 20px;
            }

            .program-kerja-section h2 {
                font-size: 26px;
            }

            .divisi-selector button {
                padding: 10px 18px;
                font-size: 14px;
            }

            .program-list {
                grid-template-columns: 1fr;
            }

            .modal-content {
                padding: 25px;
            }

            .modal-content h2 {
                font-size: 24px;
            }

            .modal-content p {
                font-size: 15px;
            }

            .modal-buttons button {
                padding: 10px 18px;
                font-size: 14px;
                margin: 0 5px;
            }

            .footer {
                flex-direction: column;
                align-items: center;
                padding: 30px 15px;
            }

            .footer-section {
                min-width: unset;
                width: 100%;
                text-align: center;
            }

            .footer-section h4::after {
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
</head>

<body>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>

    <nav class="navbar">
        <div class="logo">
            <h1>FOKRI PTK</h1>
        </div>
        <div class="auth-buttons">
            <button class="dashboard-button" onclick="goToDashboard()">Kembali ke Dashboard</button>
        </div>
    </nav>

    <section class="hero-section">
        <div class="hero-content">
            <h1>Program Kerja FOKRI PTK</h1>
            <p>Jelajahi berbagai program kerja dan inisiatif yang sedang berjalan dan yang telah diselesaikan oleh setiap divisi FOKRI PTK.</p>
        </div>
    </section>

    <div class="main-wrapper">
        <section class="program-kerja-section">
            <h2>Daftar Program Kerja Divisi</h2>

            <div class="divisi-selector" id="divisiSelector">
                <p>Memuat pilihan divisi...</p>
            </div>

            <div class="program-list" id="programList">
                <p style='text-align:center; color:#555; padding:20px;'>Pilih divisi untuk melihat program kerja.</p>
            </div>
        </section>
    </div>

    <div class="modal-overlay" id="detail-modal">
        <div class="modal-content">
            <h2 id="modal-judul"></h2>
            <p><strong>Status:</strong> <span id="modal-status"></span></p>
            <p><strong>Progres:</strong> <span id="modal-progres"></span></p>
            <p><strong>Tempat:</strong> <span id="modal-tempat"></span></p>
            <p><strong>Tanggal:</strong> <span id="modal-tanggal"></span></p>
            <p><strong>Detail:</strong> <span id="modal-detail"></span></p>
            <div class="modal-buttons">
                <button onclick="presensi(currentProgramId)">Tandai Hadir</button>
                <button onclick="openModalIzin()">Ajukan Izin</button>
                <button class="secondary" onclick="closeDetailModal()">Tutup</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modal-izin">
        <div class="modal-content">
            <h2>Ajukan Izin</h2>
            <textarea id="alasan-izin" placeholder="Tulis alasan izin Anda di sini..." rows="6"></textarea>
            <div class="modal-buttons">
                <button onclick="submitIzin()">Kirim Izin</button>
                <button class="secondary" onclick="closeModalIzin()">Batal</button>
            </div>
        </div>
    </div>

    <footer class="footer">
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
        <div class="footer-bottom">
            <p>© 2025 FOKRI PTK. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const API_URL = 'http://localhost/fokri/api_program_kerja.php';
        let currentProgramId = null;

        const divisions = ["Kebendaharaan", "Kesekretariatan", "Humas", "Pelayanan Umat", "Tarbiyah", ];

        document.addEventListener('DOMContentLoaded', () => {
            renderDivisiButtons();
            const urlParams = new URLSearchParams(window.location.search);
            const initialDivisi = urlParams.get('divisi') || 'BPH';
            loadPrograms(initialDivisi);
            setActiveButton(initialDivisi);
        });

        function renderDivisiButtons() {
            const divisiSelector = document.getElementById('divisiSelector');
            divisiSelector.innerHTML = '';
            divisions.forEach(divisi => {
                const button = document.createElement('button');
                button.textContent = divisi;
                button.onclick = () => {
                    loadPrograms(divisi);
                    setActiveButton(divisi);
                };
                divisiSelector.appendChild(button);
            });
        }

        function setActiveButton(activeDivisi) {
            const buttons = document.querySelectorAll('#divisiSelector button');
            buttons.forEach(button => {
                if (button.textContent === activeDivisi) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });
        }
        async function loadPrograms(divisi) {
            const programListContainer = document.getElementById('programList');
            programListContainer.innerHTML = `<p style='text-align:center; color:#555; padding:20px;'>Memuat program kerja untuk ${divisi}...</p>`;

            try {
                // Encode divisi parameter untuk URL
                const encodedDivisi = encodeURIComponent(divisi);
                const response = await fetch(`${API_URL}?divisi=${encodedDivisi}`);

                // Validasi response HTTP
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                console.log('API Response:', data); // Debugging

                // Validasi struktur response
                if (!data || typeof data !== 'object') {
                    throw new Error('Format response API tidak valid');
                }

                // Handle berbagai format response
                const programs = data.programKerja || data.data || data;

                if (!Array.isArray(programs)) {
                    throw new Error('Data program kerja bukan array');
                }

                if (programs.length > 0) {
                    programListContainer.innerHTML = '';
                    programs.forEach(program => {
                        const programItem = document.createElement('div');
                        programItem.className = 'program-item';
                        programItem.innerHTML = `
                    <h3>${program.judul || 'Tanpa Judul'}</h3>
                    <p>Status: <span class="status ${getStatusClass(program.status)}">${program.status || '-'}</span></p>
                    <p>Progres: ${program.progres || '0'}%</p>
                    <p>Tempat: ${program.tempat || '-'}</p>
                    <p>Tanggal: ${program.tanggal || '-'}</p>
                `;
                        programItem.onclick = () => showDetailModal(program);
                        programListContainer.appendChild(programItem);
                    });
                } else {
                    programListContainer.innerHTML = `
                <p style='text-align:center; color:#555; padding:20px;'>
                    Belum ada program kerja untuk divisi ${divisi}.<br>
                    <small>Pastikan nama divisi "${divisi}" sesuai dengan database.</small>
                </p>`;
                }
            } catch (error) {
                console.error('Error loading programs:', error);
                programListContainer.innerHTML = `
            <p style='text-align:center; color:red; padding:20px;'>
                Gagal memuat program kerja: ${error.message}<br>
                <small>Periksa console untuk detail error</small>
            </p>`;
            }
        }

        function getStatusClass(status) {
            if (!status) return '';
            return status.toLowerCase().replace(/\s/g, '');
        }

        // async function loadPrograms(divisi) {
        //     const programListContainer = document.getElementById('programList');
        //     programListContainer.innerHTML = "<p style='text-align:center; color:#555; padding:20px;'>Memuat program kerja untuk " + divisi + "...</p>";
        //     try {
        //         // Tambahkan parameter divisi ke URL GET request
        //         const response = await fetch(`${API_URL}?action=getAllPrograms&divisi=${encodeURIComponent(divisi)}`);
        //         const data = await response.json();

        //         if (!response.ok || data.error) {
        //             throw new Error(data.error || 'Gagal memuat data dari API.');
        //         }

        //         const programs = data; // Asumsi API sudah memfilter data berdasarkan divisi

        //         if (programs.length > 0) {
        //             programListContainer.innerHTML = ''; // Clear loading message
        //             programs.forEach(program => {
        //                 const programItem = document.createElement('div');
        //                 programItem.className = 'program-item';
        //                 programItem.innerHTML = `
        //                     <h3>${program.judul}</h3>
        //                     <p>Status: <span class="status ${program.status.toLowerCase().replace(/\s/g, '')}">${program.status}</span></p>
        //                     <p>Progres: ${program.progres || '0%'}</p>
        //                     <p>Tempat: ${program.tempat || '-'}</p>
        //                     <p>Tanggal: ${program.tanggal || '-'}</p>
        //                 `;
        //                 programItem.onclick = () => showDetailModal(program);
        //                 programListContainer.appendChild(programItem);
        //             });
        //         } else {
        //             programListContainer.innerHTML = `<p style='text-align:center; color:#555; padding:20px;'>Belum ada program kerja untuk divisi ${divisi} saat ini.</p>`;
        //         }
        //     } catch (error) {
        //         console.error('Error fetching programs:', error);
        //         programListContainer.innerHTML = `<p style='text-align:center; color:red; padding:20px;'>Gagal memuat program kerja: ${error.message}. Periksa koneksi atau URL API.</p>`;
        //     }
        // }

        function showDetailModal(program) {
            currentProgramId = program.id; // Store the ID
            document.getElementById('modal-judul').textContent = program.judul;
            document.getElementById('modal-status').textContent = program.status;
            document.getElementById('modal-progres').textContent = program.progres || '0%';
            document.getElementById('modal-tempat').textContent = program.tempat || '-';
            document.getElementById('modal-tanggal').textContent = program.tanggal || '-';
            document.getElementById('modal-detail').textContent = program.detail || 'Tidak ada detail.';
            document.getElementById('detail-modal').classList.add('visible');
        }

        function closeDetailModal() {
            document.getElementById('detail-modal').classList.remove('visible');
            currentProgramId = null;
        }

        // Presensi menggunakan Local Storage (tetap client-side)
        function presensi(programId) {
            const key = `proker-presensi-${programId}`; // Use program ID for unique key
            if (localStorage.getItem(key)) {
                alert('Kamu sudah melakukan presensi untuk proker ini.');
                return;
            }
            localStorage.setItem(key, 'hadir');
            alert('Presensi berhasil dicatat.');
            closeDetailModal();
        }

        function openModalIzin() {
            document.getElementById('modal-izin').classList.add('visible');
        }

        function closeModalIzin() {
            document.getElementById('modal-izin').classList.remove('visible');
            document.getElementById('alasan-izin').value = "";
        }

        function submitIzin() {
            const alasan = document.getElementById('alasan-izin').value;
            if (alasan) {
                alert("Izin berhasil diajukan: " + alasan + ". Catatan: Ini adalah simulasi. Dalam aplikasi nyata, izin akan dikirim ke backend.");
                closeModalIzin();
            } else {
                alert("Masukkan alasan izin.");
            }
        }

        // Fungsi yang diubah dari logout() menjadi goToDashboard()
        function goToDashboard() {
            window.location.href = "user_frontend.php";
        }
    </script>
</body>

</html>