<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FOKRI PTK - Program Kerja Divisi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #333;
            line-height: 1.6;
        }

        header {
            background: #1e40af;
            color: white;
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 22px;
            font-weight: 700;
        }

        header .header-buttons {
            display: flex;
            gap: 10px;
            /* Space between buttons */
        }

        header .back-button,
        header .add-proker-button {
            background: #0b6cb3;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            /* Space between icon and text */
        }

        header .back-button:hover,
        header .add-proker-button:hover {
            background: #095995;
        }

        header .add-proker-button {
            background: #28a745;
            /* Green for add button */
        }

        header .add-proker-button:hover {
            background: #218838;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #1e40af;
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
        }

        /* Program List Styles */
        .program-list {
            margin-top: 20px;
        }

        .program-item {
            background: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: box-shadow 0.2s ease;
            cursor: pointer;
            /* Make it clickable for detail */
        }

        .program-item:hover {
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .program-item strong {
            color: #0b6cb3;
            font-size: 18px;
        }

        .program-item p {
            font-size: 15px;
            color: #555;
            margin-top: 5px;
        }

        /* Modal Overlays */
        .modal-overlay,
        .detail-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            backdrop-filter: blur(8px);
        }

        /* Modals */
        .modal,
        .detail-modal {
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            text-align: left;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            position: relative;
        }

        .hidden {
            display: none;
        }

        .modal h3,
        .detail-modal h2 {
            color: #1e3a8a;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 700;
        }

        .detail-modal p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #444;
            line-height: 1.7;
        }

        .detail-modal p strong {
            color: #1e3a8a;
        }

        .modal input[type="text"],
        .modal textarea {
            padding: 12px;
            width: calc(100% - 24px);
            margin: 15px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            resize: vertical;
            min-height: 80px;
        }

        .modal button,
        .detail-modal button {
            background: #0b6cb3;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            margin-top: 15px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .modal button:hover,
        .detail-modal button:hover {
            background: #1e3a8a;
            transform: translateY(-2px);
        }

        .modal button.cancel-button,
        .detail-modal button.close-button {
            background: #ccc;
            color: #333;
            margin-left: 10px;
        }

        .modal button.cancel-button:hover,
        .detail-modal button.close-button:hover {
            background: #bbb;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                margin: 20px auto;
                padding: 15px;
            }

            header h1 {
                font-size: 20px;
            }

            .modal,
            .detail-modal {
                padding: 20px;
            }

            .modal h3,
            .detail-modal h2 {
                font-size: 20px;
            }

            .modal button,
            .detail-modal button {
                font-size: 14px;
                padding: 10px 15px;
            }

            header .back-button,
            header .add-proker-button {
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Program Kerja <span id="divisi-title"></span></h1>
        <div class="header-buttons">
            <a href="#" id="addProkerButton" class="add-proker-button">
                <i class="fas fa-plus-circle"></i> Tambah Program Kerja
            </a>
            <a href="user_frontend.php" class="back-button">Kembali ke Dashboard</a>
        </div>
    </header>

    <div class="container">
        <div class="program-list" id="programList">
            <p style='text-align:center; color:#555; padding:20px;'>Memuat program kerja...</p>
        </div>
    </div>

    <div class="modal-overlay hidden" id="detail-modal">
        <div class="detail-modal">
            <h2 id="detail-judul"></h2>
            <p><strong>Status:</strong> <span id="detail-status"></span></p>
            <p><strong>Progres:</strong> <span id="detail-progres"></span></p>
            <p><strong>Tempat:</strong> <span id="detail-tempat"></span></p>
            <p><strong>Tanggal:</strong> <span id="detail-tanggal"></span></p>
            <p><strong>Detail:</strong> <span id="detail-isi"></span></p>
            <button class="close-button" onclick="closeDetail()">Tutup</button>
        </div>
    </div>

    <div class="modal-overlay hidden" id="modal-izin">
        <div class="modal">
            <h3>Ajukan Izin</h3>
            <textarea id="alasan-izin" placeholder="Tulis alasan izin Anda di sini..." rows="5"></textarea>
            <button onclick="submitIzin()">Kirim Izin</button>
            <button class="cancel-button" onclick="closeModal()">Batal</button>
        </div>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const divisi = urlParams.get('divisi');

        // UBAH INI: Sesuaikan dengan URL PHP API Anda
        const API_URL = 'http://localhost/fokri/api_program_kerja.php';

        document.addEventListener('DOMContentLoaded', () => {
            if (divisi) {
                document.getElementById('divisi-title').textContent = `${divisi}`;
                document.getElementById('addProkerButton').href = `CRUD.php?divisi=${encodeURIComponent(divisi)}`;
                loadPrograms(divisi);
            } else {
                document.getElementById('programList').innerHTML = "<p style='text-align:center; color:red; padding:20px;'>Parameter divisi tidak ditemukan di URL.</p>";
                document.getElementById('divisi-title').textContent = "Semua Divisi";
                document.getElementById('addProkerButton').style.display = 'none';
            }
        });

        async function loadPrograms(targetDivisi) {
            const programListContainer = document.getElementById('programList');
            programListContainer.innerHTML = "<p style='text-align:center; color:#555; padding:20px;'>Memuat program kerja...</p>";

            try {
                // Encode divisi parameter untuk URL
                const encodedDivisi = encodeURIComponent(targetDivisi);
                const response = await fetch(`${API_URL}?divisi=${encodedDivisi}`);

                // Cek status response
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                console.log('API Response:', data); // Debug log

                // Validasi struktur response
                if (!data || !data.success || !Array.isArray(data.programKerja)) {
                    throw new Error('Format response API tidak valid');
                }

                if (data.programKerja.length > 0) {
                    programListContainer.innerHTML = '';
                    data.programKerja.forEach((program) => {
                        const programItem = document.createElement('div');
                        programItem.className = 'program-item';
                        programItem.innerHTML = `
                    <div>
                        <strong>${program.judul}</strong>
                        <p>Status: ${program.status} | Progres: ${program.progres || '0%'}</p>
                    </div>
                    <i class="fas fa-info-circle" style="color: #1e40af; font-size: 20px;"></i>
                `;
                        programItem.onclick = () => showDetail(program);
                        programListContainer.appendChild(programItem);
                    });
                } else {
                    programListContainer.innerHTML = `
                <p style='text-align:center; color:#555; padding:20px;'>
                    Belum ada program kerja untuk divisi ${targetDivisi}.<br>
                    <small>Pastikan nama divisi "${targetDivisi}" sesuai dengan database.</small>
                </p>`;
                }
            } catch (error) {
                console.error('Error fetching programs:', error);
                programListContainer.innerHTML = `
            <p style='text-align:center; color:red; padding:20px;'>
                Gagal memuat program kerja: ${error.message}<br>
                <small>Periksa console untuk detail error.</small>
            </p>`;
            }
        }

        // async function loadPrograms(targetDivisi) {
        //     const programListContainer = document.getElementById('programList');
        //     programListContainer.innerHTML = "<p style='text-align:center; color:#555; padding:20px;'>Memuat program kerja...</p>";
        //     try {
        //         const response = await fetch(`${API_URL}?action=getAllPrograms&divisi=${encodeURIComponent(targetDivisi)}`); // Tambahkan parameter divisi ke API GET
        //         const data = await response.json();

        //         if (!response.ok || data.error) {
        //             throw new Error(data.error || 'Gagal memuat data dari API.');
        //         }

        //         // Filter di sisi client sudah tidak perlu jika API sudah memfilter berdasarkan divisi
        //         // const filteredPrograms = data.filter(program => program.divisi === targetDivisi);
        //         const programs = data; // Gunakan data langsung dari API

        //         if (programs.length > 0) {
        //             programListContainer.innerHTML = ''; 
        //             programs.forEach((program, index) => {
        //                 const programItem = document.createElement('div');
        //                 programItem.className = 'program-item';
        //                 programItem.innerHTML = `
        //                     <div>
        //                         <strong>${program.judul}</strong>
        //                         <p>Status: ${program.status} | Progres: ${program.progres || '0%'}</p>
        //                     </div>
        //                     <i class="fas fa-info-circle" style="color: #1e40af; font-size: 20px;"></i>
        //                 `;
        //                 programItem.onclick = () => showDetail(program);
        //                 programListContainer.appendChild(programItem);
        //             });
        //         } else {
        //             programListContainer.innerHTML = "<p style='text-align:center; color:#555; padding:20px;'>Belum ada program kerja untuk divisi ini.</p>";
        //         }
        //     } catch (error) {
        //         console.error('Error fetching programs:', error);
        //         programListContainer.innerHTML = `<p style='text-align:center; color:red; padding:20px;'>Gagal memuat program kerja: ${error.message}. Periksa koneksi atau URL API.</p>`;
        //     }
        // }

        function showDetail(program) {
            document.getElementById('detail-judul').textContent = program.judul;
            document.getElementById('detail-status').textContent = program.status;
            document.getElementById('detail-progres').textContent = program.progres || '0%';
            document.getElementById('detail-tempat').textContent = program.tempat || '-';
            document.getElementById('detail-tanggal').textContent = program.tanggal || '-';
            document.getElementById('detail-isi').textContent = program.detail || 'Tidak ada detail.';
            document.getElementById('detail-modal').classList.remove('hidden');
        }

        function closeDetail() {
            document.getElementById('detail-modal').classList.add('hidden');
        }

        function openModal() {
            document.getElementById('modal-izin').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal-izin').classList.add('hidden');
            document.getElementById('alasan-izin').value = "";
        }

        function submitIzin() {
            const alasan = document.getElementById('alasan-izin').value;
            if (alasan) {
                alert("Izin berhasil diajukan dengan alasan: " + alasan);
                closeModal();
            } else {
                alert("Alasan izin tidak boleh kosong.");
            }
        }
    </script>

</body>

</html>