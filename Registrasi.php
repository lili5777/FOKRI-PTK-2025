<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - FOKRI PTK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Reset dan Font Global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(to bottom right, #e0f7fa, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
            padding: 20px;
        }


        .register-container {
            display: flex;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 950px; /* Diperlebar sedikit untuk menampung form lebih banyak */
            width: 100%;
            min-height: 600px; /* Tinggi minimum yang lebih besar */
        }

        .illustration-section {
            flex: 1;
            background: linear-gradient(135deg, #64b5f6, #a7d9f7); /* Gradasi warna yang cocok dengan tema FOKRI */
            display: flex;
            flex-direction: column; /* Untuk menempatkan teks di bawah ilustrasi */
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .illustration-section img {
            max-width: 80%;
            height: auto;
            display: block;
            object-fit: contain;
            margin-bottom: 20px; /* Spasi antara gambar dan teks */
        }

        .illustration-section .moto-text {
            color: white;
            font-size: 24px;
            font-weight: 700;
            line-height: 1.4;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        .illustration-section .sub-moto-text {
            color: #e0f7fa;
            font-size: 16px;
            margin-top: 10px;
            line-height: 1.5;
            max-width: 80%;
        }


        .register-form-section {
            flex: 1.5; /* Memberi lebih banyak ruang untuk form */
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .register-form-section h2 {
            font-size: 32px;
            color: #1e3a8a;
            margin-bottom: 10px;
            font-weight: 800;
        }

        .register-form-section p.slogan {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
            text-align: center;
            line-height: 1.6;
        }

        .form-row {
            display: flex;
            gap: 20px; /* Jarak antar kolom */
            width: 100%;
            margin-bottom: 20px;
        }
        .form-row .form-group {
            flex: 1; /* Setiap form-group dalam baris akan mengisi ruang yang sama */
            margin-bottom: 0; /* Hapus margin-bottom di sini karena sudah ada di form-row */
        }

        .form-group {
            width: 100%; /* Default width */
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
            font-size: 15px; /* Lebih kecil sedikit dari input */
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select { /* Styling untuk select */
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #d1e9f7;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
            appearance: none; /* Hapus default arrow di select */
            background-color: white; /* Pastikan background putih */
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%231e3a8a%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13%205.7L146.2%20268.7%2018.8%2075.1a17.6%2017.6%200%200%200-25.2-24.6c-9.5%209.5-9.3%2025%200%2034.3l130.6%20129.3c5.4%205.3%2014.2%205.3%2019.6%200l130.6-129.3c9.3-9.5%209.3-24.9%200-34.3z%22%2F%3E%3C%2Fsvg%3E'); /* Custom arrow */
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
            padding-right: 40px; /* Untuk memberi ruang pada arrow */
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #64b5f6;
            box-shadow: 0 0 0 4px rgba(100, 181, 246, 0.2);
        }

        .register-button {
            width: 100%;
            padding: 15px;
            background: #1e3a8a;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            margin-top: 10px;
        }

        .register-button:hover {
            background: #1a2f6b;
            transform: translateY(-2px);
        }

        .login-link {
            margin-top: 25px;
            font-size: 15px;
            color: #555;
        }

        .login-link a {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #1a2f6b;
            text-decoration: underline;
        }

        /* Responsif */
        @media (max-width: 880px) { /* Adjust breakpoint for form row to stack */
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            .form-row .form-group {
                margin-bottom: 20px; /* Add back margin for stacked groups */
            }
            .register-container {
                max-width: 600px; /* Slightly smaller for tablets */
            }
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
                max-width: 450px;
                min-height: unset;
            }
            .illustration-section {
                min-height: 250px; /* Tinggi minimum untuk ilustrasi di mobile */
                order: -1; /* Pindahkan ilustrasi ke atas di mobile */
                padding: 30px 20px;
            }
            .illustration-section img {
                max-width: 60%;
                margin-bottom: 15px;
            }
            .illustration-section .moto-text {
                font-size: 20px;
            }
            .illustration-section .sub-moto-text {
                font-size: 14px;
            }
            .register-form-section {
                padding: 30px 25px;
            }
            .register-form-section h2 {
                font-size: 28px;
            }
            .register-form-section p.slogan {
                font-size: 15px;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .register-form-section {
                padding: 25px 20px;
            }
            .register-form-section h2 {
                font-size: 24px;
            }
            .form-group label {
                font-size: 14px;
            }
            .form-group input, .form-group select {
                padding: 12px 15px;
                font-size: 15px;
            }
            .register-button {
                padding: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="illustration-section">
            <img src="https://assets.pikiran-rakyat.com/crop/70x34:700x498/1200x675/photo/2023/03/30/3406045965.png" alt="Ilustrasi FOKRI">
            <h3 class="moto-text">FOKRI PTK 2025</h3>
            <p class="sub-moto-text">Forum Komunikasi Rohani Islam Perguruan Tinggi Kedinasan. Membina insan bertakwa, cerdas, dan berkontribusi.</p>
        </div>
        <div class="register-form-section">
            <img src="https://yt3.googleusercontent.com/ytc/AIdro_lr1TjnNBLohQi12b3sN5GnZg3ClW8h91aJxAN8D6Kf5Fc=s900-c-k-c0x00ffffff-no-rj" alt="Logo FOKRI PTK" style="height: 60px; margin-bottom: 20px; border-radius: 50%;">
            <h2>Daftar Akun Baru</h2>
            <p class="slogan">Isi formulir di bawah untuk membuat akun FOKRI PTK.</p>

            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap</label>
                <input type="text" id="namaLengkap" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="regEmail">Email</label>
                    <input type="email" id="regEmail" placeholder="Masukkan email Anda" required>
                </div>
                <div class="form-group">
                    <label for="nimNPM">NIM/NPM</label>
                    <input type="text" id="nimNPM" placeholder="Masukkan NIM/NPM Anda" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="PTK">PTK</label>
                    <input type="text" id="PTK" placeholder="Cth: Polstat STIS" required>
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input type="text" id="angkatan" placeholder="Cth: 2023" required>
                </div>
            </div>
            <div class="form-group">
                <label for="divisiFokri">Divisi FOKRI</label>
                <select id="divisiFokri" required>
                    <option value="">Pilih Divisi</option>
                    <option value="Divisi Masyur">Divisi Masyur</option>
                    <option value="Divisi BPH">Divisi BPH</option>
                    <option value="Divisi Humas">Divisi Humas</option>
                    <option value="Divisi Pelayanan Umat">Divisi Pelayanan Umat</option>
                    <option value="Divisi Tarbiyah">Divisi Tarbiyah</option>
                    <option value="Divisi Kemuslimahan">Divisi Kemuslimahan</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="regPassword">Password</label>
                    <input type="password" id="regPassword" placeholder="Buat password baru" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Konfirmasi Password</label>
                    <input type="password" id="confirmPassword" placeholder="Konfirmasi password Anda" required>
                </div>
            </div>
            <button class="register-button" onclick="handleRegistration()">Daftar</button>
            <p class="login-link">Sudah punya akun? <a href="index.html">Login di sini</a></p>
        </div>
    </div>

    <script>
        const API_URL_REGISTRATION = 'http://localhost/fokri/api_registrasi.php'; 

        async function handleRegistration() {
            const namaLengkap = document.getElementById('namaLengkap').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const nimNPM = document.getElementById('nimNPM').value.trim();
            const PTK = document.getElementById('PTK').value.trim();
            const angkatan = document.getElementById('angkatan').value.trim();
            const divisiFokri = document.getElementById('divisiFokri').value.trim();
            const password = document.getElementById('regPassword').value.trim();
            const confirmPassword = document.getElementById('confirmPassword').value.trim();

            // Validasi di sisi klien (frontend)
            if (!namaLengkap || !email || !nimNPM || !PTK || !angkatan || !divisiFokri || !password || !confirmPassword) {
                alert("Semua field harus diisi.");
                return;
            }

            if (password !== confirmPassword) {
                alert("Konfirmasi password tidak cocok.");
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Format email tidak valid.");
                return;
            }

            // Memastikan angkatan adalah 4 digit angka
            if (isNaN(angkatan) || angkatan.length !== 4) {
                alert("Angkatan harus berupa 4 digit angka.");
                return;
            }

            // Data yang akan dikirim ke API PHP
            const registrationData = {
                namaLengkap: namaLengkap,
                email: email,
                nimNPM: nimNPM,
                PTK: PTK,
                angkatan: angkatan,
                divisiFokri: divisiFokri,
                password: password // Password akan di-hash di sisi server PHP
            };

            try {
                // Mengirim data registrasi ke API PHP menggunakan fetch
                const response = await fetch(API_URL_REGISTRATION, {
                    method: 'POST', // Menggunakan metode POST untuk mengirim data baru
                    headers: {
                        'Content-Type': 'application/json' // Memberi tahu server bahwa body adalah JSON
                    },
                    body: JSON.stringify(registrationData) // Mengubah objek JavaScript menjadi string JSON
                });

                // Menguraikan respons JSON dari server
                const result = await response.json(); 

                if (result.status === "success") {
                    alert(result.message);
                    // Arahkan ke halaman login setelah registrasi berhasil
                    window.location.href = "index.html"; 
                } else {
                    // Tampilkan pesan error dari server jika registrasi gagal
                    alert("Error: " + result.message);
                }
            } catch (error) {
                // Menangani error jika ada masalah dengan request (misal: jaringan, server tidak merespons)
                console.error('Error saat registrasi:', error);
                alert("Terjadi masalah saat mencoba registrasi. Silakan coba lagi.");
            }
        }
    </script>
</body>
</html>